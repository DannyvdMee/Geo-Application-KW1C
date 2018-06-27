@extends('layouts.teacher')

<!--
27 06 18
Onyi:
!IMPORTANT
CORRECT INDEX PAGE
CAN BE USED AS TEMPLATE...
-->

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.pois')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<!-- POI container -->
					<div id="poi-container">
						@foreach($pois as $poi)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $poi->title }}</p>
									<div class="float-right">
										<!-- Visibility(eye) button toggle true -->
										@if ($poi->visibility == true)
											<a href="{{ route('teacher/poi/visibility', ['id' => $poi->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										<!-- Visibility(eye) button toggle false -->
										@else
											<a href="{{ route('teacher/poi/visibility', ['id' => $poi->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										<!-- Edit button -->
										@endif
										<a href="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<!-- Delete button -->
										<a href="{{ route('teacher/poi/delete', ['id' => $poi->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<!-- POI add btn-->
						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/poi/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
					<!-- End POI container -->	
				</div>
			</div>
		</div>
	</div>
@endsection