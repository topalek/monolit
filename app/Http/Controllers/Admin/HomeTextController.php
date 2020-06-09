<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\HomeText;
use App\Http\Requests\CreateHomeTextRequest;
use App\Http\Requests\UpdateHomeTextRequest;
use Illuminate\Http\Request;



class HomeTextController extends Controller {

	/**
	 * Display a listing of hometext
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
//	public function index(Request $request)
//    {
//        $hometext = HomeText::all();
//
//		return view('admin.hometext.index', compact('hometext'));
//	}

	/**
	 * Show the form for creating a new hometext
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.hometext.create');
	}

	/**
	 * Store a newly created hometext in storage.
	 *
     * @param CreateHomeTextRequest|Request $request
	 */
	public function store(CreateHomeTextRequest $request)
	{
	    
		HomeText::create($request->all());

		return redirect()->route(config('quickadmin.route').'.hometext.index');
	}

	/**
	 * Show the form for editing the specified hometext.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$hometext = HomeText::find($id);
	    
	    
		return view('admin.hometext.edit', compact('hometext'));
	}

	/**
	 * Update the specified hometext in storage.
     * @param UpdateHomeTextRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHomeTextRequest $request)
	{
		$hometext = HomeText::findOrFail($id);

        

		$hometext->update($request->all());

		return redirect()->back();
	}

	/**
	 * Remove the specified hometext from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		HomeText::destroy($id);

		return redirect()->route(config('quickadmin.route').'.hometext.index');
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
            HomeText::destroy($toDelete);
        } else {
            HomeText::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.hometext.index');
    }

}
