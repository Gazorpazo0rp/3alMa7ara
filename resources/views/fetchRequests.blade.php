<h1> Join 3alma7ara requests</h1>

 @foreach($requests as $worker)
<div class="worker_div">
    <h4> Name: {{$worker->name}}</h4>
    <h4> Profession: {{$worker->profession}}</h4>
    <h4> Email: {{$worker->email}}</h4>
    <h4> Phone: {{$worker->phone}}</h4>
    <h4> Address: {{$worker->address}}</h4>
    <h4> Bio: {{$worker->bio}}</h4>
    <h4> Age: {{$worker->age}}</h4>
    <a target="_blank"href="/storage/ApplicantCV/{{$worker->CvFile}}" download>download Cv</a>
    <button class="accept-button"onclick="updateRequests(1,{{$worker->id}},this)">Accept</button>
    <button class="reject-button"onclick="updateRequests(0,{{$worker->id}},this)">Decline</button>
    

</div>
 
 @endforeach