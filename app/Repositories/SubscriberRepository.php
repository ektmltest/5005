<?php

namespace App\Repositories;

use App\Interfaces\SubscriberRepositoryInterface;
use App\Jobs\SendNewPostMailsQueueJob;
use App\Mail\SubscriberNewPostMail;
use App\Models\Newspaper;
use App\Models\Subscriber;

class SubscriberRepository implements SubscriberRepositoryInterface {

    public function getAll() {
        return Subscriber::all();
    }

    public function store($email) {
        return Subscriber::create([
            'email' => $email,
        ]);
    }

    public function sendNewPostMails(Newspaper $new) {
        // dispatch(new SendNewPostMailsQueueJob($new));
        // return true;
        $subscribers = $this->getAll();

        $data['post_title'] = $new->titleLocale('en');
        $data['image_url'] = $new->image;
        $data['post_slug'] = $new->slug;

        foreach ($subscribers as $subscriber)
            if(!$subscriber->sendMail(SubscriberNewPostMail::class, $data))
                return false;

        return true;
    }

}
