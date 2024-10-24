<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PostTranslate implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('blablabla' . $this->post->title);
    }
}
