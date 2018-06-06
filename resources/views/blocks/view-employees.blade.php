@extends('layouts.app')

@section('content')
	<div class="container">
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
			    		</tr>
				    	@endforeach
			    	</tbody>
			    </table>
			@else
				<p>Please add Employees</p>
			@endif
		</div>
	</div>

@endsection