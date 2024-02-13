<?php

namespace App\Http\Service;

use App\Mail\EditorialAddressEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{

    public function notificationToTheEditor($data): void
    {

        $website = request()->tenant;

        $rubric = $website->rubrics()->where('id', $data['rubric_id'])->first();

        $link = route('article.show', ['rubric_slug' => $rubric->slug, 'article_slug' => $data['slug']]);

        $user = auth()->user();

        $emailData = [
            'user_name' => $user->name,
            'article_title' => $data['title'],
            'link' => $link
        ];

        $this->mailReply($user->email, $emailData);
    }
    public function mailReply($mail, $emailData): void
    {
        Mail::to($mail)->send(new EditorialAddressEmail($emailData));
    }
}
