@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Machine Details</h3>

			{!! Form::open(['action' => 'MachinesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="row">
				    
				    <div class="form-group col-md-12">
				    	{{Form::label('machine_name', 'Machine Name')}}
	    				{{Form::text('machine_name','', ['class' => 'form-control', 'placeholder' => 'Machine Name'])}}
	    			</div>

	    			<div class="form-group col-md-12">
				    	{{Form::file('machine_image')}}
				    </div>

	    			<div class="form-group col-md-12">
				    	{{Form::submit('Add',['class' => 'btn btn-success'])}}
				    </div>

	    		</div>
			{!! Form::close() !!}

		    <div class="machine-table">
		    	@if(count($machinedetails) > 0)
			    	<table class="table table-bordered">
			    		<tbody>
			    			<tr>
				    			<th>Machine name</th>
				    			<th>Machine Image</th>
				    			<th>Action</th>
				    		</tr>

		    				@foreach($machinedetails as $machinedetail)
		    				<tr>
				    			<td>{{$machinedetail->machine_name}}</td>
				    			<td><img src="storage/images/{{$machinedetail->machine_image}}"></td>
				    			<td>
				    				{!!Form::open(['action' => ['MachinesController@destroy',$machinedetail->machine_id], 'method'=> 'POST'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
									{!!Form::close()!!}
				    			</td>
		    				</tr>
			    			@endforeach
				    	</tbody>
				    </table>
    			@else
    				<p>Please add new machine.</p>
		    	@endif
			    {{$machinedetails->links()}}
		    </div>
		</div>
	</div>
	</div>

@endsection