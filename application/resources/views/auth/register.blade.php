@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <!-- Register page form -->
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <!-- Username form -->
                                <div class="col-10 offset-1">
                                    <input id="username" type="text" placeholder="@lang('messages.username')"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- Email form -->
                                <div class="col-10 offset-1">
                                    <input id="email" type="email" placeholder="@lang('messages.email')"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- Password form -->
                                <div class="col-10 offset-1">
                                    <input id="password" type="password" placeholder="@lang('messages.password')"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- Confirm password form -->
                                <div class="col-10 offset-1">
                                    <input id="password-confirm" type="password" placeholder="@lang('messages.confirmpw')"
                                    class="form-control" name="password_confirmation" required>
                                </div>
                            </div>             

                            <!-- Eventuele captcha/anti spam checkbox? -->

                            <!-- Register button -->
                            <div class="form-group row mb-0">
                                <div class="col-10 offset-1">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
