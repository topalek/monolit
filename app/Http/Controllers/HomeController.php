<?php

namespace App\Http\Controllers;

use App\Apartments;
use App\Blocks;
use App\Company;
use App\HomeText;
use App\Presentation;
use App\Realty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $apartments;

    public function __construct(Apartments $apartments) {
        $this->apartments = $apartments;
    }

    public function index()
    {
        $cities = DB::table('ivn_objects')->distinct()->pluck('city');
        $types = DB::table('ivn_objects')->distinct()->pluck('estate_type');
        $areas = DB::table('ivn_objects')->distinct()->pluck('total_floor_space');
        $districts = DB::table('ivn_objects')->distinct()->pluck('district');
        $streets = DB::table('ivn_objects')->distinct()->pluck('street');

        $filterData = [
            'cities'    => $cities->sort()->filter(
                function ($value, $key) {
                    return $value !== "...";
                }
            ),
            'types'     => $types->sort(),
            'areas'     => $areas->sort()->filter(),
            'districts' => $districts->sort()->filter(
                function ($value, $key) {
                    return $value !== "...";
                }
            ),
            'streets'   => $streets->sort()->filter(
                function ($value, $key) {
                    return $value !== "...";
                }
            ),
        ];

        return view(
            'monolit.pages.main',
            [
                'article'    => $this->getApartments(),
                'houses'     => $this->getHouses(),
                'advantage'  => HomeText::first(),
                'block'      => Blocks::first(),
                'filterData' => $filterData
            ]
        );
    }

    public function viewObject(Request $request, $object) {
        $object = $this->apartments
            ->where('object_code', $object)
            ->with('getAttributesObject')->first();

        if(!$object) {
            abort(404);
        }

        if (Cookie::has('view_recently')) {
            $cookie_old = Cookie::get('view_recently');
            $cookie_new = array_merge($cookie_old, [$object->id]);
            Cookie::queue('view_recently', $cookie_new, 36000);
        } else {
            Cookie::queue('view_recently', [$object->id], 36000);
        }

        if (!$this->sessionGetViews($request->ip(), $object->id)) {
            $object->increment('view_counter', 1);
        }



        $view = View::make('monolit.pages.object', [
            'object' => $object,
            'similar' => $this->similarOffers($object),
            'title' =>  $object->sale == 1 ? 'Аренда ' : 'Продажа ' .$object->estate_type.' '.$object->room_quantity.' - комн.'.' '.$object->street.' '.$object->house_no .' г. '. $object->city. ', ' .$object->district. ', Монолит агенство недвижимости.',
            'urls' => [
                is_null($object->next()) ? null : route('view.object', ['link' => $object->next()->object_code]),
                is_null($object->previous()) ? null : route('view.object', ['link' => $object->previous()->object_code]),
            ]
        ]);

        return Response::make($view);
    }

    public function ajax(Request $request) {
        if (!$request->ajax()) {
            return response()
                ->json([
                    'status'    => 403,
                    'message'   => 'Forbidden'
                ], 403);
        }

        $places = null;
        switch ($request->input('type')) {
            case '#apartment':
                $places = $this->getApartments();
                break;

            case '#houses':
                $places = $this->getHouses();
                break;
        }

        if ($places === null) {
            return response()
                ->json([
                    'status'    => 404,
                    'message'   => 'Places not found'
                ], 404);
        }

        foreach ($places as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }

        return response()
            ->json([
                'status'    => 200,
                'data'      => $places
            ], 200);
    }

    private function getApartments() {
        $places = $this->apartments
            ->where('estate_type', 'Квартира')
            ->inRandomOrder()
            ->with('getAttributesObject')
            ->take(3)
            ->get();

        foreach ($places as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }

        return $places;
    }

    private function getHouses() {
        $places = $this->apartments
            ->where('estate_type', 'Дом')
            ->inRandomOrder()
            ->with('getAttributesObject')
            ->take(3)
            ->get();

        foreach ($places as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }

        return $places;
    }

    public function viewAllOffers($category) {
        $places = null;
        switch ($category) {
            case 'apartments':
                $places = $this->apartments
                    ->where('estate_type', 'Квартира')
                    ->inRandomOrder()
                    ->with('getAttributesObject')
                    ->paginate(12);
                break;
            case 'houses':
                $places = $this->apartments
                    ->where('estate_type', 'Дом')
                    ->inRandomOrder()
                    ->with('getAttributesObject')
                    ->paginate(12);
                break;

            default:
                abort(404);
                break;
        }
        
        if (is_null($places)) {
            abort(404);
        }

        foreach ($places as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }

        return view('monolit.pages.offers', [
            'offers' => $places
        ]);
    }

    private function similarOffers($object) {
        $places = $this->apartments->whereBetween('price', [$object->price - 3000, $object->price + 3000])
            ->where('id', '!=', $object->id)
            ->inRandomOrder()
            ->with('getAttributesObject')
            ->take(3)
            ->get();

        foreach ($places as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }
        return $places;
    }

    private function sessionGetViews($ip, $id) {
        if (session()->has('views')) {
            if (!in_array($ip.':'.$id, session('views'))) {
                session()->push('views', $ip.':'.$id);
                return false;
            }
            return true;
        } else {
            session()->push('views', $ip.':'.$id);
            return false;
        }
    }

    public function company()
    {
        return view('monolit.pages.company', [
            'company' =>  Company::first()['text'],
        ]);

    }

    public function presentation()
    {
        return view('monolit.pages.presentation', [
            'presentation' =>  Presentation::first()['text'],
        ]);

    }

    public function saveView($view)
    {
        session()->put('view', $view);

        return response()
            ->json([
                'status' => 200,
            ], 200);
    }


    public function district($city)
    {
        $district = Apartments::where('city', $city)->get()->groupBy('district')->toArray();

        return response()
            ->json([
                'data'   => array_keys($district),
                'status' => 200,
            ], 200);
    }

    public function filter(Request $request)
    {
        $apartments = Apartments::filter($request->all())->orderBy('price')->paginate(12);

        foreach ($apartments as $place) {
            for ($i = 0; $i < $place->getAttributesObject->count(); $i++) {
                if ($place->getAttributesObject[$i]['p_tag'] === 'pic') {
                    $place['photo'] = (is_null($place->getAttributesObject[$i]['item'])) ? null : 'https://monolit.sale/web_i/img/'.$place->getAttributesObject[$i]['item'];
                }
            }
        }

        return view('monolit.pages.filter', [
            'offers' => $apartments
        ]);
    }

    public function recently()
    {
        if (count(Cookie::get('view_recently')) > 0) {
            $places = Apartments::whereIn('id', Cookie::get('view_recently'))
                ->with('getAttributesObject')
                ->get();

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

        return view('monolit.pages.recently', [
            'offers' => $places
        ]);
    }

    public function realty()
    {
        $realtys = Realty::with('items')
            ->whereActive(1)->get();

        return view('monolit.pages.realty', [
            'realtys' => $realtys,
            'text' => HomeText::findOrFail(2)
        ]);
    }
}
