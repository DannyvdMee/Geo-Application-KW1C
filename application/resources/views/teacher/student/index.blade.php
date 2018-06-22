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
					@foreach($students as $student)
						<div class="row">
							<div class="col">
								<p>{{ $student->name }}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<a href="{{ route('teacher/student/create') }}" id="add-item">
				<i class="material-icons">add</i>
			</a>
		</div>
	</div>
@endsection