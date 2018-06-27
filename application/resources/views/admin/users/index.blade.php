{{--TODO: Pois naar users index omschrijven naar users admin page--}}

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<!-- Page title -->
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users')</h5>
				</div>
			</div>
			<!-- End page title -->
			<!-- Users container -->
			<div class="row">
				<div class="col">
					<div id="user-container">
						@foreach($users as $user)

						@endforeach
					</div>
				</div>
			</div>
			<!-- End POI container -->
		</div>
	</div>
</div>

