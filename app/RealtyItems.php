<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class RealtyItems extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'realtyitems';
    
    protected $fillable = [
          'realty_id',
          'title',
          'url'
    ];
    

    public static function boot()
    {
        parent::boot();

        RealtyItems::observe(new UserActionsObserver);
    }
    
    public function realty()
    {
        return $this->hasOne('App\Realty', 'id', 'realty_id');
    }


    
    
    
}