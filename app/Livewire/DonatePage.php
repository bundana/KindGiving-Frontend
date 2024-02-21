<?php

namespace App\Livewire;

use App\Http\Controllers\Utilities\Helpers;
use App\Models\Campaigns\Donations;
use App\Models\UserAccountNotification;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use App\Http\Controllers\Utilities\Messaging\SMS;
use App\Http\Controllers\Utilities\Payment\HubtelApiServices;
use App\Models\ExchangeRate;
use App\Models\UnpaidDonationsReceipts;
use Nnjeim\World\World;
use PhpParser\Node\Stmt\Return_;

class DonatePage extends Component
{
    //campaign info
    public $campaign, $organizer, $donations, $totalAmount, $category;
    public $description, $progressPercentage, $url;
    //donor info
    public $first_name, $last_name, $email, $phone, $message;
    public $public_name, $hide_name, $countries;
    public $country = 'GH';
    public $currency = 'GHS' ?: 'USD';
    public $isLoading = false; // Flag to track loading state 

    public $amountToCharge, $amount = 50.00; // Initial value

    private $transRef, $fullName;

    public $serverError, $serverSuccess, $checkoutUrl = '';
    public $exchangeRate = '';
    public $tip = 1;
    public $currentRate = 12;
    public function convertCurrency()
    {
        if ($this->currency == '$') {
            $rate = ExchangeRate::where('currency', 'usd')->first();
            $rate = $rate->rate ?: 12;
            $this->currentRate = $rate;
            $this->exchangeRate = (float) $this->amount * $rate;
            $this->amountToCharge = $this->exchangeRate;
            return $this->exchangeRate;
        } else {
            $this->amountToCharge = (float) $this->amount;
            return $this->exchangeRate = '';
        }
    }
    public function updateAmount($newAmount)
    {
        $this->amount = $newAmount;
        $this->convertCurrency();
    }

    public function unpateCurrency($newCurrency)
    {
        $this->currency = str_replace('GH₵', 'GHS', $newCurrency);
    }

    public function countryLookUp()
    {
        if ($this->country != 'GH') {
            $this->currency = '$';
            $this->convertCurrency();
        } elseif ($this->country == 'GH') {
            $this->currency = 'GHS';
        }
    }
    public function updated($name, $value)
    {
        $this->convertCurrency();
    }

    public function rules()
    {
        return [
            'first_name' => 'required|min:5|string',
            'last_name' => 'required|min:5|string',
            'email' => 'required|email',
            'phone' => 'required|numeric:10',
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|min:5|string',
            'public_name' => 'nullable|string',
            'hide_name' => 'nullable',
            'country' => 'nullable',
        ];
    }

    public function generateReceipt()
    {
        $this->validate();
        $transRef = Str::random(8);
        $fullName = $this->first_name . ' ' . $this->last_name;
        $this->fullName = $fullName;
        $this->transRef = $transRef;
        $this->phone = str_replace('+', '', $this->phone);
        try {
            Donations::create([
                'creator' => $this->campaign->manager_id,
                'campaign_id' => $this->campaign->campaign_id,
                'donation_ref' => $transRef,
                'momo_number' => $this->phone,
                'amount' => (int) $this->amountToCharge,
                'donor_name' => $fullName,
                'method' => 'web',
                'agent_id' => $this->campaign->manager_id,
                'status' => 'unpaid',
                'platform_tip' => $this->tip ?: 0,
                'donor_public_name' => $this->public_name ?: $this->fullName,
                'hide_donor' => $this->hide_name == 'on' ? 'yes' : 'no',
                'comment' => $this->message ?: '',
                'country' => $this->country,
                'email' => $this->email,
            ]);
        } catch (\Exception $e) {
            return $this->serverError = 'Something went wrong along the line, please try again';
        }
        $this->serverError = '';
        $this->description = "Donation created for {$this->phone} ({$this->fullName}) of {$this->currency}{$this->amountToCharge}. #{$this->transRef}, proceed to payment";

        $this->checkoutUrl = $this->makeHubtelRequest();

        $isUrl = Str::isUrl($this->checkoutUrl);
        if (!$isUrl) {
            return $this->serverError = 'Something went wrong along the line, please try again';
        }
        UserAccountNotification::create([
            'user_id' => $this->campaign->manager_id,
            'type' => 'campaign',
            'title' => 'New Web Donation',
            'message' => "Donation created for {$this->phone} ({$fullName}) of {$this->currency} {$this->amountToCharge}. #{$this->transRef}, proceed to payment"
        ]);

        // Reset form fields 
        return $this->redirect($this->checkoutUrl);
    }

    private function makeHubtelRequest()
    {
        // check if tip is available
        $newAmount = $this->amountToCharge;
        $this->tip = $this->tip ?: 0;
        $this->amountToCharge = $this->amountToCharge + $this->tip;

        $payment = new HubtelApiServices();
        $returnUrl = route("view-campaign", [$this->campaign->slug]);
        $cancellationUrl = route("view-campaign", [$this->campaign->slug]);
        $callbackUrl = 'https://api.kindgiving.org/v1/payments/webhooks/hubtel/online-checkout';
        $res = $payment->generateFrontendPaymentInvoice((int) $this->amountToCharge, $this->description, $callbackUrl, $returnUrl, $cancellationUrl);
        $res = json_decode($res, true);
        if (!$res) {
            return $this->serverError = 'Something went wrong along the line, please try again ::payment';
        }
        if (!isset($res['checkoutUrl']) || !isset($res['checkoutId']) || !isset($res['checkoutDirectUrl'])) {
            return $this->serverError = 'Something went wrong along the line, please try again ::payment';
        }
        $this->serverError = '';

        $donationReferences[] = $this->transRef;

        $checkoutUrl = $res['checkoutUrl'];
        $checkoutId = $res['checkoutId'];
        $checkoutDirectUrl = $res['checkoutDirectUrl'];
        $clientReference = $res['clientReference'];
        $donationReferencesJson = json_encode($donationReferences, true);

        // Assuming $donationReferences is not empty
        UnpaidDonationsReceipts::updateOrInsert(
            ['user_id' => $this->campaign->manager_id, 'reference' => $clientReference, 'campaign_id' => $this->campaign->campaign_id],
            ['user_id' => $this->campaign->manager_id, 'data' => $donationReferencesJson, 'amount' => $newAmount, 'type' => 'direct', 'phone' => $this->phone]
        );
        $this->serverSuccess = 'Donation created succefully, redirecting to payment page';
        return $checkoutUrl;
    }
    public function render()
    {
        $this->countries = Helpers::countries();
        $this->donations();
        $this->convertCurrency();
        return view('livewire.donate-page');
    }
    public function donations()
    {
        $donations = Donations::where('campaign_id', $this->campaign->campaign_id)
            ->where('status', 'paid')->get() ?: [];
        $this->totalAmount = 0; // Initialize total amount outside the loop

        foreach ($donations as $donation) {
            // Add each donation amount to the totalAmount
            $this->totalAmount += $donation->amount;
        }

        // Calculate the percentage of goal achieved{{ $campaign->image }}
        $this->progressPercentage = ($this->totalAmount / $this->campaign->target) * 100;
        $this->url = Str::slug($this->campaign->name);

        $this->description = '';

        if (Str::length($this->campaign->description) > 50) {
            $this->description = Str::of($this->campaign->description)->limit(60);
        } else {
            $this->description = $this->campaign->description;
        }

        $this->category = '';
        if (Str::limit($this->campaign->category) > 10) {
            $this->category = Str::limit($this->campaign->category, 10);
        } else {
            $this->category = $this->campaign->category;
        }
    }
}
