<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No Posts Found!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        //Arrange - Prepare
        $post = new BlogPost();
         $post->title = 'New Title';
         $post->content = 'Content of the new post';
         $post->save();

         //Act

         $response = $this->get('/posts');
         $response->assertSeeText('New Title');

         $this->assertDatabaseHas('blog_posts', [
            'title' =>'New Title',
         ]);

    }
}
