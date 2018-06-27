@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">

				<!-- De route marker -->
				<div class="col-6 col-md-3 dashboard-item-background dashboard-item">
					<div class="float-center display-block">
						<a href="{{ route('teacher/route') }}">
							<i class="material-icons display-block">directions</i>
							<span class="display-block text-center">@lang('messages.routes')</span>
						</a>
					</div>
				</div>

				<!-- De map marker -->
				<div class="col-6 col-md-3 dashboard-item-background dashboard-item">
					<div class="float-center display-block">
						<a href="{{ route('teacher/route') }}">
							<i class="material-icons display-block">map</i>
							<span class="display-block text-center">@lang('messages.routes')</span>
						</a>
					</div>
				</div>

				<!-- De groep marker -->
				<div class="col-6 col-md-3 dashboard-item-background dashboard-item">
					<div class="float-center display-block">
						<a href="{{ route('teacher/route') }}">
							<i class="material-icons display-block">group</i>
							<span class="display-block text-center">@lang('messages.routes')</span>
						</a>
					</div>
				</div>

				<!-- De settings marker -->
				<div class="col-6 col-md-3 dashboard-item-background dashboard-item">
					<div class="float-center display-block">
						<a href="{{ route('teacher/route') }}">
							<i class="material-icons display-block">settings</i>
							<span class="display-block text-center">@lang('messages.routes')</span>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection