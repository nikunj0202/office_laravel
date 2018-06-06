@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="signup-table">
			@if(count($users) > 0)
		    	<table class="table table-bordered">
		    		<tbody>
		    			<tr>
			    			<th>User ID</th>
			    			<th>Name</th>
			    			<th>Email</th>
			    			<th>Actions</th>
			    		</tr>
			    		@foreach($users as $user)
			    		<tr>
			    			<td>{{$user->userid}}</td>
			    			<td>{{$user->name}}</td>
			    			<td>{{$user->email}}</td>
			    			<td><a href="/editusers/{{$user->id}}" class="btn btn-success">Edit</a></td>
			    		</tr>
				    	@endforeach
			    	</tbody>
			    </table>
			@else
				<p>Please add Users</p>
			@endif
		</div>
	</div>

@endsection