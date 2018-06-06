@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Group Details</h3>

			{!! Form::open(['action' => 'CompanysController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="row">
				    
				    <div class="form-group col-md-8">
				    	{{Form::label('company_name', 'Group Name')}}
	    				{{Form::text('company_name','', ['class' => 'form-control', 'placeholder' => 'Group Name'])}}
	    			</div>

	    			<div class="form-group col-md-4">
				    	{{Form::label('', '&nbsp;')}}<br>
				    	{{Form::submit('Add Group',['class' => 'btn btn-success'])}}
				    </div>

	    		</div>
			{!! Form::close() !!}

		    <div class="machine-table">
		    	@if(count($companydetails) > 0)
			    	<table class="table table-bordered">
			    		<tbody>
			    			<tr>
				    			<th>Group name</th>
				    			{{-- <th>Group name</th> --}}
				    			<th>Action</th>
				    		</tr>

		    				@foreach($companydetails as $companydetail)
		    				<tr>
				    			<td>{{$companydetail->company_name}} {{$companydetail->company_id}}</td>
				    			<td>
									{!!Form::open(['action' => ['CompanysController@destroy',$companydetail->company_id], 'method'=> 'POST'])!!}
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
			    {{$companydetails->links()}}
		    </div>
		</div>
	</div>
	</div>

@endsection