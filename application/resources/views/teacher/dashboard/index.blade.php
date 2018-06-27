@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div id="dashboard-container" class="row">

				<!-- De route marker -->
				<div class="col-6 col-md-3 dashboard-item">
					<div class="margin-10-0 dashboard-item-background">
							<div class="float-center display-block">
							<a href="{{ route('teacher/route') }}">
								<i class="material-icons display-block dashboard-icon-pos">directions</i>
								<span class="display-block text-center dashboard-text-pos">@lang('messages.routes')</span>
							</a>
						</div>
					</div>
				</div>

				<!-- De map marker -->
				<div class="col-6 col-md-3 dashboard-item">
					<div class="margin-10-0 dashboard-item-background">
						<div class="float-center display-block">
							<a href="{{ route('map') }}">
								<i class="material-icons display-block dashboard-icon-pos">map</i>
								<span class="display-block text-center dashboard-text-pos">@lang('messages.map')</span>
							</a>
						</div>
					</div>
				</div>

				<!-- De groep marker -->
				<div class="col-6 col-md-3">
					<div class="margin-10-0 dashboard-item-background">
						<div class="float-center display-block dashboard-item">
							<a href="{{ route('teacher/group') }}">
								<i class="material-icons display-block dashboard-icon-pos">group</i>
								<span class="display-block text-center dashboard-text-pos">@lang('messages.groups')</span>
							</a>
						</div>
					</div>
				</div>

				<!-- De settings marker -->
				<div class="col-6 col-md-3 dashboard-item">
					<div class="margin-10-0 dashboard-item-background">
						<div class="float-center display-block">
							<a href="{{ route('teacher/settings') }}">
								<i class="material-icons display-block dashboard-icon-pos">settings</i>
								<span class="display-block text-center dashboard-text-pos">@lang('messages.settings')</span>
							</a>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
@endsection