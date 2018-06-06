@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Department Details</h3>

			{!! Form::open(['action' => 'DepartmentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="row">
				    
				    <div class="form-group col-md-8">
				    	{{Form::label('department_name', 'Department Name')}}
	    				{{Form::text('department_name','', ['class' => 'form-control', 'placeholder' => 'Department Name'])}}
	    			</div>

	    			<div class="form-group col-md-4">
				    	{{Form::label('', '&nbsp;')}}<br>
				    	{{Form::submit('Add Department',['class' => 'btn btn-success'])}}
				    </div>

	    		</div>
			{!! Form::close() !!}

		    <div class="machine-table">
		    	@if(count($departments) > 0)
			    	<table class="table table-bordered">
			    		<tbody>
			    			<tr>
				    			<th>Group name</th>
				    			{{-- <th>Group name</th> --}}
				    			<th>Action</th>
				    		</tr>

		    				@foreach($departments as $department)
		    				<tr>
				    			<td>{{$department->department_name}}</td>
				    			{{-- <td>Actions</td> --}}
				    			<td>
									{!!Form::open(['action' => ['DepartmentsController@destroy',$department->department_id], 'method'=> 'POST'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
									{!!Form::close()!!}
				    			</td>
		    				</tr>
			    			@endforeach
				    	</tbody>
				    </table>
    			@else
    				<p>Please add new Group.</p>
		    	@endif
			    {{$departments->links()}}
		    </div>
		</div>
	</div>
	</div>

@endsection