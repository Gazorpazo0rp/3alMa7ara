<!DOCTYPE html> 
<html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <script  type="text/javascript" src="js/AdminDashboard.js"></script>
        <link rel="stylesheet" type="text/css" href="css/AdminDashboard.css">
        <link rel="stylesheet" type="text/css" href="css/fetchRequests.css">
        <link rel="stylesheet" type="text/css" href="css/fetchViewWorkers.css">
        <link rel="stylesheet" type="text/css" href="css/fetchEditWorker.css">
        <link rel="stylesheet" type="text/css" href="css/fetchEditPages.css">
        <link rel="stylesheet" type="text/css" href="css/fetchViewEditPage.css">
        <link rel="stylesheet" type="text/css" href="css/fetchPendingReservations.css">
        <link rel="stylesheet" type="text/css" href="css/fetchQuestions.css">
        <link rel="stylesheet" type="text/css" href="css/fetchTasks.css">

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
                        <button class="navigation-bar-button" onclick="viewTab(5)">Edit Pages </button>
                        <button class="navigation-bar-button" onclick="viewTab(6)">On-Going Tasks</button>
                        <button class="navigation-bar-button" onclick="viewTab(7)">Edit form questions</button>
                        <a href="/adminLogout" style="text-decoration: none;"><button class="navigation-bar-button" >Log out</button></a>



                </div>
                <div id="action-center">

                </div>
        </div>
        </body>
</html>