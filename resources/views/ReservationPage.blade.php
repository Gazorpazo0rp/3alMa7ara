<!DOCTYPE html> 
<html>
	<head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script  type="text/javascript" src="js/ReservationPage.js"></script>
        <link rel="stylesheet" type="text/css" href="css/ReservationPage.css">
        <link rel="stylesheet" type="text/css" href="css/NavBar.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		
		
	</head>
	<body>
        @include('inc.navbar')
        @include('inc.messages')
        <style> 
        #logo{
            display:none;

        }
        #minilogo{
            display:block;
        }
            .nav-bar.collapsed ul{
                width:80%!important;
                margin-top:120px!important;
            }
        </style>
        <div id="main-wrapper">
            <div id="form-navigation-bar">
                <button class="form-navigation-bar-button" onclick="viewRefubrishmentTabs()">تشطيبات</button>
                    <div id="refubrishment-categories-list">
                            <button class="refubrishment-button" onclick="viewTab(1)">نجارة</button>
                            <button class="refubrishment-button" onclick="viewTab(2)">محارة</button>
                            <button class="refubrishment-button" onclick="viewTab(3)">أبواب</button>
                            <button class="refubrishment-button" onclick="viewTab(3)">مطابخ</button>
                    </div>
                <button class="form-navigation-bar-button" onclick="viewTab(1)">Decor and Art</button>
                <button class="form-navigation-bar-button" onclick="viewTab(2)">Fire Fighting</button>
                <button class="form-navigation-bar-button" onclick="viewTab(3)">Air Conditioning</button>
            </div>
            <form id="reservation-form" method="POST" action="SubmitReservation" class="clearfix">
                    {{ csrf_field() }}

                <h1 style="text-align:center">  Choose the services and make a reservation</h1>
                <div class="form-tab" id="refub-tab">
                    
                    <?php $idx=0;?><script>  pricesArray=new Array();     lastClickedArray=new Array();</script> 
                    @foreach($Questions as $Q)
                    <script> lastClickedArray["{{$Q->id}}"]="";</script>
                    <div class="radio-options-div">
                        <h3> {{$Q->descriptions}} -</h3> 
 
                        @foreach($Answers[$idx] as $Ans)
                        <label  class="container" id="{{$Ans->id}}">{{$Ans->name}}
                        <input class="radio-option-has-cost" type="radio" name="{{$Ans->id}}" waschecked="false" value="{{$Ans->name}}">
                            <span class="checkmark"></span>
                            <script> pricesArray["{{$Ans->id}}"]={{$Ans->price}};</script>
                        </label>
                        @endforeach
                        
                    </div>
                    <?php $idx++;?>

                    @endforeach
                    <?php $idx = 0; $professionNameArray=[0=>"نجارة",1=>"نقاشة",2=>"محارة",3=>"جبس",4=>"جبس بلدى",5=>"بلاط",6=>"سباكة",7=>"كهربا",8=>"لاند سكيب",9=>"مهندسين",10=>"اخشاب"]; //This line will be hard coded ?> 
                    @foreach ($Professions as $Prof)
                    <div class="radio-options-div-img">
                        <h3 style="text-align:right"> اختار <?php echo $professionNameArray[$Prof]; ?> -</h3> 
                        @foreach($Workers[$idx] as $worker)
                        <label  class="container-img" id="{{$worker->id}}">
                        <h4 >{{$worker->name}}</h4>
                        <input type="radio" name="{{$worker['profession']}}" waschecked="false" value="{{$worker->id}}">
                        <img src="/storage/WorkerProfilePictures/{{$worker->imagepath}}" class="radiobutton-img w3-grayscale-min" alt="failed to load image">
                        <h4>rate:{{$worker->rate}}</h4>
                        <a target="_blank" href="/worker/{{$worker->id}}" class="show-profile">show profile</a>
                        </label>
                        @endforeach
                            
                            
                        </div>
                        <?php $idx++;?>
                    @endforeach
                </div>
                <div class="form-tab"> Decor and Atr</div>
                <div class="form-tab"> Fire Fighting</div>
                <div class="form-tab"> Air Conditioning</div>

            </form>
            

            <div id="cost-estimation-div">
                <h2> Estimated Cost</h2>
                <h1 id="cost-value"> 0 LE</h1>
                <h4> Note: This cost is just an estimation. The company will contact you with the final cost and further details.</h4>
                <input type="submit" form="reservation-form" id="submit-button" value="Submit Reservation" disabled> 

            </div>
        </div>
        
    </body>
</html>
