
@extends('layouts.website.website')
@section('title', 'Login')
@section('content')
<style>
    .invalid-feedback {
    display: inline-block !important;
    font-size: 60% !important;
}
</style>

<div class="sign-up-form">
    <img class="people" src="{{asset('contents/website/assests/image/user.png')}}">
        <h1>Sign Up Now</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email"  @error('email')@enderror name="email" value="{{ old('email') }}" required  class="input-box" placeholder="Your Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="password"  @error('password')@enderror class="input-box" placeholder="Your Password" name="password" required >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn_login" type="submit" type="button" class="signup-btn">login in</button>

            <p>Have no account?<a style="color:blue;font-weight:700" href="{{ route('student.sinsup') }}">Signup Here</a></p>
        </form>
    </div>
@endsection





 <!-- Start of login Wrapper -->
