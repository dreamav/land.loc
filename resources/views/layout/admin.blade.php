<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Unique</title>
<link rel="icon" href="{{asset('assets/favicon.png')}}" type="image/png">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/adm_style.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="{{asset('assets/js/respond-1.1.0.min.js')}}"></script>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/html5element.js')}}"></script>
<![endif]-->
 
</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  @yield("header")

@if( session('status') )
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if( count($errors) > 0 )
    <div class="alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</header>
<!--Header_section--> 

  @yield("content")


</body>
</html>