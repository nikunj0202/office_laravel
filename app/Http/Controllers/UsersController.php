<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addusers()
    {
        $users = User::orderby('name','asc')->get();
        return view('admin.viewusers')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.viewemployees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::find($id);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'userid' => 'required|integer|min:4|unique:users'
        ]);

        // Insert Data
        $users = new User;
        $users->name            =   $request->input('name');
        $users->userid          =   $request->input('userid');
        $users->email           =   $request->input('email');

        $users->save();

        return redirect('/addusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('admin.viewusers')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.editusers')->with('users',$users);
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
        $users = User::find($id);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,id,'.$users->id,
            // 'userid' => 'required|integer|min:4|unique:users'
        ]);

        // Insert Data
        $users->name            =   $request->input('name');
        $users->userid          =   $request->input('userid');
        $users->email           =   $request->input('email');

        $users->save();

        return redirect('/addusers');
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
