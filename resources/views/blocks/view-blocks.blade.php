@extends('layouts.app')

@section('content')

	<div class="container main-block">
		<h2>{{$title}}</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="main-block-inner">
					@guest 
						<a href="/viewblock/block1">
							<div class="main-block-img">
								<img src="images/block1.jpg" class="img-responsive">
							</div>
							<div class="main-block-title">
								<h3>Block 1</h3>
							</div>
						</a>
					@else
						<a href="/editblock/block1">
							<div class="main-block-img">
								<img src="images/block1.jpg" class="img-responsive">
							</div>
							<div class="main-block-title">
								<h3>Block 1</h3>
							</div>
					@endguest
				</div>
			</div>

			<div class="col-md-4">
				<div class="main-block-inner">
					@guest
						<a href="/viewblock/block2">
							<div class="main-block-img">
								<img src="images/block2.jpg" class="img-responsive">
							</div>
							<div class="main-block-title">
								<h3>Block 2</h3>
							</div>
						</a>
					@else
						<a href="/editblock/block2">
							<div class="main-block-img">
								<img src="images/block2.jpg" class="img-responsive">
							</div>
							<div class="main-block-title">
								<h3>Block 2</h3>
							</div>
					@endguest
				</div>
			</div>
			</div>
		</div>
	</div>

@endsection