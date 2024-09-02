<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function homepage_loads_correctly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Bienvenue');
    }
}
