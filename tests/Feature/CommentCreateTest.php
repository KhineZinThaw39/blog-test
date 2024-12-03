<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Services\MediaService;
use Tests\TestCase;

class CommentCreateTest extends TestCase
{

    public function test_comment_create_with_associated_media()
    {
        $post = Post::factory()->create();
        // create comment
        $comment = Comment::create([
            'post_id' => $post->id,
            'content' => 'Test comment',
        ]);

        // create media
        $service = new MediaService();

        $url = 'https://cdn.create.vista.com/api/media/small/285616502/stock-photo-top-view-laptop-coffee-notebook-glasses-card-thank-you-lettering';

        $service = new MediaService();
        $service->uploadMedia($comment, $url, 'image');

        // check comment
        $this->assertDatabaseHas('comments', [
            'content' => 'Test comment',
        ]);

        // check media
        $this->assertDatabaseHas('media', [
            'mediaable_id' => $comment->id,
            'mediaable_type' => Comment::class,
            'url' => $url,
        ]);
    }
}
