<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RealtyItems;
use App\Http\Requests\CreateRealtyItemsRequest;
use App\Http\Requests\UpdateRealtyItemsRequest;
use Illuminate\Http\Request;

use App\Realty;


class RealtyItemsController extends Controller {

	/**
	 * Display a listing of realtyitems
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $realtyitems = RealtyItems::with("realty")->get();

		return view('admin.realtyitems.index', compact('realtyitems'));
	}

	/**
	 * Show the form for creating a new realtyitems
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $realty = Realty::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.realtyitems.create', compact("realty"));
	}

	/**
	 * Store a newly created realtyitems in storage.
	 *
     * @param CreateRealtyItemsRequest|Request $request
	 */
	public function store(CreateRealtyItemsRequest $request)
	{
	    
		RealtyItems::create($request->all());

		return redirect()->route(config('quickadmin.route').'.realtyitems.index');
	}

	/**
	 * Show the form for editing the specified realtyitems.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$realtyitems = RealtyItems::find($id);
	    $realty = Realty::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.realtyitems.edit', compact('realtyitems', "realty"));
	}

	/**
	 * Update the specified realtyitems in storage.
     * @param UpdateRealtyItemsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRealtyItemsRequest $request)
	{
		$realtyitems = RealtyItems::findOrFail($id);

        

		$realtyitems->update($request->all());

		return redirect()->route(config('quickadmin.route').'.realtyitems.index');
	}

	/**
	 * Remove the specified realtyitems from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RealtyItems::destroy($id);

		return redirect()->route(config('quickadmin.route').'.realtyitems.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            RealtyItems::destroy($toDelete);
        } else {
            RealtyItems::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.realtyitems.index');
    }

}
