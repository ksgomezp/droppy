<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;
use App\Util\ImageS3Storage;

class ImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ImageStorage::class, function () {
            return new ImageLocalStorage();
        });
    }
}
