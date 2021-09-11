@extends('layouts.website.website')

@section('content')


<div class="login-area-wrapper">
    <div class="cotn_principal">
      <div class="cont_centrar">
        <div class="cont_login">
          <div class="cont_forms_two">
            <form class="form pt-3" method="post" action="{{url('admin/user')}}" enctype="multipart/form-data">
                @csrf
                <h2 style="padding-left: 102px;">SING-UP</h2>
                <div class="form-group" style="padding-left: 37px;">
                    <label>Name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label>Phone</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="phone" name="phone" value="{{old('phone')}}">

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label>Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label>Confirm Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label>Users</label>
                    <select class="form-control custom-select" name="role" placeholder="users">
                        <option>Select Users</option>
                        <option value="1">Admin</option>
                        <option value="1">Student</option>
                        {{-- @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach --}}
                    </select>
                    @if ($errors->has('role'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" style="padding-left: 37px;">
                    <label>Photo</label>
                    <div class="custom-file mb-3">

                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        {{--  @if(!empty(Auth::user()->image))
                        <a href="">view iamge</a>
                        <input type="hidden" name="current_user_image" value="{{ Auth::check()->user()->image }}">
                        @endif  --}}

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div style="padding-left: 36px;padding-top:18px;">
                    <button class="btn_sign_up" type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
</div>


@endsection
