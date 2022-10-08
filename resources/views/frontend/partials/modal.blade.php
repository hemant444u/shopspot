<script>
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
                <h4 class="modal-title" id="myModalLabel">{{__('Confirmation')}}</h4>
            </div>

            <div class="modal-body">
                <p>{{__('Delete confirmation message')}}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancel')}}</button>
                <a id="delete_link" class="btn btn-danger btn-ok">{{__('Delete')}}</a>
            </div>
        </div>
    </div>
</div>


   {{-- register modal start --}}
   <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss ="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="gry-bg py-4">
                    <div class="profile">
                        <div class="container">
                            <div class="row">
                                {{-- <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto"> --}}
                                <div class="col-12 mx-auto">
                                    <div class="card">
                                        <div class="text-center px-35 pt-5">
                                            <h1 class="heading heading-4 strong-500">
                                                {{__('Create an account.')}}
                                            </h1>
                                        </div>
                                        <div class="px-5 py-3 py-lg-4">
                                            <div class="">
                                                <form class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="input-group input-group--style-1">
                                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ __('Name') }}" name="name">
                                                            <span class="input-group-addon">
                                                        <i class="text-md la la-user"></i>
                                                    </span>
                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                                        <div class="form-group phone-form-group">
                                                            <div class="input-group input-group--style-1">
                                                                <input type="tel" id="phone-code" class="border-right-0 h-100 w-100 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="{{ __('Mobile Number') }}" name="phone">
                                                                <span class="input-group-addon">
                                                            <i class="text-md la la-phone"></i>
                                                        </span>
                                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="country_code" value="">

                                                        <div class="form-group email-form-group">
                                                            <div class="input-group input-group--style-1">
                                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                                                <span class="input-group-addon">
                                                            <i class="text-md la la-envelope"></i>
                                                        </span>
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <button class="btn btn-link p-0" type="button" onclick="toggleEmailPhone(this)">Use Email Instead</button>
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <div class="input-group input-group--style-1">
                                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                                                <span class="input-group-addon">
                                                            <i class="text-md la la-envelope"></i>
                                                        </span>
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                    <!-- <label>{{ __('password') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" name="password">
                                                            <span class="input-group-addon">
                                                        <i class="text-md la la-lock"></i>
                                                    </span>
                                                            @if ($errors->has('password'))
                                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                    <!-- <label>{{ __('confirm_password') }}</label> -->
                                                        <div class="input-group input-group--style-1">
                                                            <input type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
                                                            <span class="input-group-addon">
                                                        <i class="text-md la la-lock"></i>
                                                    </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                <span class="invalid-feedback" style="display:block">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="checkbox pad-btm text-left">
                                                        <input class="magic-checkbox" type="checkbox" name="checkbox_example_1" id="checkboxExample_1a" required>
                                                        <label for="checkboxExample_1a" class="text-sm">{{__('By signing up you agree to our terms and conditions.')}}</label>
                                                    </div>

                                                    <div class="text-right mt-3">
                                                        <button type="submit" class="btn btn-styled btn-base-1 w-100 btn-md">{{ __('Create Account') }}</button>
                                                    </div>
                                                </form>
                                                @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                                    <div class="or or--1 mt-3 text-center">
                                                        <span>or</span>
                                                    </div>
                                                    <div>
                                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                                <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                                            </a>
                                                        @endif
                                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                                <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                                            </a>
                                                        @endif
                                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4">
                                                                <i class="icon fa fa-twitter"></i> {{__('Login with Twitter')}}
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center px-35 pb-3">
                                            <p class="text-md">
                                                {{__('Already have an account?')}}<a href="#" data-toggle="modal" data-target="#loginModal" id="registerClose" class="strong-600">{{__('Log In')}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>
{{-- register modal end  --}}


{{-- Login modal start  --}}

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header border-0">
      <button type="button" class="close" data-dismiss ="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <section class="gry-bg py-5">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto"> --}}
                            <div class="col-12 mx-auto">
                            <div class="card">
                                <div class="text-center px-35 pt-5">
                                    <h1 class="heading heading-4 strong-500">
                                        {{__('Login to your account.')}}
                                    </h1>
                                </div>
                                <div class="px-5 py-3 py-lg-4">
                                    <div class="">
                                        <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                                <span>{{ __('Use country code before number') }}</span>
                                            @endif
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                                        <input type="text" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{__('Email Or Phone')}}" name="email" id="email">
                                                    @else
                                                        <input type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                                    @endif
                                                    <span class="input-group-addon">
                                                        <i class="text-md la la-user"></i>
                                                    </span>
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <div class="input-group input-group--style-1">
                                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{__('Password')}}" name="password" id="password">
                                                    <span class="input-group-addon">
                                                        <i class="text-md la la-lock"></i>
                                                    </span>
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="checkbox pad-btm text-left">
                                                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="demo-form-checkbox" class="text-sm">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="{{ route('password.request') }}" class="link link-xs link--style-3">{{__('Forgot password?')}}</a>
                                                </div>
                                            </div>
    
    
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">{{ __('Login') }}</button>
                                            </div>
                                        </form>
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <div class="or or--1 mt-3 text-center">
                                                <span>or</span>
                                            </div>
                                            <div>
                                            @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                                <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                    <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                                </a>
                                            @endif
                                            @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                                <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                    <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                                </a>
                                            @endif
                                            @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                                <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4">
                                                    <i class="icon fa fa-twitter"></i> {{__('Login with Twitter')}}
                                                </a>
                                            @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center px-35 pb-3">
                                    <p class="text-md">
                                        {{__('Need an account?')}} <a href="#" data-toggle="modal" data-target="#registerModal" id="loginClose" class="strong-600">{{__('Register Now')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if (env("DEMO_MODE") == "On")
                            <div class="bg-white p-4 mx-auto mt-4">
                                <div class="">
                                    <table class="table table-responsive table-bordered mb-0">
                                        <tbody>
                                            <tr>
                                                <td>{{__('Seller Account')}}</td>
                                                <td><button class="btn btn-info" onclick="autoFillSeller()">Copy credentials</button></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Customer Account')}}</td>
                                                <td><button class="btn btn-info" onclick="autoFillCustomer()">Copy credentials</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

  </div>
</div>
</div>
{{-- Login modal end  --}}

