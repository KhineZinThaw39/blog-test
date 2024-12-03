<?php

namespace App\Services;

use App\Services\Interfaces\MediaServiceInterface;

class MediaService implements MediaServiceInterface
{
    public function uploadMedia($mediaable, string $url, string $type): void
    {
        // create media
        $mediaable->media()->create([
            'url' => $url,
            'type' => $type,
        ]);
    }
}
