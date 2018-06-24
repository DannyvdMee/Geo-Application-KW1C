@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Login page form -->
                <p class="text-center gray-text font-size-150 margin-top-100">@lang('messages.login')</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group row">

                        <!-- Username form -->
                        <div class="col-10 offset-1">
                            <input id="username" type="email" placeholder="@lang('messages.username'):"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} border-gray"
                                   name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>

                        <!-- Password form -->
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

                            <!-- <Button> register doesn't work, fix it if u have spare time thx -->

                            <!-- <button onclick="{{ route('register') }}" 
                            class="btn btn-gray float-right">@lang('messages.create-account')</button> -->

                            <a class="btn btn-gray float-right"
                               href="{{ route('register') }}">@lang('messages.create-account')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
