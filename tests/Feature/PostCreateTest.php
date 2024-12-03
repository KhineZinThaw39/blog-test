<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Services\MediaService;
use Tests\TestCase;

class PostCreateTest extends TestCase
{

    public function test_post_create_with_associated_media()
    {
        // create post
        $post = Post::create([
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);

        // create media
        $service = new MediaService();

        $url = 'https://cdn.create.vista.com/api/media/small/285616502/stock-photo-top-view-laptop-coffee-notebook-glasses-card-thank-you-lettering';

        $service = new MediaService();
        $service->uploadMedia($post, $url, 'image');

        // check post
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
        ]);

        // check media
        $this->assertDatabaseHas('media', [
            'mediaable_id' => $post->id,
            'mediaable_type' => Post::class,
            'url' => $url,
        ]);
    }
}
