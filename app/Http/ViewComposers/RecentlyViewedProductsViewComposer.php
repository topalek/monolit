<?php

namespace App\Http\ViewComposers;

use App\Apartments;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class RecentlyViewedProductsViewComposer
{
    public function compose(View $view)
    {
        if (count(Cookie::get('view_recently')) > 0) {
            if (count(array_unique(Cookie::get('view_recently'))) > 3) {
                $places = Apartments::whereIn('id', array_unique(Cookie::get('view_recently')))
                    ->with('getAttributesObject')
                    ->take(3)
                    ->get();
            } else {
                $places = Apartments::whereIn('id', Cookie::get('view_recently'))
                    ->with('getAttributesObject')
                    ->get();
            }

            foreach ($places as $place) {
                for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                    if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                        $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                    }
                }
            }
        } else {
            $places = null;
        }

        $view->with([
            'recentlyViewed' => $places,
        ]);
    }
}