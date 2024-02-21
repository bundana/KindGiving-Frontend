<?php

namespace App\Mail;

use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\CampaignAgent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

// implements ShouldQueue
class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $email, $phone, $form_message, $campaign_url, $subject, $no_captcha;
    /**
     * Create a new message instance.
     */
    public function __construct($formData = [])
    {
        $this->subject = $formData['subject'];
        $this->name = $formData['name'];
        $this->email = $formData['email'];
        $this->phone = $formData['phone'];
        $this->form_message = $formData['message'];
        $this->campaign_url = $formData['campaign'];

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('support@kindgiving.org', 'KindGiving Support Team'),
            replyTo: [
                new Address('support@kindgiving.org', 'KindGiving Support Team')
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'layouts.frontend.contact-form-mail-template',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
