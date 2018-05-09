<h1 style="font-size:35px;text-align:center;">Pending Reservations</h1>
<?php $cnt=0; $professionNameArray=[0=>'نجار',1=>'محار',2=>'مبلط']?>

@foreach($data['reservationServ'] as $key=>$value)
    <div class="reservation-div">
        <?php $cost=0?>
        <div class="client-info">
        <h1> Client Info</h1>
        <h2>Client Name :{{$data['customer'][$key]['name']}}</h2>
        <h2>Client Age :{{$data['customer'][$key]['age']}}</h2>
        <h2>Client phone :{{$data['customer'][$key]['phone']}}</h2>
        <h2>Client Email :{{$data['customer'][$key]['email']}}</h2>
        </div>
        <div class="reservation-info">
        <h1> Reservation Info</h1>
    @foreach($data['reservationServ'][$key] as $op)
        <h3>{{$op['name']}}:{{$op['price']}} جنيه</h3> 
        <?php $cost+=$op['price'];?>
    @endforeach
    <h1>الصنايعية اللى اختارهم ال client</h1>
    @foreach($data['workersData'][$key] as $worker)
            
        <h3>{{$professionNameArray[$worker['profession']]}} : {{$worker->name}} </h3>
    @endforeach
    <h3> السعر الكلى : {{$cost}} جنيه</h3>
    </div>
    <br class="clear"/>
</div>
<hr>

@endforeach