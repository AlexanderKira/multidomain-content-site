<?php

namespace Database\Seeders;

use App\Helpers\imageBlobHelper;
use App\Models\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Website::count() === 0) {
            $this->saveWebsite(Website::factory()->count(2)->make());
        }
    }

    private function saveWebsite($logo): void
    {
        $logo->map(function (Website $logo) {
            $path = $this->saveImage($logo->domain);
            $logo->logo = $path;
            $logo->save();
        });
    }

    private function saveImage(string $title): string
    {
        $image = imageBlobHelper::getRandomImageBlob(resource_path('seed/logo/'));
        $filename = "$title.jpg";
        $path = 'logo/'.$filename;
        Storage::disk('public')->put($path, $image);
        return Storage::url($path);
    }
}
