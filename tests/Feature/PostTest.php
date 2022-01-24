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
        // $post = new BlogPost();
        //  $post->title = 'New Title';
        //  $post->content = 'Content of the new post';
        //  $post->save();

         $post = $this->createDummyBlogPost();

         //Act

         $response = $this->get('/posts');

         //Assert
         $response->assertSeeText('New Title');
         $response->assertSeeText('No comments yet');

         $this->assertDatabaseHas('blog_posts', [
            'title' =>'New Title',
         ]);

    }


    public function testStoreValid(){
        $params = [
            'title' => 'Valid title',
            'content' => 'At lesat 10 charactesr',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'),'Blog Post was created');

    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x',
        ];

        $this->post('/posts', $params)
        ->assertStatus(302)
        ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0],'The title must be at least 5 characters.' );
        $this->assertEquals($messages['content'][0],'The content must be at least 10 characters.' );
    }

    public function testUpdateValid()
    {
        // $post = new BlogPost();
        // $post->title = 'New Title';
        // $post->content = 'Content of the new post';
        // $post->save();

        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Title',
        ]);
        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed',
        ];

        $this->put("/posts/{$post->id}", $params)
        ->assertStatus(302)
        ->assertSessionHas('status');

        $this->assertEquals(session('status'),'Blog Post was updated!');

        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New Title',
        ]);


    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Title',
        ]);


        $this->delete("/posts/{$post->id}")
        ->assertStatus(302)
        ->assertSessionHas('status');

        $this->assertEquals(session('status'),'Blog post was deleted!');
        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New Title',
        ]);


    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = 'Content of the new post';
        $post->save();

        return $post;
    }
}
