@extends('layouts.website.website')
@section('content')
<?php
use App\SiteSetting;
$getSetting=SiteSetting::getSetting();
//echo"<pre>"; print_r($getSetting); die;
?>
<!--AboutUs Part Start-->
<section class="about-part">
    <div class="about-img">
      <img src="{{url('image/site/banner/'.$getSetting->banner_a)}}">
    </div>
    <div class="container">
      <div class="row">
         <div class="col-sm-12">
           <div class="about">
                <h1 class="about-heading">{{$getSetting->title_a}}</h1>
                <p class="about-note">
                {{$getSetting->description_a}}
                </p>
            </div>
        </div>
     </div>
    </div>
</section>
<!--AboutUs part end-->

@endsection
