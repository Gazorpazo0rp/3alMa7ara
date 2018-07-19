<div class="projects">
    <div id="Add-new-project">
        <h2 style="color:brown"> Add New Project</h2>
        <form enctype="multipart/form-data" id="EditWorkersForm" method="POST" action="/AddProject">
            {{ csrf_field() }}
        <input type="text" placeholder="Project Name" name="name" >
        <input type="text" placeholder="Project Duration" name="period" >
        <input type="text" placeholder="Designer" name="designers" >
        <input type="text" placeholder="Project Location" name="location" >
        <h4 id="thumb">Thumbnail:</h4>
        <br><input type="file" name="thumbnail" style="margin-left:150px;">
        <h4 id="images">Images:</h4>
        <br><input type="file" name="images" multiple="multiple" style="margin-left:150px;">
        <input type="submit" >

        </form>

    </div>



</div>