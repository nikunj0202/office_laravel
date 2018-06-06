@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Block Details</h3>

			{!! Form::open(['action' => 'ManageblocksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="row">
				    
				    <div class="form-group col-md-4">
				    	{{Form::label('block_name', 'Block Name')}}
	    				{{Form::text('block_name','', ['class' => 'form-control', 'placeholder' => 'Block Name'])}}
	    			</div>

	    			<div class="form-group col-md-4">
				    	{{Form::label('block_count', 'Block Count')}}
	    				{{Form::text('block_count','', ['class' => 'form-control', 'placeholder' => 'Block Count'])}}
	    			</div>

	    			<div class="form-group col-md-4">
				    	{{Form::label('', '&nbsp;')}}<br>
				    	{{Form::submit('Add Block',['class' => 'btn btn-success'])}}
				    </div>

	    		</div>
			{!! Form::close() !!}

		    <div class="machine-table">
		    	@if(count($manageblocks) > 0)
			    	<table class="table table-bordered">
			    		<tbody>
			    			<tr>
				    			<th>Block Name</th>
				    			<th>Block Count</th>
				    			{{-- <th>Action</th> --}}
				    		</tr>

		    				@foreach($manageblocks as $manageblock)
		    				<tr>
				    			<td>{{$manageblock->block_name}}</td>
				    			<td>{{$manageblock->block_count}}</td>
				    			{{-- <td>
									{!!Form::open(['action' => ['ManageblocksController@destroy',$manageblock->id], 'method'=> 'POST'])!!}
										{{Form::hidden('_method','DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
									{!!Form::close()!!}
				    			</td> --}}
		    				</tr>
			    			@endforeach
				    	</tbody>
				    </table>
    			@else
    				<p>Please add new Group.</p>
		    	@endif
			    {{$manageblocks->links()}}
		    </div>
		</div>
	</div>
	</div>

@endsection