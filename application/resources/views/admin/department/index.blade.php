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
										<i class="material-icons">remove_red_eye</i>
									</a>
									<a href="">{{--TODO: Href pages when files are made--}}
										<i class="material-icons">edit</i>
									</a>
									<a href="">{{--TODO: Href pages when files are made--}}
										<i class="material-icons">delete_forever</i>
									</a>
								@else
									{{--<a href=""><i class="fa-eye-closed"></i></a>--}}
								@endif
								</div>
							</div>
						</div>
					@endforeach

					{{--Testfield, to check layout and shit--}}
						{{--
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">Kappersopleiding</p>
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
						--}}

						<div class="">
							<a href="{{-- route('admin/department/create') --}}" id="add-item"> {{--TODO: Remove commentated href--}}
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