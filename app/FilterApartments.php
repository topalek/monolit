<?php
/**
 * Created by topalek
 * Date: 11.06.2020
 * Time: 15:22
 */

namespace App;


use Illuminate\Http\Request;

class FilterApartments
{
    protected $builder;
    protected $request;

    public function __construct($builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply()
    {
        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                if ($value) {
                    $this->$filter($value);
                }
            }
        }
        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

    public function city($value)
    {
        $this->builder->where('city', 'like', "%$value%");
    }

    public function type($value)
    {
        $this->builder->where('estate_type', $value);
    }

    public function rooms($value)
    {
        $this->builder->where('room_quantity', $value);
        if ($value == '4+') {
            $this->builder->where('room_quantity', '>=', 4);
        }
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

//    public function sort($value)
//    {
//        $this->builder->where('city','like', "%$value%");
//    }

    public function notFirst($value)
    {
        $this->builder->where('floor', '>', 1);
    }

    public function notLast($value)
    {
        $this->builder->where('floor', '<', 'number_of_storeys');
    }

}
