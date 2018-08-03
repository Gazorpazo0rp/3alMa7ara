<h1 style="font-size:35px;text-align:center;">Pending Reservations</h1>
<?php $cnt=0; $professionNameArray=[0=>"نجارة",1=>"نقاشة",2=>"محارة",3=>"جبس",4=>"جبس بلدى",5=>"بلاط",6=>"سباكة",7=>"كهربا",8=>"لاند سكيب",9=>"مهندسين",10=>"اخشاب"]?>

@foreach($data['customer'] as $cust)
    <div class="reservation-div">
        
        <div class="client-info">
        <h1> Client Info</h1>
        <h2>Client Name :{{$cust['name']}}</h2>
        <h2>Client Age :{{$cust['age']}}</h2>
        <h2>Client phone :{{$cust['phone']}}</h2>
        <h2>Client Email :{{$cust['email']}}</h2>
        </div>
        <div class="reservation-info">
        <h1> Reservation Info</h1>
        <h3>{{$data['forms'][$cnt]['services']}}</h3> 
        
        <h1>الصنايعية اللى اختارهم ال client</h1>
    
            
        <h3> {{$data['forms'][$cnt]['workers']}}</h3>
    <h3> السعر الكلى : {{$data['forms'][$cnt]['totalcost']}} جنيه</h3>
    </div>
    <br class="clear"/>
    <button class="accept-button"onclick="updateReservation(1,{{$data['customer'][$cnt]['id']}},{{$data['forms'][$cnt]['id']}})" id="accept">Accept</button>
    <button class="reject-button"onclick="updateReservation(0,{{$data['customer'][$cnt]['id']}},{{$data['forms'][$cnt]['id']}})" id="reject">Decline</button>
</div>
<hr>
<?php $cnt++;?>
@endforeach
