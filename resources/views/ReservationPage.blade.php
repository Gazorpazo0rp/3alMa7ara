<!DOCTYPE html> 
<html>
	<head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script  type="text/javascript" src="js/ReservationPage.js"></script>
        <link rel="stylesheet" type="text/css" href="css/ReservationPage.css">
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

            <form id="reservation-form" method="POST" action="/">
                <h1 style="text-align:center">  Choose the services and make a reservation</h1>
                <div class="form-tab" id="refub-tab"> 
                    <div class="radio-options-div">
                        <h3> نوع البتاع عايز يبقى ايه؟ -</h3>
                        <input type="textarea" placeholder="تفاصيل لو حابب" class="add-note-box">
                        <label  class="container" id="khashab">خشب
                            <input type="radio" name="radio1" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="ezaz">ازاز
                            <input type="radio" name="radio1" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="ceramic">سيراميك
                            <input type="radio" name="radio1" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="metal">معدن
                            <input type="radio" name="radio1" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="radio-options-div">
                        <h3> نوع البتاع عايز يبقى ايه؟ -</h3>
                        <input type="textarea" placeholder="تفاصيل لو حابب" class="add-note-box">
                        <label  class="container" id="khashab">خشب
                            <input type="radio" name="radio2" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="ezaz">ازاز
                            <input type="radio" name="radio2" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="ceramic">سيراميك
                            <input type="radio" name="radio2" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" id="metal">معدن
                            <input type="radio" name="radio2" waschecked="false">
                            <span class="checkmark"></span>
                        </label>
                    </div>
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
