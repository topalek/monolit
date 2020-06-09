<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Blocks extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'blocks';
    
    protected $fillable = [
          'show_1',
          'image_1',
          'title_1',
          'link_1_1',
          'link_1_2',
          'show_2',
          'image_2',
          'title_2',
          'link_2_1',
          'link_2_2',
          'show_3',
          'title_3',
          'image_3',
          'link_3',
          'name_1_1',
          'name_1_2',
          'name_2_1',
          'name_2_2',
    ];
    

    public static function boot()
    {
        parent::boot();

        Blocks::observe(new UserActionsObserver);
    }
    
    
    
    
}