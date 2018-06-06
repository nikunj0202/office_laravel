<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Company;
use App\Machinedetails;
use App\Viewblock;
use App\Manageblock;
use App\Employees;
use DB;

class AjaxController extends Controller
{
    public function fetchEmployeeRecord(Request $request)
    {
    	$id = $request->input('id');

        $employees = DB::table('employees')
                        ->join('departments','department_id', '=', 'employees.emp_department')
                        ->join('companies','company_id', '=', 'employees.emp_group')
                        ->join('machinedetails','machine_id', '=', 'employees.emp_machine')
                        ->orderby('emp_name','asc')
                        ->where('emp_id',$id)
                        ->get();
        $deptselects = Department::orderby('department_name','asc')->get();
        $companyselects = Company::orderby('company_name','asc')->get();
        $machineselects =Machinedetails::orderby('machine_name','asc')->get();

        // print_r($employees);
        return json_encode($employees[0]);
        // return array('emp_record' => $employees);

    }
}
