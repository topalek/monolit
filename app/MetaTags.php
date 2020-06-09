<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class MetaTags extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'metatags';
    
    protected $fillable = [
          'url',
          'title',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        MetaTags::observe(new UserActionsObserver);
    }
    
    
    
    
}