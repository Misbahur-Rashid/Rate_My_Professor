
@extends('layouts.website.website')
@section('title', 'Student Signup')
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
        <form method="post" action="{{url('/student/signup-store')}}" enctype="multipart/form-data">
            @csrf
            <input type="text"  placeholder="Name" name="name" value="{{old('name')}}" required class="input-box">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <input type="email" name="email" value="{{ old('email') }}" required  class="input-box" placeholder="Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <input type="text" placeholder="username" name="username" value="{{old('username')}}" class="input-box">
               @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
               @endif

            <input type="number" placeholder="phone" name="phone" value="{{old('phone')}}" class="input-box">
                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif

                <input type="text" placeholder="address" name="address" value="{{old('address')}}" class="input-box">
                @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif

            <input type="password" class="input-box" placeholder="Your Password" name="password" required >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            <input type="file" name="image" id="customFile" class="input-box">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="btn_sign_up" type="submit" class="btn btn-primary">Register</button>
            have you any account?<a style="color:blue;font-weight:700" href="{{ route('student.login')}}">Signin here</a>
        </form>
</div>

@endsection




