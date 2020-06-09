<?php

namespace App\Http\ViewComposers;


use App\MetaTags as ModelMetaTag;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class MetaTags
{
    public function compose(View $view)
    {
        if (Schema::hasTable('metatags')) {
            $meta = ModelMetaTag::where(
                'url',
                'like',
                '%' . str_replace('/public', '', \Request::getRequestUri()) . '%'
            )
                ->first();

            $view->with(
                [
                    'title'       => $meta->title ? $meta->title : null,
                    'description' => $meta->description ? $meta->description : null,
                ]
            );
        }
    }
}