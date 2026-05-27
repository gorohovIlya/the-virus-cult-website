<?php

namespace Tests\Feature\Redirects;

use Tests\TestCase;

class DonationRedirectTest extends TestCase
{
    public function test_donate_redirects_to_donationalerts(): void
    {
        $response = $this->get('/support-us/donate');
        
        $response->assertRedirect('https://www.donationalerts.com/r/theviruscultproject');
    }
}