<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /** Test Home */
    public function test_home_page()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
    }

    /** Test Dashboard Page */
    public function test_dashboard_page()
    {
        $response = $this->get('dashboard');
        $response->assertSuccessful();
    }

}
