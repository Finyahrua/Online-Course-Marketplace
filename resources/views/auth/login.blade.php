@extends('layouts.auth')

@section('content')

{{-- <div class="uk-width-3-4@s">
      <div class="uk-text-center uk-margin-bottom">
        <a class="uk-logo uk-text-primary uk-text-bold" href="/">OCM</a>
      </div>
      <div class="uk-text-center uk-margin-medium-bottom">
        <h1 class="uk-letter-spacing-small">Sign In to OCM</h1>
      </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were problems with input:
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <form role="form" method="POST" action="{{ url('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="uk-width-1-1 uk-margin">
            <label class="uk-form-label" for="email" name="email">Email</label>
            <input id="email" class="uk-input uk-form-large" type="email" placeholder="abc@mail.com" value="{{ old('email') }}" >
            </div>
            <div class="uk-width-1-1 uk-margin">
            <label class="uk-form-label" for="password" name="password">Password</label>
            <input id="password" class="uk-input uk-form-large" type="password" placeholder="enter passsword">
            </div>
            <div class="uk-width-1-1 uk-margin uk-text-center">
            <a class="uk-text-small uk-link-muted" href="{{ route('auth.password.reset') }}">Forgot your password?</a>
            </div>
            <div class="uk-width-1-1 uk-text-center">
            <button class="uk-button uk-button-primary uk-button-large" type="submit">Sign In</button>
            </div>
        </form>
    </div>
  </div>
  <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light
    uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-overlay-blend" 
    style="background-image: url(https://source.unsplash.com/2FPjlAyMQTA/680x1000);" data-uk-height-viewport>
    <div>
      <div class="uk-text-center">
        <h2 class="uk-h1 uk-letter-spacing-small">Hello There, </h2>
      </div>
      <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
        <p>Register and join the learning community</p>
      </div>
      <div class="uk-width-1-1 uk-text-center">
        <a href="sign-up.html" class="uk-button uk-button-primary uk-button-large">Sign Up</a>
      </div>
    </div>
  </div>
</div> --}}


    <div class="uk-width-3-4@s">
      <div class="uk-text-center uk-margin-bottom">
        <a class="uk-logo uk-text-primary uk-text-bold" href="/">OCM</a>
      </div>
      <div class="uk-text-center uk-margin-medium-bottom">
        <h1 class="uk-letter-spacing-small">Sign In to OCM</h1>
      </div>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="uk-width-1-1 uk-margin">
                            <label class="uk-form-label">Email</label>

                            <div class="uk-width-1-1 uk-margin">
                                <input type="email"
                                       class="form-control uk-input uk-form-large"
                                       name="email"
                                        placeholder="abc@mail.com"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin">
                            <label class="uk-form-label">Password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control uk-input uk-form-large"
                                       placeholder="Enter your password"
                                       name="password">
                            </div>
                        </div>

                        <div class="uk-width-1-1 uk-margin uk-text-center">
                            <div class="uk-text-small uk-link-muted">
                                <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                            </div>
                        </div>


                        {{-- <div class="form-group">
                            <div class="uk-text-small uk-link">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> Remember me
                                </label>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="uk-width-1-1 uk-text-center">
                                <button type="submit"
                                        class="uk-button uk-button-primary uk-button-large"
                                        >
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light
        uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-overlay-blend" 
        style="background-image: url(https://source.unsplash.com/2FPjlAyMQTA/680x1000);" data-uk-height-viewport>
        <div>
        <div class="uk-text-center">
            <h2 class="uk-h1 uk-letter-spacing-small">Hello There, </h2>
        </div>
        <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
            <p>Register and join the learning community</p>
        </div>
        <div class="uk-width-1-1 uk-text-center">
            <a href="{{ route('auth.register') }}" class="uk-button uk-button-primary uk-button-large">Register</a>
        </div>
        </div>
    </div>
    </div>
@endsection