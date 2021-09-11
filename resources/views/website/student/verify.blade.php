
@extends('layouts.website.website')
@section('title', 'Email Verification')
@section('content')

<div class="login-area-wrapper">
    <div class="cotn_principal">
      <div class="cont_centrar">
        <div class="cont_login">
          <div class="cont_forms">
                <form method="POST" action="{{ route('verify.store') }}">
                    @csrf
                        <h2 style="padding-left: 102px;">Verify</h2>
                        <div style="padding-left: 47px;padding-top:18px;">
                            <input name="email" type="text" placeholder="Email" value="{{old('email')}}" required="">
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div  style="padding-left: 47px;">
                            <input name="code" placeholder="Code" required="" type="text" required="">
                        </div>

                        @if ($errors->has('code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('code') }}</strong>
                        </span>
                        @endif
                        <div style="padding-left: 36px;padding-top:18px;">
                            <button class="btn_login" type="submit" class="btn btn-primary">{{ __('Verify') }}</button>
                        </div>
                </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

 <!-- Start of login Wrapper -->
