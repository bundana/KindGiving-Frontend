<?php

namespace App\Mail\Campaigns;

use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\CampaignAgent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StatusChange extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $subject, $status, $creator;
    /**
     * Create a new message instance.
     */
    public function __construct($subject, public Campaign $campaign,  $status, $creator = null)
    {
        $this->subject = $subject; 
        $this->status = $status;
        $this->creator = $creator;
    } 
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('campaigns@kindgiving.org', 'KindGiving Campaigns'),
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
            view: 'layouts.mail.campaigns.status-change',
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
