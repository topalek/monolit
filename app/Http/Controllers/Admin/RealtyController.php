<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RealtyItems;
use Redirect;
use Schema;
use App\Realty;
use App\Http\Requests\CreateRealtyRequest;
use App\Http\Requests\UpdateRealtyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class RealtyController extends Controller {

	/**
	 * Display a listing of realty
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $realty = Realty::all();

		return view('admin.realty.index', compact('realty'));
	}

	/**
	 * Show the form for creating a new realty
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.realty.create');
	}

	/**
	 * Store a newly created realty in storage.
	 *
     * @param CreateRealtyRequest|Request $request
	 */
	public function store(CreateRealtyRequest $request)
	{
	    $request = $this->saveFiles($request);

        $realty = Realty::create($request->all());

        foreach ($request->all()['title'] as $key => $value) {
            RealtyItems::create([
                'realty_id' => $realty->id,
                'title' => $value,
                'url' => $request->all()['url'][$key]
            ]);
        }

		return redirect()->route(config('quickadmin.route').'.realty.index');
	}

	/**
	 * Show the form for editing the specified realty.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$realty = Realty::find($id);
	    
	    
		return view('admin.realty.edit', compact('realty'));
	}

	/**
	 * Update the specified realty in storage.
     * @param UpdateRealtyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRealtyRequest $request)
	{
		$realty = Realty::findOrFail($id);

        $request = $this->saveFiles($request);

		$realty->update($request->all());

		RealtyItems::whereRealtyId($id)->delete();
        foreach ($request->all()['title'] as $key => $value) {
            RealtyItems::create([
                'realty_id' => $id,
                'title' => $value,
                'url' => $request->all()['url'][$key]
            ]);
        }


		return redirect()->route(config('quickadmin.route').'.realty.index');
	}

	/**
	 * Remove the specified realty from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Realty::destroy($id);

		return redirect()->route(config('quickadmin.route').'.realty.index');
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
            Realty::destroy($toDelete);
        } else {
            Realty::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.realty.index');
    }

}
