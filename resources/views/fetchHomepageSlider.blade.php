<div>
        <form enctype="multipart/form-data"  method="POST" action="/addHomepageSliderImage">
            {{ csrf_field() }}
        
        <br><input type="file" name="images[]" multiple="multiple" style="margin-left:150px;">
        <input type="submit">

        </form>
    <div id="images-div">
        @foreach($images as  $image)
        <div class="image-div">
            <img src="/storage/homepageImages/{{$image->imagepath}}" alt="" class="image">
            <i class="fa fa-times"  id="close" onclick="deleteImage('{{$image['imagepath']}}','{{$image['type']}}',this)"></i>
        </div> 
        @endforeach
    </div>
</div>