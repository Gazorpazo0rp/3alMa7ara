<?php $cnt=0; $professionNameArray=[0=>'نجار',1=>'محار',2=>'مبلط']?>

<h1> 3alma7ara Staff</h1>
@foreach($workers as $worker)
<div class="view-worker-div">
    <h4>{{$worker['name']}}</h4>
    <h4>{{$professionNameArray[$worker['profession']]}}</h4>
    <h4>{{$worker['age']}}</h4>
    <h4>{{$worker['phone']}}</h4>
    <h4>{{$worker['stauts']}}</h4>
    <h4>{{$worker['rate']}} stars</h4>
    <h4>{{$worker['status']}} </h4>

    <img src="/storage/WorkerProfilePictures/{{$worker->imagepath}}" alt="" class="worker-img">

    <button class="edit-worker-button" onclick="EditWorker({{$worker['id']}})">Edit Worker</button>
    
</div>

@endforeach

