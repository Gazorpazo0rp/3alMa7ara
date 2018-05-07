function viewTab(idx){
    var url_holder;
    if(idx==1) url_holder='/pendingReservations'
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
    document.getElementById('action-center').innerHTML=response;

}
function fetchTab2(response){
    document.getElementById('action-center').innerHTML=response;

}
function fetchTab3(response){
    document.getElementById('action-center').innerHTML=response;

}
function fetchTab4(response){
    document.getElementById('action-center').innerHTML=response;

}
function fetchTab5(response){
    document.getElementById('action-center').innerHTML=response;

}
function updateRequests(action,id,buttonObj){
    debugger;
    //console.log($(buttonObj).parent());
    $(this).parent().fadeOut(1200);
    var url_holder;
    if(action==1) url_holder="/acceptRequest/"+id;
    if(action==0) url_holder="/rejectRequest/"+id;
    console.log(url_holder);
    $.ajax({
        method:'GET',
        url: url_holder,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function EditWorker(id){
    $.ajax({
        method:'GET',
        url: "EditWorker/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function BlockClient(id){
    $.ajax({
        method:'GET',
        url: "blockClient/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}