<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blockdetails;
use App\Employees;
use App\Department;
use App\Company;
use App\Machinedetails;
use DB;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBlocks()
    {
        $title = 'Welcome to Laravel!';
        return view('blocks.view-blocks')->with('title',$title);
    }

    // public function viewBlock1()
    // {
    //     $data = array(
    //         'totalcount' => 60,
    //         'blockname' => 'block1'
    //     );
    //     return view('blocks.view-block1')->with($data);
    // }

    // public function viewBlock2()
    // {
    //     $data = array(
    //         'totalcount' => 60,
    //         'blockname' => 'block2'
    //     );
    //     return view('blocks.view-block2');
    // }

    public function viewemployees()
    {
        $employees = DB::table('employees')
                        ->join('departments','department_id', '=', 'employees.emp_department')
                        ->join('companies','company_id', '=', 'employees.emp_group')
                        ->join('machinedetails','machine_id', '=', 'employees.emp_machine')
                        ->orderby('emp_name','asc')
                        ->get();
                        // ->paginate(10);
        $deptselects = Department::orderby('department_name','asc')->get();
        $companyselects = Company::orderby('company_name','asc')->get();
        $machineselects =Machinedetails::orderby('machine_name','asc')->get();

        // foreach ($deptselects as $key => $value) {
        //     $result = $value['department_id' . 'department_name'];
        //     // die();
        // }
        $data = [
            'employees' => $employees,
            'deptselects' => $deptselects,
            'companyselects' => $companyselects,          
            'machineselects' => $machineselects            
        ];
        return view('blocks.view-employees')->with($data);

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
        //
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
