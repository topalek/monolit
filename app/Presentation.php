<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'presentation';
    
    protected $fillable = ['text'];
    

    public static function boot()
    {
        parent::boot();

        Presentation::observe(new UserActionsObserver);
    }
    
    
    
    
}