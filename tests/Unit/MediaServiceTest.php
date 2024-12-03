<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Services\MediaService;
use Tests\TestCase;

class MediaServiceTest extends TestCase
{
    public function test_media_is_correctly_associated_with_post()
    {
        $post = Post::factory()->create();

        $url = 'https://cdn.create.vista.com/api/media/small/285616502/stock-photo-top-view-laptop-coffee-notebook-glasses-card-thank-you-lettering';

        $service = new MediaService();
        $service->uploadMedia($post, $url, 'image');

        // check media
        $this->assertDatabaseHas('media', [
            'mediaable_id' => $post->id,
            'mediaable_type' => Post::class,
            'url' => $url,
        ]);
    }
}
