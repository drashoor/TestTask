<?php

namespace App\Filters;

class RentalFilters extends Filters
{

    protected $filters = ['number_of_rooms', 'by', 'type', 'zip'];

    /**
     * @param $bedrooms
     * @return mixed
     */
    protected function number_of_rooms($bedrooms)
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->where('bedrooms', $bedrooms);
    }

    protected function by($type)
    {
        $type = ($type == 'date') ? 'id' : $type;

        $this->builder->getQuery()->orders = [];

        return $this->builder->orderby($type, $this->request->get('order'));
    }

    protected function type($type)
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('type_id', $type);
    }

    protected function zip($zip)
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->whereHas('address', function ($query) use ($zip) {
            $query->where('zip', $zip);
        });
    }
}