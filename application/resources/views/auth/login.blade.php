@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="text-center gray-text font-size-150 margin-top-100">@lang('messages.login')</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-10 offset-1">
                            <input id="email" type="email" placeholder="@lang('messages.email'):"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} border-gray"
                                   name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-10 offset-1">
                            <input id="password" type="password" placeholder="@lang('messages.password'):"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} border-gray"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>


                        {{--<div class="form-group row">--}}
                        {{--<div class="col-md-6 offset-md-4">--}}
                        {{--<div class="checkbox">--}}
                        {{--<label>--}}
                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}--}}
                        {{--</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <!-- Login + register btn -->
                        <div class="col-10 offset-1">
                            <button type="submit" class="btn btn-gray">@lang('messages.login')</button>

                            <button class="btn btn-gray float-right"
                               href="{{ route('password.request') }}">@lang('messages.create-account')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
