<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /** Test Home */
    public function test_user_can_visit_home_page()
    {
        $this->signIn();
        $response = $this->get('/');
        $response->assertSuccessful();
    }

    /** Test Dashboard Page */
    public function test_user_can_visit_dashboard_page()
    {
        $this->signIn();
        $response = $this->get('dashboard');
        $response->assertSuccessful();
    }

}
