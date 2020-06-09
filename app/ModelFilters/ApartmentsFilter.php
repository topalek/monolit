<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\DB;

class ApartmentsFilter extends ModelFilter
{
    public function price($price)
    {
        is_null($price[0]) ? $price[0] = 0 : $price[0];
        is_null($price[1]) ? $price[1] = 9999999999 : $price[1];

        return $this->whereBetween('price', $price);
    }

    public function city($city)
    {
        return $this->where('city', $city);
    }

    public function sale($sale)
    {
        return $this->where('sale', $sale);
    }

    public function roomQuantity($room_quantity)
    {
        if($room_quantity == '4+'){
            return $this->where('room_quantity', '>=', 4);
        }

        return $this->where('room_quantity', $room_quantity);
    }

    public function estateType($estate_type)
    {
        return $this->where('estate_type', $estate_type);
    }

    public function totalFloorSpace($total_floor_space)
    {
        return $this->where('total_floor_space', '>=', $total_floor_space);
    }

    public function floorSpace($floor_space)
    {
        return $this->where('floor_space', '>=', $floor_space);
    }

    public function kitchenFloorSpace($kitchen_floor_space)
    {
        return $this->where('kitchen_floor_space', '>=', $kitchen_floor_space);
    }

    public function street($street)
    {
        return $this->where(DB::raw("CONCAT(`street`, ' ', `house_no`)"), 'LIKE', "%".$street."%");
    }

    public function district($district)
    {
        return $this->whereLike('district', $district);
    }

    public function floor($floor)
    {
        return $this->where('floor', '>', $floor);
    }

    public function numberOfStoreys()
    {
        return $this->whereColumn('floor', '<', 'number_of_storeys');
    }

    public function sort($sort)
    {
        return $this->orderBy('price', $sort);
    }
}
