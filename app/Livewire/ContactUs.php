<?php

namespace App\Livewire;

use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactUs extends Component
{
    public $name, $email, $phone, $form_message, $campaign_url, $subject, $recaptcha = '';
    public $isLoading = false; // Flag to track loading state

    public $serverError, $serverSuccess, $checkoutUrl = '';

    public function rules()
    {
        return [
            'name' => 'required|min:5|string',
            'email' => 'required|email',
            'phone' => 'required|numeric:10',
            'campaign_url' => 'nullable|url',
            'form_message' => 'required|min:5|string',
            'subject' => 'required|min:18|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Full name is required.',
            'name.min' => 'The name must be at least :min characters.',
            'name.string' => 'The name must be a string.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone field is required.',
            'phone.numeric' => 'Phone must be a valid numeric value with :digits digits.',
            'campaign_url.url' => 'Please enter a valid URL for the campaign URL.',
            'form_message.min' => 'Message must be at least :min characters.',
            'form_message.string' => 'Message must be a string.',
            'subject.required' => 'Subject field is required.',
            'subject.min' => 'Subject must be at least :min characters.',
            'subject.string' => 'Subject must be a string.',
        ];
    }
    public function contactForm()
    {
        $this->validate();
        $this->isLoading = true;
        $this->serverError = '';
        $this->serverSuccess = '';
        $emailData = [
            'message' => $this->form_message,
            'campaign' => $this->campaign_url,
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'subject' => $this->subject,
        ];
        $sendMail = Mail::to('bundanaabdulhafiz@gmail.com')->send(new ContactForm($emailData));
        if ($sendMail) {
            $this->serverError = '';
            $this->serverSuccess = 'Your message has been sent successfully.';
        } else {
            $this->serverError = 'An error occurred while sending your message. Please try again later.';
        }
        // $this->reset();
        return $this->serverSuccess ;
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
