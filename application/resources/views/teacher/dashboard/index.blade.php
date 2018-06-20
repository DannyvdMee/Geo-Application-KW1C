@extends('layouts.teacher')

@section('content')
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col-6">
					<div class="float-center display-block">
						<a href="{{ route('teacher/routes') }}">
							<i class="material-icons display-block">route-marker</i>
							<span class="display-block text-center">@lang('messages.routes')</span>
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="float-center display-block">
						<a href="{{ route('teacher/poi') }}">
							<i class="material-icons display-block">map-marker</i>
							<span class="display-block text-center">@lang('messages.pois')</span>
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="float-center display-block">
						<a href="{{ route('teacher/groups') }}">
							<i class="material-icons display-block">users</i>
							<span class="display-block text-center">@lang('messages.groups')</span>
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="float-center display-block">
						<a href="{{ route('teacher/settings') }}">
							<i class="material-icons display-block">cog</i>
							<span class="display-block text-center">@lang('messages.settings')</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection