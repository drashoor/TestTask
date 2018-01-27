<?php

namespace Tests\Unit;

use App\Address;
use App\Rental;
use App\Type;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RentalTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function test_it_has_tags()
    {
        $this->assertTrue(true);
    }

    public function test_it_has_type()
    {
        $rental = factory(Rental::class)->create();

        $this->assertInstanceOf(Type::class, $rental->type);
    }

    public function test_it_has_address()
    {
        $rental = factory(Rental::class)->create();

        $this->assertInstanceOf(Address::class, $rental->address);
    }
}
