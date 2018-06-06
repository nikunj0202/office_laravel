@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="add-emp-form">
				<h3><strong>Edit User </strong></h3>
				{!! Form::open(['action' => ['UsersController@update', $users->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="row">
					    
		    			<div class="form-group col-md-4">
					    	{{Form::label('name', 'Employee Name')}}
		    				{{Form::text('name', $users->name, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-4">
					    	{{Form::label('userid', 'Employee ID')}}
		    				{{Form::text('userid',$users->userid, ['class' => 'form-control'])}}
		    			</div>

		    			<div class="form-group col-md-4">
					    	{{Form::label('email', 'Employee ID')}}
		    				{{Form::text('email',$users->email, ['class' => 'form-control'])}}
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