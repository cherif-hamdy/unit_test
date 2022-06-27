<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateVideoTest extends TestCase
{

    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_creates_video_in_database()
    {
        $url = $this->faker->url;
        
        $this->json('POST', route('video_add'), [
            'url' => $url,
            'description' => 'test'
        ]);

        $this->assertDatabaseHas('videos', [
            'url' => $url,
            'description' => 'test'
        ]);
    }

    public function test_it_return_video()
    {
        $url = $this->faker->url;
        
        $resp = $this->json('POST', route('video_add'), [
            'url' => $url,
            'description' => 'test'
        ]);

        $resp->assertJson(function (AssertableJson $json) use ($url) {
            $json->where('id', 1)
                ->where('url' , $url)
                ->where('description', 'test')
                ->etc();
        });
    }

    public function test_it_returns_an_unpublished_video()
    {
        $url = $this->faker->url;
        
        $resp = $this->json('POST', route('video_add'), [
            'url' => $url,
            'description' => 'test'
        ]);

        $resp->assertJson(function(AssertableJson $json) use($url) {
            $json->where('is_published', 0)
                ->etc();
        });
    }

    public function test_if_sends_empty_values()
    {
        $resp = $this->json('POST', route('video_add'), []);
        
        $resp->assertStatus(422);

        $resp->assertJson(function (AssertableJson $json){
            $json->has('errors.url')
                ->etc();
        });
    }
}
