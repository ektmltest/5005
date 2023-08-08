<?php

namespace App\Jobs;

use App\Mail\SubscriberNewPostMail;
use App\Models\Newspaper;
use App\Repositories\SubscriberRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNewPostMailsQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $new;
    protected $subscriberRepository;

    /**
     * Create a new job instance.
     */
    public function __construct(Newspaper $newspaper)
    {
        $this->new = $newspaper;
        $this->subscriberRepository = new SubscriberRepository;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = $this->subscriberRepository->getAll();

        $data['post_title'] = $this->new->titleLocale('en');
        $data['image_url'] = $this->new->image;
        $data['post_slug'] = $this->new->slug;

        foreach ($subscribers as $subscriber)
            if(!$subscriber->sendMail(SubscriberNewPostMail::class, $data));
    }
}
