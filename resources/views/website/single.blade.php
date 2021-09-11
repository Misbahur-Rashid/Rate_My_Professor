@extends('layouts.website.website')
@section('content')

<style>
  input[type=checkbox],
  input[type=radio] {

    position: relative !important;
    top: 29px !important;
    right: 213px !important;
  }
</style>
<!--Profesors Details Part Start-->
<section class="profesorDetails-part">
  <div class="container">
    <h1 class="professors-title>">Hello i am {{$getData->job_title}} {{$getData->name}}</h1>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="profile-img">
          <img src="{{url('image/teacher/'.$getData->logo)}}">
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="short-details">
          <h3>Name: {{$getData->name}}</h3>
          <h4>Department: {{$getData->department->name}}</h4>
          <h4>School: {{$getData->school->name}}</h4>
          <p>Classes: {{$getData->classes}}</p>
          <span class="heading">User Rating:</span>
          @if($feedAvg<=5) <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            @elseif(($feedAvg>6) && ($feedAvg<=10)) <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              @elseif(($feedAvg>11) && ($feedAvg<=15)) <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                @elseif(($feedAvg>11) && ($feedAvg<=15)) <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  @elseif($feedAvg>=16 )
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  @else
                  <h6>No Review</h6>
                  @endif
                  <p>{{$feedAvg}} average based on {{$feedBackCount}} reviews.</p>


        </div>
      </div>
      <div class="details">
        <p>{{$getData->text}}</p>
      </div>


      @guest
      <h3>Want to review</h3>
      <a href="{{url('/student/login')}}" style="padding: 6px 20px;
                    font-size: 20px;
                    text-transform: uppercase;
                    font-weight: 600;
                    border: 1px solid #007bff;
                    margin-left: 14px;
                    dispaly: block;
                    display: block;
                    text-decoration: none;
                    background: #007bff;
                    color: #fff !important;
                    border-radius: 5px;
                    transition: .5s;">Sign Up</a>
      @else

      @if(!empty($getFeedback))
      <h5 style="color: rgb(78, 47, 255)">You have already Published your Feedback</h5>
      @else
      <form action="{{url('feedback-page-send')}}" method="post">
        <h4>Give The FeedBack</h4>
        @csrf
        <input type="hidden" name="teacher_id" value="{{$getData->id}}">
        <input type="radio" value="1" name="three_star" id="three-star">
        <label for="three-star" style="color: #000">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star "></span>
          <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </label></br>
        <input type="radio" value="2" name="three_star" id="three-star">
        <label for="three-star" style="color: #000">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </label></br>
        <input type="radio" value="3" name="three_star" id="three-star">
        <label for="three-star" style="color: #000">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span></label></br>

        <input type="radio" value="4" name="three_star" id="four-star">
        <label for="four-star" style="color: #000">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
        </label></br>

        <input type="radio" value="5" name="three_star" id="five-star">
        <label for="five-star" style="color: #000">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span></label></br>
        <label for="" style="color: #000">Comment</label>
        <textarea name="comment" id="" cols="70" rows="10" placeholder="Type Your Comment"></textarea>
        <button type="submit">submit</button>
      </form>
      @endif
      @endguest



      <div class="container" style="margin-top: 40px;margin-bottom:30px">
        <h2 class="text-center" style="color: rgb(78, 47, 255);text-transform:uppercase">Show Feed Back</h2>
        <div class="card">
          <div class="card-body">
            <div class="row">
              @foreach($feedBackCheck as $row)
              <div class="col-md-2">
                <img src="{{url('image/student/'.$row->uses[0]->image)}}" class="img img-rounded img-fluid" />
                <p class="text-secondary text-center">{{$row->created_at->diffForHumans()}}</p>
              </div>
              <div class="col-md-10">
                <p>
                  <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$row->uses[0]->name}}</strong></a>
                  @if($row->three_star == 1)
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  @elseif($row->three_star == 2)
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  @elseif($row->three_star == 3)
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  @elseif($row->three_star == 4)
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  @elseif($row->three_star == 5)
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                  @else
                <h6>No Reviews</h6>
                @endif
                </p>
                <div class="clearfix"></div>
                <p>{{$row->comment}}</p>
                {{-- <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p> --}}
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>
<!--Profesors Details part end-->

@endsection