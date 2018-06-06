{{-- <h1
	@foreach($getblocks as $getblock)
		<h1>{{ $getblock->block_name }}</h1>
		<h1>{{ $getblock->block_count }}</h1>
	@endforeach

</h1> --}}

@extends('layouts.app')

@section('content')

	@foreach($getblocks as $getblock)
		<div id="view-{{$getblock->block_name}}" class=" block {{$getblock->block_name}} view-{{$getblock->block_name}}">
		    <div class="container">
		        <div class="row">
		            <div class="block-inner">
		            	@php($data = Auth::user())
		            	{{-- @php(print_r($data->userid)) --}}
		            	@if(empty($blockrows))
			            		@for($i=1; $i<=$getblock->block_count; $i++)
				            		<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
		                                <div><i class='fas fa-user-alt-slash' aria-hidden='true'></i></div>                  
		                            </div>
			                    @endfor
		            	@else
							@foreach($blockrows as $blockrow)	
								@php ($block_count = $blockrow['block_count'])        		
				        		@for($i=1; $i<=$getblock->block_count; $i++)
				        			@if(!empty($blockrow['info'][$i]))
				        				<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
		                                    <a href='javascript:void(0);' class='add-profile view-profile' title="{{$blockrow['info'][$i]->emp_id}} | Ext: {{$blockrow['info'][$i]->emp_ext}}" data-toggle='modal' data-target='#blockModal' style='background-image:url(/storage/images/uploads/{{$blockrow['info'][$i]->emp_profile}}); background-size:cover;' id='{{$blockrow['info'][$i]->emp_id}}'>
		                                        <div class='{{$blockrow['info'][$i]->emp_id}} {{$blockrow['info'][$i]->machine_name}}'></div>
		                                    </a>
		                            	</div>
			        				@else
			        					<div class='block-cols {{$getblock->block_name}}-cols-{{$i}}' id='{{$i}}'>
		                                    <div><i class='fas fa-user-alt-slash' aria-hidden='true'></i></div>                  
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
                <table class="table table-bordered">
                	<tr>
                		<td colspan="2" id="emp_image"></td>
                	</tr>
                	<tr>
                		<td>Employee Name:</td>
                		<td id="emp_name"></td>
                	</tr>
                	<tr>
                		<td>Employee ID:</td>
                		<td id="emp_id"></td>
                	</tr>
                	<tr>
                		<td>Employee Extension:</td>
                		<td id="emp_ext"></td>
                	</tr>
                	<tr>
                		<td>Employee Designation:</td>
                		<td id="emp_designation"></td>
                	</tr>
                	<tr>
                		<td>Employee Department:</td>
                		<td id="emp_department"></td>
                	</tr>
                	<tr>
                		<td>Employee Mobile:</td>
                		<td id="emp_mobile"></td>
                	</tr>
                	<tr>
                		<td>Employee Email:</td>
                		<td id="emp_email"></td>
                	</tr>
                	<tr>
                		<td>Employee Address:</td>
                		<td id="emp_address"></td>
                	</tr>
                	<tr>
                		<td>Employee Machine Name:</td>
                		<td id="emp_machine"></td>
                	</tr>
                </table>
            </div>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
	    $('.view-profile').click(function(){

	    	var id = $(this).attr('id'); // A random variable for this example

			$.ajax({
			    method: 'POST', // Type of response and matches what we said in the route
			    url: '/fetchrecord', // This is the url we gave in the route
			    data: {'id' : id}, // a JSON object to send back
			    success: function(response){ // What to do if we succeed
			    	var emp_record = $.parseJSON(response)
			    	// console.log(abc.emp_id);
			        var emp_profile = emp_record.emp_profile;
			        var emp_name = emp_record.emp_name;
			        var emp_id = emp_record.emp_id;
			        var emp_ext = emp_record.emp_ext;
			        var emp_designation = emp_record.emp_designation;
			        var emp_department = emp_record.department_name;
			        var emp_mobile = emp_record.emp_mobile;
			        var emp_email = emp_record.emp_email;
			        var emp_address = emp_record.emp_address;
			        var emp_machine = emp_record.machine_name;

			        $('#blockModal .emp-details-main #emp_image').html("<img src='/storage/images/uploads/"+ emp_profile +"'>");
			        $('#blockModal .emp-details-main #emp_name').html("<strong>"+emp_name+"</strong>");
			        $('#blockModal .emp-details-main #emp_id').html("<strong>"+emp_id+"</strong>");
			        $('#blockModal .emp-details-main #emp_ext').html("<strong>"+emp_ext+"</strong>");
			        $('#blockModal .emp-details-main #emp_designation').html("<strong>"+emp_designation+"</strong>");
			        $('#blockModal .emp-details-main #emp_department').html("<strong>"+emp_department+"</strong>");
			        $('#blockModal .emp-details-main #emp_mobile').html("<strong>"+emp_mobile+"</strong>");
			        $('#blockModal .emp-details-main #emp_email').html("<strong>"+emp_email+"</strong>");
			        $('#blockModal .emp-details-main #emp_address').html("<strong>"+emp_address+"</strong>");
			        $('#blockModal .emp-details-main #emp_machine').html("<strong>"+emp_machine+"</strong>");
			    },
			    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        console.log("Error");
			        // console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    }
			});
	    });
	</script> 	            	

@endsection

<link rel="stylesheet" type="text/css" href="../css/{{$getblock->block_name}}.css">