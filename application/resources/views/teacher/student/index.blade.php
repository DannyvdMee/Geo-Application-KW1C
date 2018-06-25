@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<section>
				<h2 class="text-center">@lang('messages.students')</h2>

				<div id="department-container">
					@foreach($students as $student) {{--TODO: Only shows first row, Not anything more! Check Databse for information! --}}
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

					{{--Testfield, to check layout and shit--}}
					{{--TODO: REMOVE THIS When data is added!!--}}
					<div class="row">
						<div class="col dataItem">
							<p class="display-inline-block">Rinaldo Boeje</p>
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
							<p class="display-inline-block">Onyi Lam</p>
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
							<p class="display-inline-block">Danny V. D. Mee</p>
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
							<p class="display-inline-block">Ibo Van Geffen</p>
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
							<p class="display-inline-block">Danny Matula</p>
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
							<p class="display-inline-block">Kech mcSlutbag</p>
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
							<p class="display-inline-block">WILLHEM!</p>
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
							<p class="display-inline-block">Ron Spierings</p>
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