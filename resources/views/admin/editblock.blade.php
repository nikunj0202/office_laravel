@extends('layouts.app')

@section('content')

	@foreach($getblocks as $getblock)
		<div id="view-{{$getblock->block_name}}" class=" block block-edit {{$getblock->block_name}} view-{{$getblock->block_name}}">
		    <div class="container">
		        <div class="row">
		            <div class="block-inner">
		            	{{-- {{dd($blockrows)}} --}}
		            	@if(empty($blockrows))
		            		@for($i=1; $i<=$getblock->block_count; $i++)
			            		<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
		                            <a href='javascript:void(0);' class='add-profile' data-toggle='modal' data-target='#blockModal'><div></div></a>
		                        </div>
		                    @endfor
		            	@else
							@foreach($blockrows as $blockrow)
								@php ($block_count = $blockrow['block_count'])	        		
								@php ($block_name = $blockrow['block_name'])

								@for($i=1; $i<=$getblock->block_count; $i++)
				        			@if(!empty($blockrow['info'][$i]))
				        				<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
											<a href='javascript:void(0);' class='add-profile'  data-toggle='modal' data-target='#blockModal' style='background-image:url(/storage/images/uploads/{{$blockrow['info'][$i]->emp_profile}});background-size:cover;background-color: #fff;'>
												<div class='{{$blockrow['info'][$i]->emp_id}}'></div>
											</a>
		                                    @php ($param1 = $blockrow['info'][$i]->emp_id)
		                                    @php ($param2 = $getblock->block_name)
		                                    {{-- {{dd($param2)}} --}}
		                                    {!!Form::open(['action' => ['ViewblocksController@destroy', $param1, $param2], 'method'=> 'POST'])!!}
												{{Form::hidden('_method','DELETE')}}
												{{Form::button("<span><i class='fa fa-trash' aria-hidden='true'></i></span>", ['value'=>'abc','class' => 'btn remove-profile','type' => 'submit','id' => 'remove-profile'])}}
											{!!Form::close()!!}
		                            	</div>
			        				@else
			        					<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
		                                    <a href='javascript:void(0);' class='add-profile' data-toggle='modal' data-target='#blockModal'><div></div></a>
		                                </div>
			        				@endif
					        	@endfor
				            @endforeach
		            	@endif
					</div>
		        </div>
		    </div>
		</div>
	@endforeach

	<!-- Modal -->
	<div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="emp-details-main">
                {!! Form::open(['action' => 'ViewblocksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
				<div class="row">
				    
				    <div class="form-group col-md-12">
				    	{{Form::label('emp_name:', 'Employee Name:')}}
				    	<select class="form-control" id="emp_list" name="emp_list" data-live-search="true">
				    		@foreach($emprows as $emprow)
				    			<option value="{{$emprow->emp_id}}">{{$emprow->emp_name}}</option>
				    		@endforeach
				    	</select>
				    	<input type="hidden" name="blockidname" id="blockidname" value="">
				    	<input type="hidden" name="blockname" id="blockname" value="{{$getblock->block_name}}">
	    			</div>

	    			<div class="form-group col-md-12">
				    	{{Form::submit('Add',['class' => 'btn btn-success'])}}
				    </div>

	    		</div>
			{!! Form::close() !!}
            </div>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$(".block-cols").on('click', function(){
	        var blockid = $(this).attr('id');
	        $("#blockidname").val(blockid);
	    });
		$('#emp_list').selectpicker({
      		style: 'btn-primary',
  			size: 4
    	});
	</script>       	

@endsection



<link rel="stylesheet" type="text/css" href="../css/{{$getblock->block_name}}.css">
