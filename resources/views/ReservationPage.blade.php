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
                    <script>  pricesArray=new Array();     lastClickedArray=new Array();</script> 
                    @foreach($data['ques'] as $key=>$value)
                    <script> lastClickedArray["{{$key}}"]="";</script>
                    <div class="radio-options-div">
                        <h3> {{$key}} -</h3> 
                    <input type="textarea" placeholder="تفاصيل لو حابب" class="add-note-box" name="{{$key.'note'}}">
 
                        @foreach($data['ques'][$key] as $value)
                        <label  class="container" id="{{$value->name}}">{{$value->name}}
                        <input class="radio-option-has-cost" type="radio" name="{{$key}}" waschecked="false" value="{{$value->id}}">
                            <span class="checkmark"></span>
                            <script> pricesArray["{{$value->name}}"]={{$value->price}};</script>
                        </label>
                        @endforeach
                        
                    </div>
                    @endforeach
                    <?php $cnt=0; $professionNameArray=[0=>'نجار',1=>'محار',2=>'مبلط']?>
                    @foreach ($data['workers'] as $key =>$value)
                    <div class="radio-options-div-img">
                        <h3 style="text-align:right"> اختار <?php echo $professionNameArray[$cnt]; ?> -</h3> 
                        <?php if (sizeof($data['workers'][$cnt])==0) echo'<label class="container" ><h4 style="text-align:right">كل الصنايعية ف المجال دا مشغولين دلوقتى..تحب نختارلك صنايعى لما حد منهم يفضا؟ </h4><input type="radio" name="pick'.$cnt.'" waschecked="false" > <span id="toggle"class="checkmark"></span></label>'; $cnt++;?>
                        @foreach($data['workers'][$key] as $value)
                        
                        <label  class="container-img" id="{{$value->id}}">
                        <h4 >{{$value->name}}</h4>
                        <input type="radio" name="{{$value['profession']}}" waschecked="false" value="{{$value->id}}">
                        <img src="/storage/Worker_images/{{$value->imagepath}}" class="radiobutton-img w3-grayscale-min">
                        <h4>rate:{{$value->rate}}</h4>
                        <a target="_blank" href="/worker/{{$value->id}}" class="show-profile">show profile</a>
                        </label>
                        @endforeach
                            
                            
                        </div>
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
