@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.exercise')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="exercise-container">
						@foreach($exercises as $exercise)
							<div class="row">
								<div class="col dataItem">
									<p class="display-inline-block">{{ $exercise->name }}</p>
									<div class="float-right">
										@if ($exercise->visibility == 1)
											<a href="{{ route('teacher/exercise/visibility', ['id' => $exercise->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										@else
											<a href="{{ route('teacher/exercise/visibility', ['id' => $exercise->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										@endif
										<a href="{{ route('teacher/exercise/edit', ['id' => $exercise->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<a href="{{ route('teacher/exercise/delete', ['id' => $exercise->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection