<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Company;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;



class CompanyController extends Controller {

	/**
	 * Display a listing of company
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
//	public function index(Request $request)
//    {
//        $company = Company::all();
//
//		return view('admin.company.index', compact('company'));
//	}

	/**
	 * Show the form for creating a new company
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.company.create');
	}

	/**
	 * Store a newly created company in storage.
	 *
     * @param CreateCompanyRequest|Request $request
	 */
	public function store(CreateCompanyRequest $request)
	{
	    
		Company::create($request->all());

		return redirect()->route(config('quickadmin.route').'.company.index');
	}

	/**
	 * Show the form for editing the specified company.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$company = Company::find($id);
	    
	    
		return view('admin.company.edit', compact('company'));
	}

	/**
	 * Update the specified company in storage.
     * @param UpdateCompanyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCompanyRequest $request)
	{
		$company = Company::findOrFail($id);

        

		$company->update($request->all());

		return redirect()->back();
	}

	/**
	 * Remove the specified company from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Company::destroy($id);

		return redirect()->route(config('quickadmin.route').'.company.index');
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
            Company::destroy($toDelete);
        } else {
            Company::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.company.index');
    }

}
