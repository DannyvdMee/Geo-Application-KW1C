@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<p class="text-center gray-text font-size-150 margin-top-100">@lang('messages.login')</p>

				<!-- Login page form -->
				<form method="POST" action="{{ route('login/request') }}">
					@csrf

					<div class="form-group row">
						<!-- Username form -->
						<div class="col-10 offset-1">
							<input id="email" type="email" placeholder="@lang('messages.email')"
								   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} border-gray"
								   name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
						<!-- Password form -->
						<div class="col-10 offset-1">
							<input id="password" type="password" placeholder="@lang('messages.password')"
								   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} border-gray"
								   name="password" required>

							@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>

						@if (!empty(session('error')))
						<div class="col-10 offset-1">
							<div id="session-error">
								<p>{{ session('error') }}</p>
							</div>
						</div>
						@endif

						<!-- Login + register button -->
						<div class="col-5 offset-1">
							<button type="submit" class="btn btn-gray">@lang('messages.login')</button>
						</div>
						<div class="col-5">
							<a class="btn btn-gray float-right"
							   href="{{ route('register') }}">@lang('messages.create-account')</a>
						</div>
					</div>
				</form>
			</div>

			<!-- Achtergrond import -->
			<div style="background: url('{{ asset('storage/img/backgrounds/bg_map.png') }}') center center; background-size: contain; width: 100%; height: calc(100vh - 120px);position: absolute; z-index: -1; opacity: 0.3;">
			</div>
		</div>
	</div>
@endsection
