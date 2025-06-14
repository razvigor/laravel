@extends('layouts.app', [
  'class' => 'off-canvas-sidebar',
  'classPage' => 'login-page',
  'activePage' => 'login',
  'title' => __(''),
  'pageBackground' => asset("material").'/img/trabant_res_1280x720.jpg'
])

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-9 ml-auto mr-auto mb-1 text-center">
        <h3>{{ __('') }} </h3>

        <p class="text-lead text-light mt-3 mb-0">
            {{ __('') }}<br><br>
        </p>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="card card-login card-hidden">
            <div class="card-header card-header-info text-center">
              <h4 class="card-title">{{ __('Prijavite se') }}</h4>
              {{--
              <div class="social-line">
                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
              --}}
            </div>
            <div class="card-body ">
              <span class="form-group  bmd-form-group email-error {{ $errors->has('email') ? ' has-danger' : '' }}" >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" id="exampleEmails" name="email" placeholder="{{ __('Email...') }}" value="{{ old('email', '') }}" required>
                  @include('alerts.feedback', ['field' => 'email'])
                </div>
              </span>
              <span class="form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" id="examplePassword" name="password" placeholder="{{ __('Lozinka...') }}" value="" required>
                  @include('alerts.feedback', ['field' => 'password'])
                </div>
              </span>
              {{--
              <div class="form-check mr-auto ml-3 mt-3">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Zapamti me') }}
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
              </div>
              --}}
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-info btn-link btn-lg">{{ __('Kreni') }}</button>
            </div>
          </div>
        </form>
        <!--
        <div class="row">
          <div class="col-6">
        {{--
            @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-light">
                      <small>{{ __('Zaboravili ste lozinku?') }}</small>
                  </a>
              @endif
        --}}               
            </div>
          <div class="col-6 text-right">
        {{--
            <a href="{{ route('register') }}" class="text-light">
                  <small>{{ __('Kreirajte novi nalog') }}</small>
              </a>
        --}}

          </div>
        </div>
      -->
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    md.checkFullPageBackgroundImage();
    setTimeout(function() {
      // after 1000 ms we add the class animated to the login/register card
      $('.card').removeClass('card-hidden');
    }, 700);
  });
</script>
@endpush
