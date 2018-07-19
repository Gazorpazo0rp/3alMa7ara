
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/NewSectionPage.css">

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