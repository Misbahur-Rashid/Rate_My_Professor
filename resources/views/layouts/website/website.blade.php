<!DOCTYPE html>
<head>
    <title>::Rate My Professor::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('contents/website/assests/css/aboutUs.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/addNewProfessors.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/allTeachers.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/contactUs.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/professors.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/signup.css')}}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/style.css')}}">
    <script src="{{asset('contents/website/assests/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('contents/website/assests/js/toastr.min.js')}}"></script>
</head>
<body>

    @if(Session::has('success'))
    <script>
        $.toast({
            heading: 'Success',
            text: '{{session("success")}}',
            position: 'top-right',
            loaderBg:'#ff5050',
            bgColor: '#2cd07e',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $.toast({
            heading: 'Error',
            text: '{{session("error")}}',
            position: 'top-right',
            loaderBg:'#ff5050',
            bgColor: '#2cd07e',
            icon: 'error',
            hideAfter: 3000,
            stack: 6
        });
    </script>
    @endif


    @include('layouts.website.header')
    @yield('content')
    @include('layouts.website.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('contents/website/assests/js/script.js')}}"></script>
</body>
</html>
