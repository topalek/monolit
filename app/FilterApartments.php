<?php
/**
 * Created by topalek
 * Date: 11.06.2020
 * Time: 15:22
 *
 */

namespace App;


class FilterApartments extends QueryFilter
{

    public function city($value)
    {
        $this->builder->where('city', 'like', "%$value%");
    }

    public function type($value)
    {
        $this->builder->where('estate_type', 'like', "%$value%");
    }

    public function rooms($value)
    {
        $this->builder->where(
            function ($q) use ($value) {
                $q->whereIn('room_quantity', $value);
                if (in_array('4+', $value)) {
                    $q->orWhere('room_quantity', '>=', 4);
                }
            }
        );
    }

    public function price($value)
    {
        $from = $value[0];
        $to = $value[1];
        if ($from && $to) {
            $this->builder->whereBetween('price', [$from, $to]);
        } elseif ($from) {
            $this->builder->where('price', '>=', $from);
        } elseif ($to) {
            $this->builder->where('price', '<=', $to);
        }
    }

    public function area($value)
    {
        $this->builder->where('total_floor_space', '>=', $value);
    }

    public function district($value)
    {
        $this->builder->where('district', 'like', "%$value%");
    }

    public function street($value)
    {
        $this->builder->where('street', 'like', "%$value%");
    }

    public function sort($sort)
    {
        $this->builder->orderBy('price', $sort);
    }

    public function notFirst($value)
    {
        $this->builder->where('floor', '>', 1);
    }

    public function notLast($value)
    {
        $this->builder->where('floor', '<', 'number_of_storeys');
    }

}
