function viewTab(idx){
    var url_holder;
    if(idx==1) url_holder='/pendingRequests'
    else if(idx==2) url_holder='/JoinUsRequests'
    else if(idx==3) url_holder='/viewStaff'
    else if(idx==4) url_holder='/viewClients'
    else if(idx==5) url_holder='/editWorkerProfile'
    
    $.ajax({
        method:'GET',
        url: url_holder,
        success: function(response){
            if(idx==1) fetchTab1(response);
            if(idx==2) fetchTab1(response);
            if(idx==3) fetchTab1(response);
            if(idx==4) fetchTab1(response);
            if(idx==5) fetchTab1(response);
        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
    
}
function fetchTab1(response){
    console.log(response);
    document.getElementById('action-center').innerHTML=response;

}
function fetchTab2(response){
    document.getElementById('action-center').innerHTML="1";

}
function fetchTab3(response){
    document.getElementById('action-center').innerHTML="1";

}
function fetchTab4(response){
    document.getElementById('action-center').innerHTML="1";

}
function fetchTab5(response){
    document.getElementById('action-center').innerHTML="1";

}
function updateRequests(action,id){
    console.log(id);
    var url_holder;
    if(action==1) url_holder="/acceptRequest/"+id;
    else url_holder="rejectRequest/"+id;
    $.ajax({
        method:'GET',
        url: url_holder,
        success: function(response){
            
        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}