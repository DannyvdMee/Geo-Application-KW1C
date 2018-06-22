@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h1 class="text-center">@lang('messages.students')</h1>
				</div>
			</div>
			<div class="row" id="poi-container">
				<div class="col">
					@foreach($groups as $group)
						<div class="row">
							<div class="col">
								<p>{{ $group->name }}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<a href="{{ route('teacher/group/create') }}" id="add-item">
				<i class="material-icons">add</i>
			</a>
		</div>
	</div>
@endsection