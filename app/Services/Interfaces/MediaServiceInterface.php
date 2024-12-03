<?php

namespace App\Services\Interfaces;

interface MediaServiceInterface
{
    public function uploadMedia($mediaable, string $url, string $type): void;
}
