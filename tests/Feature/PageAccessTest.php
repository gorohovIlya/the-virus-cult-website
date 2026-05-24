<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_access() : void
    {
        $pages = ['/', '/download', '/feedback', '/support-us', '/about-us'];
        foreach($pages as $page)
        {
            $response = $this->get($page);
            $response->assertStatus(200);
        }
    }
}   