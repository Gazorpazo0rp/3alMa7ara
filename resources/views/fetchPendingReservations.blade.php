<h1 style="font-size:35px;text-align:center;">Pending Reservations</h1>
@foreach($reservationServ as $key=>$value)
<div class="reservation-div">
    <?php $cost=0?>
    <div class="client-info">
    <h1> Client Info</h1>
    <h2>Client Name :{{$customer[$key]['name']}}</h2>
    <h2>Client Age :{{$customer[$key]['age']}}</h2>
    <h2>Client phone :{{$customer[$key]['phone']}}</h2>
    <h2>Client Email :{{$customer[$key]['email']}}</h2>
    </div>
    <div class="reservation-info">
    <h1> Reservation Info</h1>
    @foreach($reservationServ[$key] as $op)
<h3>{{$op['name']}}:{{$op['price']}} جنيه</h3> 
<?php $cost+=$op['price'];?>
    @endforeach
    <h3> السعر الكلى : {{$cost}} جنيه</h3>
    </div>
    <br class="clear"/>
</div>
<hr>

@endforeach