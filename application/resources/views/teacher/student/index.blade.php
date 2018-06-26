@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<section>
				<h2 class="text-center">@lang('messages.students')</h2>

				<div id="department-container">
					@foreach($students as $student)
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">{{ $student->name }}</p>
								<div class="float-right">
									@if ($student->state == true)
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

					<div class="whitespace height-21"></div>


					<div class="dataAddIcon display-inline-block float-right">
						<a href="{{ route('teacher/student/create') }}" id="add-item">
							<i class="material-icons">add</i>
						</a>
					</div>
				</div>
			</section>



		</div>
	</div>
@endsection