@extends('layouts.teacher')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.routes')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="route-container">
						@foreach($routes as $route)
							<div class="row">
								<div class="col dataItem">
									<p class="display-inline-block">{{ $route->name }}</p>
									<div class="float-right">
										@if ($route->visibility == 1)
											<a href="{{ route('teacher/route/visibility', ['id' => $route->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										@else
											<a href="{{ route('teacher/route/visibility', ['id' => $route->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										@endif
										<a href="{{ route('teacher/route/edit', ['id' => $route->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<a href="{{ route('teacher/route/delete', ['id' => $route->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('teacher/route/create') }}" id="add-item">
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