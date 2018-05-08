<h1> {{$data[0]['type']}} Page</h1>
<form id="add-section-images" method="POST" action="/AddSectionImages"> 
    <h3>Upload Images</h3>
    <input type="file" name="images[]" multiple>
    <input type="submit" >
</form>
<div id="images-div">
    @foreach($data as  $image)
    <div class="image-div">
        <img src="/storage/Section_images/{{$image->imagepath}}" alt="" class="image">
        <i class="fa fa-times"  id="close" onclick="deleteImage('{{$image['imagepath']}}','{{$image['type']}}')"></i>
    </div> 
    @endforeach
</div>