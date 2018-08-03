<div class="projects">
    <div id="Add-new-project">
        <h2 style="color:brown"> Add New Project</h2>
        <form enctype="multipart/form-data" id="EditWorkersForm" method="POST" action="/AddProject">
            {{ csrf_field() }}
        <input type="text" placeholder="Project Name" name="name" >
        <input type="text" placeholder="Project Duration" name="period" >
        <input type="text" placeholder="Designer" name="designers" >
        <input type="text" placeholder="Project Location" name="location" >
        <input type="text" placeholder="Project type" name="type" >

        <h4 id="thumb">Thumbnail:</h4>
        <br><input type="file" name="thumbnail" style="margin-left:150px;">
        <h4 id="images">Images:</h4>
        <br><input type="file" name="images[]" multiple="multiple" style="margin-left:150px;">
        <input type="submit" >

        </form>

    </div>
    
    @foreach ($projects as $pr)

        <div class="project">
        <a target="_blank" href="/viewProject/{{$pr->id}}">        </a>

            <i class="fa fa-times"  style="position:absolute;width:23px!important;left:5px!important;font-size:30px;"id="close" onclick="deleteProject({{$pr->id}})"></i>

            <img src="/storage/Projects/{{$pr->thumbnail}}" alt="{{$pr->name}}" width="600" height="400">
        <h3> Project name: {{$pr->name}}</h3>
        <h3> Project Designer{{$pr->designers}}</h3>
        <h3> Location{{$pr->location}}</h3>


        </div>
    @endforeach


</div>