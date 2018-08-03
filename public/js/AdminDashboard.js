function viewTab(idx){
    var url_holder;
    if(idx==1) url_holder='/pendingReservations'
    else if(idx==2) url_holder='/JoinUsRequests'
    else if(idx==3) url_holder='/viewStaff'
    else if(idx==4) url_holder='/viewClients'
    else if(idx==5) url_holder='/editPages'
    else if(idx==6) url_holder='/onGoingTasks'
    else if(idx==7) url_holder='/questions'
    else if(idx==8) url_holder='/homepageSlider'

    
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
function viewSection(idx){
    var section;
    if  (idx==0) section="Decor & art"
    else if  (idx==1) section="Design"
    else if  (idx==2) section="Firefighting | Air conditioning"
    else if   (idx==3) section="Refurbishment"
    $.ajax({
        method:'GET',
        url: "viewEditSection/"+section,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function deleteImage(path,type,icon){
    icon.style.dispaly="none";
    $.ajax({
        method:'GET',
        url: "deleteSectionImage/"+path+"/"+type,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function updateReservation(action,customerId,formId){
    var url_holder;
    if (action==1) url_holder="acceptReservation";
    else url_holder="rejectReservation";
    $.ajax({
        method:'GET',
        url: url_holder+"/"+customerId+"/"+formId,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function updateTask(id){
    $.ajax({
        method:'GET',
        url: "updateTask/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
function deleteProject(id){
    $.ajax({
        method:'GET',
        url: "deleteProject/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}

function deleteQues(id){
    $.ajax({
        method:'GET',
        url: "deleteQues/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}

function deleteOp(id){
    $.ajax({
        method:'GET',
        url: "deleteOp/"+id,
        success: function(response){
            document.getElementById('action-center').innerHTML=response;

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}