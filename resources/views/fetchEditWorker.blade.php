<h1 >Edit Worker Info and Images</h1>
<form id="EditWorkersForm"method="POST"action="/SubmitEditWorker">
    {{ csrf_field() }}

<input type="text" placeholder="name"name="name" value="{{$worker['name']}}">
<input type="text" placeholder="age"name="age" value="{{$worker['age']}}">
<input type="text" placeholder="phone"name="phone" value="{{$worker['phone']}}">
<input type="text" placeholder="profession"name="profession" value="{{$worker['profession']}}">
<input type="text" placeholder="address"name="address" value="{{$worker['address']}}">
<input type="text" placeholder="status"name="status" value="{{$worker['status']}}">
<input type="text" placeholder="bio"name="bio" value="{{$worker['bio']}}">
<input type="text" placeholder="rate"name="rate" value="{{$worker['rate']}}">
<input type="text" name="id" value="{{$worker['id']}}" style="display:none">
<input type="file" name ="img[]" multiple>
<input type="submit" >


</form>