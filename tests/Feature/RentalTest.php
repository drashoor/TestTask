<?php

namespace Tests\Feature;

use App\cUrl;
use App\Rental;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RentalTest extends TestCase
{

    use DatabaseMigrations;
    use cUrl;

    public function setUp()
    {
        parent::setUp();
        $this->prepareApi('rental');
    }

    /**
     * test
     * @expectedException ConnectException::class
     */
    public function it_throw_exception_if_have_failed_connection()
    {
        $this->getApi('GET');
        // To be written later.
    }

    /** @test */
    public function guest_cannot_browse_rentals()
    {
        $this->get('rentals')->assertRedirect('login');
    }

    /**
     * @test
     */
    public function user_can_browse_rentals_in_dashboard()
    {
        $this->signIn();

        // create rentals by api
        $rental = factory(Rental::class)->create();

        // browse rentals in rentals page
        $this->get('rentals')
            ->assertSuccessful()
            ->assertSee($rental->name);
    }

}
