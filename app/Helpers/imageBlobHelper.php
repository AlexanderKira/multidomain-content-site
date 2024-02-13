<?php

namespace App\Helpers;

class imageBlobHelper
{
    public static function getRandomImageBlob($directory): bool|string
    {
        if (!file_exists($directory) || !is_readable($directory)) {
            throw new \Exception("Directory does not exist or is not readable");
        }

        $files = glob($directory . '*.*');

        if (empty($files)) {
            throw new \Exception("No image files found in directory");
        }

        $randomImage = $files[array_rand($files)];

        return file_get_contents($randomImage);
    }

}

