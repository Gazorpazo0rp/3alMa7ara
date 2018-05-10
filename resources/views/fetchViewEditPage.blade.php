<h1> {{$data[0]['type']}} Page</h1>
<form enctype="multipart/form-data" id="add-section-images" method="POST" action="/AddSectionImages"> 
    {{ csrf_field() }}

    <h3>Upload Images</h3>
    <input type="file" name="images[]" multiple="multiple">
    <input style="display:none"type="text" value="{{$data[0]['type']}}" name="section">

    <input type="submit" >
</form>
<div id="images-div">
    @foreach($data as  $image)
    <div class="image-div">
        <img src="/storage/Section_images/{{$image->imagepath}}" alt="" class="image">
        <i class="fa fa-times"  id="close" onclick="deleteImage('{{$image['imagepath']}}','{{$image['type']}}',this)"></i>
    </div> 
    @endforeach
</div>