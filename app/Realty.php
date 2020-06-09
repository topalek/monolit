<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realty extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'realty';
    
    protected $fillable = [
          'main_title',
          'img',
          'active',
          'main_url',
    ];
    

    public static function boot()
    {
        parent::boot();

        Realty::observe(new UserActionsObserver);
    }

    public function items()
    {
        return $this->hasMany(RealtyItems::class, 'realty_id', 'id');
    }
    
}