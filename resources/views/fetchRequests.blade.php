 
 @foreach($workers as $worker)
<div class="worker_div">
    <h4> Name: {{$worker->name}}</h4>
    <h4> Profession: {{$worker->profession}}</h4>
    <h4> Email: {{$worker->email}}</h4>
    <h4> Phone: {{$worker->phone}}</h4>
    <h4> Address: {{$worker->address}}</h4>
    <h4> Bio: {{$worker->bio}}</h4>
    <h4> Age: {{$worker->age}}</h4>
    <button class="accept-button"onclick="updateRequests(1,{{$worker->id}})">Accept</button>
    <button class="reject-button"onclick="updateRequests(0)">Decline</button>


</div>
 
 @endforeach