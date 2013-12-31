<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SitePostTest extends TestCase
{
    public function test_list_posts()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_show_post()
    {
        $post = Post::create([
                'title' => 'test post',
                'description' => 'American Airlines Group, Inc.',
                'user_id' => 1,
                'publication_date' => Carbon::now(),
        ]);

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
    }
}
