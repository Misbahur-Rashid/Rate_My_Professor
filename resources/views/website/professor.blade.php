
@extends('layouts.website.website')
@section('content')

<style>
    .invalid-feedback {
    display: inline-block !important;
    font-size: 60% !important;
}
</style>

<!--Add Professor Part Start-->
<section class="add-part">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
      <div class="contact">
            <div class="contact-left">
    <h3 class="send-request">Request to add a new Lecturer</h3>
<form action="{{url('/request-teacher-page-send')}}" method="post" enctype="multipart/form-data">
@csrf
        <div class="input-row">
            <div class="input-group">
                <label>First Name</label>
                <input type="text" placeholder="Type name" name="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input-group">
                <label>Last Name</label>
                <input type="text" placeholder="Type Last name" name="lastname">
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>

           <div class="input-row">
            <div class="input-group">
                <label>Enter Department</label>
                <select name="department_id" id=""  class="form-control">
                    <option>Select department</option>
                    @foreach($department as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach

                    @error('department_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </select>
            </div>

            <div class="input-group">
                <label>Enter Desigination</label>
                <input type="text" placeholder="Lecturer" name="job_type">
                @error('job_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="input-row">
            <div class="input-group">
                <label>Upload CV/Portfolio</label>
                <input type="file" placeholder="file" name="cv">
                @error('cv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group">
                <label>Upload Photo</label>
                <input type="file" placeholder="Products Demo...." name="photo">
                @error('photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    <label>Details</label>
    <textarea rows="5" placeholder="Say Something about the Professor..." name="detail"></textarea>
    <button type="submit">SUBMIT</button>

    </form>
            </div>

      </div>
        </div>
      </div>
    </div>
  </section>
  <!--Add Professor part end-->


@endsection
