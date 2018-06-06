<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Department;
use App\Company;
use App\Machinedetails;
use DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addemployees()
    {
        $employees = DB::table('employees')
                        ->join('departments','department_id', '=', 'employees.emp_department')
                        ->join('companies','company_id', '=', 'employees.emp_group')
                        ->join('machinedetails','machine_id', '=', 'employees.emp_machine')
                        ->orderby('emp_name','asc')
                        ->where('emp_delete',0)
                        ->paginate(10);
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
        return view('admin.addemployees')->with($data);

    }

    // public function deptselect()
    // {
    //     return view('admin.addemployees', compact('department_id', 'deptselects'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addemployees');
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
            'emp_id'            => 'sometimes|required|unique:employees',
            'emp_name'          => 'required',
            'emp_ext'           => 'required',
            'emp_designation'   => 'required',
            'emp_mobile'        => 'sometimes|required|unique:employees',
            'emp_email'         => 'sometimes|required|email|unique:employees'
        ]);

        if($request->hasFile('emp_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('emp_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext

            $extension = $request->file('emp_image')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //Uplaod Images
            $path = $request->file('emp_image')->storeAs('public/images/uploads', $filenameToStore);

        } else {
            $filenameToStore = 'default.jpg';
            $extension = 'jpg';
        }

        // Insert Data
        $employees = new Employees;
        $employees->emp_name            =   $request->input('emp_name');
        $employees->emp_id              =   $request->input('emp_id');
        $employees->emp_profile         =   $filenameToStore;
        $employees->emp_ext             =   $request->input('emp_ext');
        $employees->emp_designation     =   $request->input('emp_designation');
        $employees->emp_department      =   $request->input('deptselects');
        $employees->emp_group           =   $request->input('companyselects');
        $employees->emp_mobile          =   $request->input('emp_mobile');
        $employees->emp_email           =   $request->input('emp_email');
        $employees->emp_address         =   $request->input('emp_address');
        $employees->emp_machine         =   $request->input('machineselects');
        $employees->emp_delete          =   0;
        $employees->emp_img_ext         =   $extension;

        $employees->save();

        return redirect('/addemployees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employees::find($id);
        return view('admin.addemployee')->with('employees', $employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employees::find($id);
        $deptselects = Department::orderby('department_name','asc')->get();
        $companyselects = Company::orderby('company_name','asc')->get();
        $machineselects =Machinedetails::orderby('machine_name','asc')->get();

        $data = [
            'employees' => $employees,
            'deptselects' => $deptselects,
            'companyselects' => $companyselects,          
            'machineselects' => $machineselects            
        ];
        return view('admin.editemployee')->with($data);

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
        $employees = Employees::find($id);
        $this->validate($request,[
            // 'emp_id'            => 'required|unique:employees',
            'emp_name'          => 'required',
            'emp_ext'           => 'required',
            'emp_designation'   => 'required',
            'emp_mobile'        => 'required|unique:employees,emp_mobile,'.$employees->id,
            'emp_email'         => 'required|email|unique:employees,emp_email,'.$employees->id,
            // 'emp_profile'       => 'required|image'.$employees->id,
            // 'emp_profile' => 'required|image',
            // 'emp_department' => 'required',
            // 'emp_group' => 'required',
            // 'emp_machine' => 'required'
        ]);

        if($request->hasFile('emp_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('emp_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext

            $extension = $request->file('emp_image')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //Uplaod Images
            $path = $request->file('emp_image')->storeAs('public/images/uploads', $filenameToStore);

        } else {
            $filenameToStore = $employees->emp_profile;
        }

        // Insert Data
        $employees->emp_name            =   $request->input('emp_name');
        $employees->emp_profile         =   $filenameToStore;
        $employees->emp_ext             =   $request->input('emp_ext');
        $employees->emp_designation     =   $request->input('emp_designation');
        $employees->emp_department      =   $request->input('deptselects');
        $employees->emp_group           =   $request->input('companyselects');
        $employees->emp_mobile          =   $request->input('emp_mobile');
        $employees->emp_email           =   $request->input('emp_email');
        $employees->emp_address         =   $request->input('emp_address');
        $employees->emp_machine         =   $request->input('machineselects');

        $employees->save();

        return redirect('/addemployees');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->emp_delete  =   1;

        $employees->save();
        
        return redirect('/addemployees');
    }
}
