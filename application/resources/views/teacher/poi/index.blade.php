@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h1 class="text-center">@lang('messages.poi')</h1>
				</div>
			</div>
			<div class="row" id="poi-container">
				<div class="col">
					@foreach($pois as $poi)
						<div class="row">
							<div class="col">
								<p>{{ $poi->title }}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<a href="{{ route('teacher/poi/create') }}" id="add-item">
				<i class="material-icons">add</i>
			</a>
		</div>
	</div>
@endsection