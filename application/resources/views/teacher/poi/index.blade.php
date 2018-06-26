@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<section>
				<h2 class="text-center">@lang('messages.pois')</h2>

				<div id="department-container">
					@foreach($pois as $poi)
						<div class="row">
							<div class="col dataItem">
								<p class="display-inline-block">{{ $poi->title }}</p>
								<div class="float-right">
									@if ($poi->state == true)
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
							<p class="display-inline-block">Koning Willem 1 college</p>
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
							<p class="display-inline-block">Centraal Station</p>
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
							<p class="display-inline-block">Jeroen Bosch Ziekenhuis</p>
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
							<p class="display-inline-block">St. Jans Cathedraal</p>
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
							<p class="display-inline-block">Parkje</p>
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
							<p class="display-inline-block">Bolwerk</p>
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
								<p class="display-inline-block">Parkje</p>
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
								<p class="display-inline-block">Bolwerk</p>
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
								<p class="display-inline-block">Parkje</p>
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
								<p class="display-inline-block">Bolwerk</p>
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
						<a href="{{ route('teacher/poi/create') }}" id="add-item">
							<i class="material-icons">add</i>
						</a>
					</div>
				</div>
			</section>



		</div>
	</div>
@endsection