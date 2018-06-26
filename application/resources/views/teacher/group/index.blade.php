@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h1 class="text-center">@lang('messages.groups')</h1>
				</div>
			</div>
			<div class="row" id="poi-container">
				<div class="col">
					@foreach($groups as $group)
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">{{ $group->title }}</p>
								<div class="float-right">
									@if ($group->state == true)
										<a href="">{{--TODO: Href pages when files are made--}}
											<i class="material-icons">visibility</i>
										</a>
									@else
										<a href="">{{--TODO: Href pages when files are made--}}
											<i class="material-icons">visibility_off</i>
										</a>
									@endif
									<a href="">{{--TODO: Href pages when files are made--}}
										<i class="material-icons">edit</i>
									</a>
									<a href="">{{--TODO: Href pages when files are made--}}
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
					@endforeach
					<div class="whitespace height-21"></div>

					<div class="dataAddIcon display-inline-block float-right">
						<a href="{{ route('teacher/group/create') }}" id="add-item">
							<i class="material-icons">add</i>
						</a>
					</div>
				</div>
			</section>



		</div>
	</div>
@endsection