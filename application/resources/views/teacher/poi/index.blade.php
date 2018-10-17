@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.pois')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="poi-container">
						@foreach($pois as $poi)
							<div class="row">
								<div class="col dataItem">
									<p class="display-inline-block">{{ $poi->name }}</p>
									<div class="float-right">
										@if ($poi->visibility == 1)
											<a href="{{ route('teacher/poi/visibility', ['id' => $poi->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										@else
											<a href="{{ route('teacher/poi/visibility', ['id' => $poi->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										@endif
										<a href="{{ route('teacher/poi/edit', ['id' => $poi->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<a href="{{ route('teacher/poi/delete', ['id' => $poi->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/poi/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection