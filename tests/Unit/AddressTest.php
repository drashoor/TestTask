<?php

namespace Tests\Unit;


use App\Address;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AddressTest extends TestCase
{

    use DatabaseMigrations;

    public function test_it_has_rentals()
    {
        $address = factory(Address::class)->create();

        $this->assertInstanceOf(Collection::class, $address->rentals);
    }

}
