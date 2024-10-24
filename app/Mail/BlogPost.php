<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogPost extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Post $post)
    {
    }

    /**
     * Get the message envelope.
     * information about subject, the recipient
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Blog Post',
        );
    }

    /**
     * Get the message content definition.
     * the blade content of the message.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.blog_posted',
            with:[
                'postTitle' => $this->post->title,
                'postID' => $this->post->id,
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
