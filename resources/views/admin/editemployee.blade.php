@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="add-emp-form">
				<h3><strong>Edit Employee </strong></h3>
				{!! Form::open(['action' => ['EmployeesController@update', $employees->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="row">
					    
		    			<div class="form-group col-md-12">
		    				<img src="../storage/images/uploads/{{$employees->emp_profile}}">
					    	{{Form::file('emp_image')}}
					    </div>

					    <div class="form-group col-md-6">
					    	{{Form::label('emp_name', 'Employee Name')}}
		    				{{Form::text('emp_name', $employees->emp_name, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_id', 'Employee ID')}}
		    				{{Form::text('emp_id',$employees->emp_id, ['class' => 'form-control','disabled'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_ext', 'Employee Extension')}}
		    				{{Form::text('emp_ext',$employees->emp_ext, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_designation', 'Employee Designation')}}
		    				{{Form::text('emp_designation',$employees->emp_designation, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_department', 'Employee Department')}}
					    	<select class="form-control" name="deptselects">
					    		@foreach($deptselects as $deptselect)
									@if($deptselect->department_id == $employees->emp_department)
										<option value="{{$deptselect->department_id}}" selected='selected'>{{$deptselect->department_name}}</option>
									@else
										<option value="{{$deptselect->department_id}}">{{$deptselect->department_name}}</option>
									@endif
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_group', 'Employee Group')}}
					    	<select class="form-control" name="companyselects">
								@foreach($companyselects as $companyselect)
									@if($companyselect->company_id ==  $employees->emp_group)
										<option value="{{$companyselect->company_id}}" selected='selected'>{{$companyselect->company_name}}</option>
									@else
										<option value="{{$companyselect->company_id}}">{{$companyselect->company_name}}</option>
									@endif
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_mobile', 'Employee Mobile')}}
		    				{{Form::text('emp_mobile',$employees->emp_mobile, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_email', 'Employee Email')}}
		    				{{Form::text('emp_email',$employees->emp_email, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_machine', 'Employee Work Machine')}}
		    				<select class="form-control" name="machineselects">
								@foreach($machineselects as $machineselect)
									@if($machineselect->machine_id == $employees->emp_machine)
										<option value="{{$machineselect->machine_id}}" selected='selected'>{{$machineselect->machine_name}}</option>
									@else
										<option value="{{$machineselect->machine_id}}">{{$machineselect->machine_name}}</option>
									@endif
								@endforeach
							</select>
		    			</div>

		    			<div class="form-group col-md-6">
					    	{{Form::label('emp_address', 'Employee Address')}}
		    				{{Form::textarea('emp_address',$employees->emp_address, ['class' => 'form-control','rows' => '1'])}}
		    			</div>

		    			<div class="form-group col-md-12">
		    				{{Form::hidden('_method', 'PUT')}}
					    	{{Form::submit('Update',['class' => 'btn btn-success'])}}
					    </div>

		    		</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection