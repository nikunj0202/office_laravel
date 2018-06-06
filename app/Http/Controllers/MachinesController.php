<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Machinedetails;
use DB;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmachine()
    {
        // $machinedetails = Machinedetails::all();
        // $machinedetails = Machinedetails::orderby('machine_name','asc')->get();
        // $machinedetails = Machinedetails::orderby('machine_name','asc')->take(1)->get();
        // $machinedetails = DB::select('SELECT * FROM machinedetails ORDER BY machine_name ASC');

        
        $machinedetails = Machinedetails::orderby('machine_name','asc')->paginate(10);
        return view('admin.addmachine')->with('machinedetails', $machinedetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addmachine');
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
            'machine_name' => 'required',
            'machine_image' => 'required|image'
        ]);
        // return 123;

        if($request->hasFile('machine_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('machine_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext

            $extension = $request->file('machine_image')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'.'.$extension;

            //Uplaod Images
            $path = $request->file('machine_image')->storeAs('public/images', $filenameToStore);

        }

        // Insert Data
        $machinedetails = new Machinedetails;
        $machinedetails->machine_name = $request->input('machine_name');
        $machinedetails->machine_image = $filenameToStore;
        $machinedetails->machine_image_ext = $extension;

        // print_r($machinedetails);
        // die();

        $machinedetails->save();

        return redirect('/addmachine');
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
        // print_r($id);
        // die();
        $machinedetails = Machinedetails::where('machine_id', $id);
        $machinedetails->delete();

        // $companydetails = DB::delete('delete from companies where company_id = ?',[$id]);

        return redirect('/addmachine');
    }
}
