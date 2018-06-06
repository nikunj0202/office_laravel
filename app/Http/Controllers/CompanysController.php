<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcompany()
    {
        // $companydetails = DB::table('companies')
        //                 ->orderby('company_name','asc')
        //                 ->paginate(10);
        $companydetails = Company::orderby('company_name','asc')->paginate(10);
        return view('admin.addcompany')->with('companydetails', $companydetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|unique:companies'
        ]);

        // Insert Data
        $companydetails = new Company;
        $companydetails->company_name = $request->input('company_name');

        $companydetails->save();

        return redirect('/addcompany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companydetails = Company::where('company_id', $id);
        $companydetails->delete();
        // print_r($companydetails);
        // die();

        // $companydetails = DB::delete('delete from companies where company_id = ?',[$id]);

        return redirect('/addcompany');
    }
}
