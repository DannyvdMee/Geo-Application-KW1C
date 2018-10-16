@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<h5 class="text-center font-bold">@lang('messages.users')</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div id="user-container">
						@foreach($users as $user)
							<div class="row">
								<div class="col dataItem">
									<!-- Title -->
									<p class="display-inline-block">{{ $user->lastname }}, {{ $user->firstname }} </p>
									<div class="float-right">
										@if ($user->visibility == 1)
											<a href="{{ route('admin/user/visibility', ['id' => $user->id]) }}">
												<i class="material-icons">visibility</i>
											</a>
										@else
											<a href="{{ route('admin/user/visibility', ['id' => $user->id]) }}">
												<i class="material-icons">visibility_off</i>
											</a>
										@endif
										<a href="{{ route('admin/user/edit', ['id' => $user->id]) }}">
											<i class="material-icons">edit</i>
										</a>
										<a href="{{ route('admin/user/delete', ['id' => $user->id]) }}">
											<i class="material-icons">delete_forever</i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
						<div class="whitespace height-21"></div>

						<div class="dataAddIcon display-inline-block float-right">
							<a href="{{ route('admin/user/create') }}" id="add-item">
								<i class="material-icons">add</i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End container -->
		</div>
	</div>
</div>	
@endsection