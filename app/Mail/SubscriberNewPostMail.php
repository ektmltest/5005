<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberNewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post_title;
    public $image_url;
    public $post_slug;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->post_title = $data['post_title'];
        $this->image_url = $data['image_url'];
        $this->post_slug = $data['post_slug'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Subscriber: New Post! | Ektml Platform',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.subscriber.new-post',
            with: [
                'post_title' => $this->post_title,
                'image_url' => $this->image_url,
                'post_slug' => $this->post_slug
            ]
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
