@extends('layouts.website.website')
@section('content')

     <!-- Start of login Wrapper -->
     <div class="login-area-wrapper">
        <div class="cotn_principal">
          <div class="cont_centrar">
            <div class="cont_login">
              <div class="cont_forms">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <h2 style="padding-left: 65px;">User Login</h2>
                            <div style="padding-left: 47px;padding-top:18px;">
                                <input type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div  style="padding-left: 47px;">
                                <input type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div style="padding-left: 36px;padding-top:18px;">
                                <button class="btn_login" type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
