<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageS3Storage implements ImageStorage
{
    public function store($request)
    {
        if ($request->hasFile('image')) {
            Storage::disk('s3')->put(
                $request->file('image')->getClientOriginalName(),
                file_get_contents($request->file('image')->getRealPath()),
                'public'
            );
        }
    }
}
