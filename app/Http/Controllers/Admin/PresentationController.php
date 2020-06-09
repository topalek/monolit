<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Presentation;
use App\Http\Requests\CreatePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use Illuminate\Http\Request;



class PresentationController extends Controller {

	/**
	 * Display a listing of presentation
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
//	public function index(Request $request)
//    {
//        $presentation = Presentation::all();
//
//		return view('admin.presentation.index', compact('presentation'));
//	}

	/**
	 * Show the form for creating a new presentation
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.presentation.create');
	}

	/**
	 * Store a newly created presentation in storage.
	 *
     * @param CreatePresentationRequest|Request $request
	 */
	public function store(CreatePresentationRequest $request)
	{
	    
		Presentation::create($request->all());

		return redirect()->route(config('quickadmin.route').'.presentation.index');
	}

	/**
	 * Show the form for editing the specified presentation.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$presentation = Presentation::find($id);
	    
	    
		return view('admin.presentation.edit', compact('presentation'));
	}

	/**
	 * Update the specified presentation in storage.
     * @param UpdatePresentationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePresentationRequest $request)
	{
		$presentation = Presentation::findOrFail($id);

        

		$presentation->update($request->all());

		return redirect()->back();
	}

	/**
	 * Remove the specified presentation from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Presentation::destroy($id);

		return redirect()->route(config('quickadmin.route').'.presentation.index');
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
            Presentation::destroy($toDelete);
        } else {
            Presentation::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.presentation.index');
    }

}
