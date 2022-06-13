@extends('layouts.auth')

@section('content')
<div class="uk-width-3-4@s">
      <div class="uk-text-center uk-margin-bottom">
        <a class="uk-logo uk-text-primary uk-text-bold" href="/">OCM</a>
      </div>
      <div class="uk-text-center uk-margin-medium-bottom">
        <h1 class="uk-letter-spacing-small">Register to OCM</h1>
      </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="redirect_url" value="{{ request('redirect_url', '/') }}">

                        <div class="uk-width-1-1 uk-margin{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label class="uk-form-label" for="name">Full name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="uk-input uk-form-large" name="name" value="{{ old('name') }}" required autofocus placeholder="Your name ...">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="uk-form-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="uk-input uk-form-large" name="email" value="{{ old('email') }}" required placeholder="abc@mail.com">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="uk-form-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="uk-input uk-form-large" name="password" required placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin">
                            <label for="password-confirm" class="uk-form-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="uk-input uk-form-large" name="password_confirmation" required placeholder="confirm password">
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin">
                            <div class="uk-width-1-1 uk-text-center">
                                <button type="submit" class="uk-button uk-button-primary uk-button-large">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>    </div>
            </div>
            <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light
                uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-overlay-blend" 
                style="background-image: url(https://source.unsplash.com/nF8xhLMmg0c/680x1000);" data-uk-height-viewport>
                <div>
            <div class="uk-text-center">
                <h2 class="uk-h1 uk-letter-spacing-small">Welcome Back</h2>
            </div>
        <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
            <p>Already signed up, enter your details and start the learning today</p>
        </div>
      <div class="uk-width-1-1 uk-text-center">
        <a href="{{ route('auth.login') }}" class="uk-button uk-button-primary uk-button-large">Login</a>
      </div>
    </div>
  </div>
</div>
@endsection
