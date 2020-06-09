<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Blocks;
use App\Http\Requests\CreateBlocksRequest;
use App\Http\Requests\UpdateBlocksRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class BlocksController extends Controller {

	/**
	 * Display a listing of blocks
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
//	public function index(Request $request)
//    {
//        $blocks = Blocks::all();
//
//		return view('admin.blocks.index', compact('blocks'));
//	}

	/**
	 * Show the form for creating a new blocks
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.blocks.create');
	}

	/**
	 * Store a newly created blocks in storage.
	 *
     * @param CreateBlocksRequest|Request $request
	 */
	public function store(CreateBlocksRequest $request)
	{
	    $request = $this->saveFiles($request);
		Blocks::create($request->all());

		return redirect()->route(config('quickadmin.route').'.blocks.index');
	}

	/**
	 * Show the form for editing the specified blocks.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$blocks = Blocks::find($id);
	    
	    
		return view('admin.blocks.edit', compact('blocks'));
	}

	/**
	 * Update the specified blocks in storage.
     * @param UpdateBlocksRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBlocksRequest $request)
	{
		$blocks = Blocks::findOrFail($id);

        $request = $this->saveFiles($request);

		$blocks->update($request->all());

		return redirect()->back();
	}

	/**
	 * Remove the specified blocks from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Blocks::destroy($id);

		return redirect()->route(config('quickadmin.route').'.blocks.index');
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
            Blocks::destroy($toDelete);
        } else {
            Blocks::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.blocks.index');
    }

}
