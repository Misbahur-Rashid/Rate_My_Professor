@extends('layouts.website.website')
@section('content')
<style>
    .invalid-feedback {
    display: inline-block !important;
    font-size: 60% !important;
}
</style>
<?php
use App\SiteSetting;
$getSetting=SiteSetting::getSetting();
//echo"<pre>"; print_r($getSetting); die;
?>
<!--Contact Part Start-->
<section class="contact-part">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
      <div class="contact">
        <div class="contact-box">
            <div class="contact-left">
    <h3 class="send-request">Send Your Request</h3>

    <form method="post" action="{{url('/contact-page-send')}}">
        @csrf
        <div class="input-row">
            <div class="input-group">
                <label>Name:</label>
                <input type="text" placeholder="Please Enter Your Name" name="name" value="{{old('name')}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group">
                <label>Phone:</label>
                <input type="number" placeholder="Please Enter Your Valid Phone" name="phone" value="{{old('phone')}}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="input-row">
            <div class="input-group">
                <label>Email:</label>
                <input type="email" placeholder="Please Enter Your Email" name="email" value="{{old('email')}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group">
                <label>Subject:</label>
                <input type="text" placeholder="Please Enter 15 Character " name="subject" value="{{old('subject')}}">
                @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <label>Message</label>
        <textarea rows="5" placeholder="Your Message Should be 150" name="message"></textarea>
        @error('message')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit">SUBMIT</button>
    </form>
            </div>
            <div class="contact-right">
                <h5>{{$getSetting->title_c}}</h5>
                  <br>
               <p>{{$getSetting->description_c}}</p>
                <p>{{$getSetting->description_c}}</p>
            </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </section>
  <!--Contact part end-->
@endsection
