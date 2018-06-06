<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manageblock;
use DB;

class ManageblocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageblock()
    {
        $manageblocks = Manageblock::orderby('block_name','asc')->paginate(10);
        return view('admin.manageblocks')->with('manageblocks', $manageblocks);
        // return view('admin.manageblocks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manageblocks');
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
            'block_name' => 'required|unique:manageblocks'
        ]);

        // Insert Data
        $manageblocks = new Manageblock;
        $manageblocks->block_name = $request->input('block_name');
        $manageblocks->block_count = $request->input('block_count');

        $manageblocks->save();

        return redirect('/manageblocks');
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
        //
    }
}
