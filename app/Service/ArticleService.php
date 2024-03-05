<?php

namespace App\Service;

use App\Enums\SubjectHeadersEmail;
use App\Service\Singletons\EmailService;

class ArticleService
{

    public function notificationToTheEditor($data): void
    {
        $website = request()->tenant;
        $rubric = $website->rubrics()->where('id', $data['rubric_id'])->first();
        $link = route('article.show', ['rubric_slug' => $rubric->slug, 'article_slug' => $data['slug']]);
        $user = auth()->user();
        $emailService = EmailService::getInstance();
        $subject = SubjectHeadersEmail::ARTICLE_EDITOR->value;
        $emailBody = sprintf('<p>Dear %s,</p><p>Here is the article "%s" you requested:</p><p><a href="%s">%s</a></p>', $user->name, $data['title'], $link, $data['title']);

        $emailService->sendMail($user->email, $subject, $emailBody);
    }

}
