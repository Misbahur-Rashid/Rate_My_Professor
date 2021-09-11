@extends('layouts.website.website')
@section('content')
<?php
use App\SiteSetting;
use App\Teacher;
$getSetting=SiteSetting::getSetting();
$getTeacher=Teacher::getTeacher();
//echo"<pre>"; print_r($getTeacher); die;
?>
    <!-- banner part start -->
    <section class="banner">
        <div class="container justify-content-center">
            <div class="row text-center">
                <div class="form_customize bac_text">
                    <form action="{{url('search-teacher')}}" method="get" class="form_control">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select name="school_id" id="" class="form-control">
                                    <option>Select school</option>
                                     @foreach($school as $row)
                                     <option value="{{$row->id}}">{{$row->name}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="department_id" id="" class="form-control">
                                    <option>Select department</option>
                                    @foreach($department as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Search Professor by name" aria-label="Zip" name="search">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" type="submit" style="position: relative;left:-12px;" name="serach_btn">search</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!--Welcome Part Start-->
    <section class="welcome-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="welcome">
                        <h1 class="wel-heading">{{$getSetting->title_h}}</h1>
                        <p class="wel-note">{{$getSetting->description_h}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--welcome part end-->

    <!-- Top Professors Part Start-->
    <section class="Professors-part">
        <div class="container">
            <h1 class="top-10">Top Lecturers</h1>
            <div class="row mx-0">
                @foreach($getTeacher as $row)
               <?php
                 $id=$row['id'];
                 $feeduser=App\FeedBack::where('teacher_id',$id)->sum('three_star');
                 $feedAvg= $feeduser/5;
                //  echo"<pre>"; print_r($feeduser); die;
                 //$topLeader=App\FeedBack::where('teacher_id',$id)->find($feeduser);
                    //echo"<pre>"; print_r($topLeader); die;
               ?>

                <div class="col-md-3 col-sm-12 px-0">
                    <div class="Professors">
                        <img src="{{url('image/teacher/'.$row['logo'])}}" class="w-100" style="border-radius: 10px">
                        <h2 class="p-name">Name:{{$row['name']}}</h2>
                        <p class="d">Desigination: <strong>{{$row['job_title']}}</strong></p>
                        <p class="d">Department: <strong>{{$row['department']['name']}}</strong></p>
                        <div class="star" style="padding-left: 59px">
                            @if($feedAvg<=5)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>({{$feedAvg}})
                            @elseif(($feedAvg>6) && ($feedAvg<=10))
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @elseif(($feedAvg>11) && ($feedAvg<=15))
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>({{$feedAvg}})
                            @elseif(($feedAvg>11) && ($feedAvg<=15))
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>({{$feedAvg}})
                            @elseif($feedAvg>=16 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>({{$feedAvg}})
                            @else
                            <h6>No Review</h6>
                            @endif
                        </div>
                        <div class="read-more">
                            <a target="_blank" href="{{url('single_professor/'.$row['id'])}}">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                 </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Top Professors Part End-->
@endsection

