
<!DOCTYPE html>

<html>
<head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/Homepage.js"></script>
        <script src="js/jssor.slider-27.4.0.min.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/NewSectionPage.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    .nav-bar{
        top:0px!important;
    }
</style>
</head>

<body>
    @include('inc.navbar')
    @include('inc.messages')
<div class="gallery-container">
        <h1 class="header">{{$Header}}</h1>

    @foreach ($Projects as $pr)
    <div class="responsive">
        <div class="gallery">
        <a target="_blank" href="/viewProject/{{$pr->id}}">
            <img src="/storage/Projects/{{$pr->thumbnail}}" alt="{{$pr->name}}" width="600" height="400">
        </a>
        </div>
    </div>
    @endforeach
    <div class="clearfix"></div>

</div>


<div class="clearfix"></div>


</body>

</html>