<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MetaTags;
use App\Http\Requests\CreateMetaTagsRequest;
use App\Http\Requests\UpdateMetaTagsRequest;
use Illuminate\Http\Request;



class MetaTagsController extends Controller {

	/**
	 * Display a listing of metatags
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $metatags = MetaTags::all();

		return view('admin.metatags.index', compact('metatags'));
	}

	/**
	 * Show the form for creating a new metatags
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.metatags.create');
	}

	/**
	 * Store a newly created metatags in storage.
	 *
     * @param CreateMetaTagsRequest|Request $request
	 */
	public function store(CreateMetaTagsRequest $request)
	{
	    
		MetaTags::create($request->all());

		return redirect()->route(config('quickadmin.route').'.metatags.index');
	}

	/**
	 * Show the form for editing the specified metatags.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$metatags = MetaTags::find($id);
	    
	    
		return view('admin.metatags.edit', compact('metatags'));
	}

	/**
	 * Update the specified metatags in storage.
     * @param UpdateMetaTagsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMetaTagsRequest $request)
	{
		$metatags = MetaTags::findOrFail($id);

        

		$metatags->update($request->all());

		return redirect()->route(config('quickadmin.route').'.metatags.index');
	}

	/**
	 * Remove the specified metatags from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MetaTags::destroy($id);

		return redirect()->route(config('quickadmin.route').'.metatags.index');
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
            MetaTags::destroy($toDelete);
        } else {
            MetaTags::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.metatags.index');
    }

}
