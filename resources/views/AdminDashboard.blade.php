<!DOCTYPE html> 
<html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script  type="text/javascript" src="js/AdminDashboard.js"></script>
        <link rel="stylesheet" type="text/css" href="css/AdminDashboard.css">
        <link rel="stylesheet" type="text/css" href="css/fetchRequests.css">
        <link rel="stylesheet" type="text/css" href="css/fetchViewWorkers.css">
        <link rel="stylesheet" type="text/css" href="css/fetchEditWorker.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
                
                
        </head>
        <body>
        @include('inc.messages')
        <div id="main-wrapper">
                <div id="navigation-bar">
                        <a id ="minilogoLink"href="/"><img id="minilogo" src="/images/Homepage_images/Admin.png"></a>
                        <br><br><br><br><br><br><br>
                        <button class="navigation-bar-button" onclick="viewTab(1)">Pending Reservations</button>
                        <button class="navigation-bar-button" onclick="viewTab(2)">Join us Requests</button>
                        <button class="navigation-bar-button" onclick="viewTab(3)">View staff</button>
                        <button class="navigation-bar-button" onclick="viewTab(4)">View clients</button>
                        <button class="navigation-bar-button" onclick="viewTab(5)">Edit Staff Profiles</button>
                        <button class="navigation-bar-button" onclick="viewTab(6)">Edit Reservation info</button>


                </div>
                <div id="action-center">

                </div>
        </div>
        </body>
</html>