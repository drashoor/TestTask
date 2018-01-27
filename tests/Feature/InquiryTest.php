<?php

namespace Tests\Feature;

use App\Inquiry;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class InquiryTest extends TestCase
{

    use DatabaseMigrations;

    public function test_guest_cannot_browse_inquires()
    {
        $this->get('inquires')
            ->assertRedirect('login');
    }

    public function test_user_can_browse_inquiries()
    {
        $this->signIn();

        $inquiry = factory(Inquiry::class)->create();

        $this->get('inquires')
            ->assertSuccessful()
            ->assertSee($inquiry->source)
            ->assertSee($inquiry->name)
            ->assertSee($inquiry->arrive)
            ->assertSee($inquiry->depart);

    }
}
