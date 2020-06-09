<?php

namespace App\Http\Controllers;

use App\Apartments;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $_apartments;

    public function __construct(Apartments $apartments)
    {
        $this->_apartments = $apartments;
    }

    public function index(Request $request) {
        if (is_null($request->input('search'))) {
            return $this->notFoundResult();
        }

        $apartments = $this->_apartments
                ->where('object_code', $request->input('search'))
                ->first();

        if ($apartments) {
            return redirect()
                ->route('view.object', ['link' => $apartments->object_code]);
        }

        return $this->notFoundResult();
    }

    private function notFoundResult() {

        return view('monolit.pages.404');
    }
}
