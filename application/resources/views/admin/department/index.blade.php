@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col">
			<section>
				<h2 class="text-center">@lang('messages.departments')</h2>

				<div id="department-container">
					@foreach($departments as $department)
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">{{ $department->title }}</p>
								<div class="float-right">
								@if ($department->state == true)
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

					{{--Testfield, to check layout and shit--}}
						{{--TODO: REMOVE THIS When data is added!!--}}
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">ICT-accademie</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">visibility</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">Kappersopleiding</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">visibility_off</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">Landbouw en groen</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">remove_red_eye</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">electrotechniek</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">remove_red_eye</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">Middelbare Horece School</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">remove_red_eye</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">Opleiding met een veel ste lange naam!</p>
								<div class="float-right">
									<a href="">
										<i class="material-icons">remove_red_eye</i>
									</a>
									<a href="">
										<i class="material-icons">edit</i>
									</a>
									<a href="">
										<i class="material-icons">delete_forever</i>
									</a>
								</div>
							</div>
						</div>



						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('admin/departments/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
				</div>
			</section>



		</div>
	</div>
@endsection

{{--TODO: Page width more than screen width
Cause ruled out: Not widthdepartment container, optionselect--}}