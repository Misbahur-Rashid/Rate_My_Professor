@extends('layouts.website.website')
@section('content')
    <section class="Professors-part1">
      <div class="container">
        <div class="row mx-0">
            @foreach($alldata as  $row)
          <div class="col-md-3 col-sm-12 px-0">

              <div class="Professors">
                <img src="{{url('image/teacher/'.$row['logo'])}}" class="w-100">
                  <h2 class="p-name">Name:{{$row['name']}}</h2>
                  <p class="d">Desigination: {{$row['job_title']}}</p>
                  <p class="d">Department:{{$row['department']['name']}}</p>
                  <p class="d">School Type:{{$row['school']['name']}}</p>
                  <div class="star" style="padding-left: 60px;">
                      <?php
                      $id=$row['id'];
                      $feedBack=App\FeedBack::with('uses')->where('teacher_id',$id)->sum('three_star');
                      //echo"<pre>"; print_r($feedBack); die;
                      $feedAvg= $feedBack/5;
                       ?>

                  @if($feedAvg<=5)
                  <a href="#"><i class="fa fa-star"></i></a>
                  @elseif(($feedAvg>6) && ($feedAvg<=10))
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  @elseif(($feedAvg>11) && ($feedAvg<=15))
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  @elseif(($feedAvg>11) && ($feedAvg<=15))
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  @elseif($feedAvg>=16 )
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  @else
                  <h6>No Review</h6>
                  @endif
                </div>
                  <div class="read-more">
                  <a href="{{url('single_professor/'.$row['id'])}}">Read More <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
          </div>
          @endforeach
      </div>
    </section>
@endsection
