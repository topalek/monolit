<?php

namespace App\Http\ViewComposers;


use Illuminate\View\View;
use App\MetaTags as ModelMetaTag;

class MetaTags
{
    public function compose(View $view)
    {

//        dd(\Request::getRequestUri());
        $meta = ModelMetaTag::where('url', 'like', '%' . str_replace('/public', '', \Request::getRequestUri()) . '%')
            ->first();

        $view->with([
            'title' => $meta->title ? $meta->title : null,
            'description' => $meta->description ? $meta->description : null,
        ]);
    }
}