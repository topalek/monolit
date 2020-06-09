<?php

namespace App;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;


class Apartments extends Model
{
    use Filterable;

    protected $table = 'ivn_objects';

    public $sortable = [
        'sale',
        'price',
        'city',
        'room_quantity',
        'district',
        'floor',
        'number_of_storeys'
    ];

    protected $fillable = [
        'sale',
        'price',
        'city',
    ];


    public $timestamps = false;

    public function getAttributesObject() {
        return $this->hasMany(SubTags::class, 'p_id', 'id')->orderBy('id', 'desc');
    }

    public function getAttributesObjectASC() {
        return $this->hasMany(SubTags::class, 'p_id', 'id')->orderBy('id', 'asc');
    }

    public function next() {
        return Apartments::where('object_code', '>', $this->object_code)
            ->orderBy('object_code','asc')
            ->first();

    }
    public function previous() {
        return Apartments::where('object_code', '<', $this->object_code)
            ->orderBy('object_code','desc')
            ->first();
    }

    public function modelFilter()
    {
        return $this->provideFilter(ModelFilters\ApartmentsFilter::class);
    }
}
