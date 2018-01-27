<?php

namespace App\Http\Controllers;

use App\Filters\RentalFilters;
use App\Rental;
use App\Type;

class RentalsController extends Controller
{

    public function index(RentalFilters $rentalFilters)
    {
        $data['objects'] = $this->getRentals($rentalFilters);

        $data['types'] = Type::get();
        $data['numbers_of_rooms'] = Rental::select('bedrooms')->distinct()->get();

        return View('rentals.index', $data);
    }

    private function getRentals(RentalFilters $rentalFilters)
    {
        $threads = Rental::with('tags')->latest()->filter($rentalFilters)->paginate(10);

        return $threads;
    }

    public function show(Rental $rental)
    {
        $data['object'] = $rental;
        return View('rentals.show', $data);
    }
}
