<?php

namespace App\Service;



use Illuminate\Support\Facades\Cache;

class WebsiteService
{
    public function rememberWebsite(): mixed
    {
        return Cache::rememberForever('website:' . request()->getHost(), function () {
            return request()->tenant;
        });
    }

}
