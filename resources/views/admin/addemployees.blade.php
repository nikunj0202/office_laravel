@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="add-emp-form">
				<h3><strong>Add Employee Details</strong></h3>
				{!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="row">
					    
		    			<div class="form-group col-md-12">
					    	{{Form::file('emp_image')}}
					    </div>

					    <div class="form-group col-md-6">
					    	{{Form::label('emp_name', 'Employee Name')}}
		    				{{Form::text('emp_name','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_id', 'Employee ID')}}
		    				{{Form::text('emp_id','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_ext', 'Employee Extension')}}
		    				{{Form::text('emp_ext','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_designation', 'Employee Designation')}}
		    				{{Form::text('emp_designation','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_department', 'Employee Department')}}
					    	<select class="form-control" name="deptselects">
								@foreach($deptselects as $deptselect)
									<option value="{{$deptselect->department_id}}">{{$deptselect->department_name}}</option>
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_group', 'Employee Group')}}
					    	<select class="form-control" name="companyselects">
								@foreach($companyselects as $companyselect)
									<option value="{{$companyselect->company_id}}">{{$companyselect->company_name}}</option>
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_mobile', 'Employee Mobile')}}
		    				{{Form::text('emp_mobile','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_email', 'Employee Email')}}
		    				{{Form::text('emp_email','', ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_machine', 'Employee Work Machine')}}
		    				<select class="form-control" name="machineselects">
								@foreach($machineselects as $machineselect)
									<option value="{{$machineselect->machine_id}}">{{$machineselect->machine_name}}</option>
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_address', 'Employee Address')}}
		    				{{Form::textarea('emp_address','', ['class' => 'form-control','rows' => '1'])}}
		    			</div>

		    			<div class="form-group col-md-12">
					    	{{Form::submit('Add',['class' => 'btn btn-success'])}}
					    </div>

		    		</div>
				{!! Form::close() !!}
			</div>
		</div>

		<div class="col-md-12">
			<div class="signup-table">
				@if(count($employees) > 0)
			    	<table class="table table-bordered">
			    		<tbody>
			    			<tr>
				    			<th>Employee ID</th>
				    			<th>Name</th>
				    			<th>Profile</th>
				    			<th>Employee Extension</th>
				    			<th>Employee Designation</th>
				    			<th>Employee Department</th>
				    			<th>Company Group</th>
				    			<th>Work Machine</th>
				    			<th width="10%">Action</th>
				    		</tr>
				    		@foreach($employees as $employee)
				    		<tr>
				    			<td>{{$employee->emp_id}}</td>
				    			<td>{{$employee->emp_name}}</td>
				    			<td><img src="storage/images/uploads/{{$employee->emp_profile}}"></td>
				    			<td>{{$employee->emp_ext}}</td>
				    			<td>{{$employee->emp_designation}}</td>
				    			<td>{{$employee->department_name}}</td>
				    			<td>{{$employee->company_name}}</td>
				    			<td>{{$employee->machine_name}}</td>
				    			<td width="15%">
				    				<a href="/editemployee/{{$employee->id}}" class="btn btn-success">Edit</a>
				    				{!!Form::open(['action' => ['EmployeesController@destroy',$employee->id], 'method'=> 'POST','class'=>'float-right'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
									{!!Form::close()!!}
				    			</td>
				    		</tr>
					    	@endforeach
				    	</tbody>
				    </table>
				@else
					<p>Please add Employees</p>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection