<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Viewblock;
use App\Manageblock;
use App\Employees;
use App\Editblock;
use DB;
use Auth;

class ViewblocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewblock($blockname)
    {

        $getblocks =   Manageblock::select('id','block_name','block_count')
                        ->where('block_name',$blockname)
                        ->get();

        $viewblocks =   DB::table('employees')
                        ->join('blockdetails','block_emp_id', '=' ,'employees.emp_id')
                        ->join('machinedetails','machine_id', '=' ,'employees.emp_machine')
                        ->where('emp_delete','0')
                        ->where('block_name',$blockname)
                        ->orderby('employees.emp_id','asc')
                        ->get();
        $employeesrows = [];
        foreach ($viewblocks as $key => $value) {
           $employeesrows[$value->block_id] = $value;
        }

        $blockselects = DB::table('manageblocks')
                        ->join('blockdetails','blockdetails.block_name', '=' ,'manageblocks.block_name')
                        ->where('manageblocks.block_name',$blockname)
                        ->get();
        $blockrows = [];
        foreach ($blockselects as $key => $value) {
            $blockrows[$value->block_name]['info'] = $employeesrows;
            $blockrows[$value->block_name]['block_count'] = $value->block_count;
        }
        $data = [
            'employeesrows' => $employeesrows,
            'blockrows' => $blockrows,
            'getblocks'=> $getblocks
        ];
        return view('blocks.viewblock')->with($data);

        
    }

    public function editblock($blockname)
    {
        $getblocks =   Manageblock::select('id','block_name','block_count')
                        ->where('block_name',$blockname)
                        ->get();

        $viewblocks =   DB::table('employees')
                        ->join('blockdetails','block_emp_id', '=' ,'employees.emp_id')
                        ->join('machinedetails','machine_id', '=' ,'employees.emp_machine')
                        ->where('emp_delete','0')
                        ->orderby('employees.emp_id','asc')
                        ->get();
        $employeesrows = [];
        foreach ($viewblocks as $key => $value) {
           $employeesrows[$value->block_id] = $value;
        }

        $editblockselects = DB::table('blockdetails')->get();

        $blockselects = DB::table('manageblocks')
                        ->join('blockdetails','blockdetails.block_name', '=' ,'manageblocks.block_name')
                        ->where('manageblocks.block_name',$blockname)
                        ->get();
        $blockrows = [];
        foreach ($blockselects as $key => $value) {
            $blockrows[$value->block_name]['info'] = $employeesrows;
            $blockrows[$value->block_name]['block_name'] = $value->block_name;
            $blockrows[$value->block_name]['block_count'] = $value->block_count;
        }


        $emprows = DB::table('employees')->orderby('emp_name','asc')->get();
        $data = [
            'employeesrows' => $employeesrows,
            'blockrows' => $blockrows,
            'emprows' => $emprows,
            'getblocks' => $getblocks
        ];
        
        return view('admin.editblock')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'block_emp_id' => 'unique:blockdetails',
        ]);

        $getid = Auth::user();
        $adminid = $getid->userid;

        $assignblock = new Editblock;
        $assignblock->block_id = $request->input('blockidname');
        $assignblock->block_emp_id = $request->input('emp_list');
        $assignblock->block_name = $request->input('blockname');
        $assignblock->admin_id = $adminid;

        $assignblock->save();

        return redirect('editblock/'.$assignblock->block_name);
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

        $key_array = array_keys($_GET);
        $del_block_name = $key_array[0];
        $editblockselects = Editblock::where('block_emp_id', $id)->where('block_name', $del_block_name);
        $editblockselects->delete();

        return redirect('editblock/'.$del_block_name);
    }
}
