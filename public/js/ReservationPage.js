
    var currentIdx=0;
    var refubTabsToggleFlag=0;
    var cost=0;
    var lastAddedRadioCost=0;
    var lastAddedRadioName="";
    var lastClickedRadio;
$(document).ready(function(){
    //initialize the form tabs to view only refubrishment tab
    $('.form-tab').each(function(){
        if($(this).attr('id')!='refub-tab')
        $(this).css('display','none');
    })

    // event listner radio button click
    $('.container').click(function(){
        $('#submit-button').removeAttr('disabled');
    });

    // modify cost value
    $('input[type="radio"]').click(function(){
        //toggle 
        debugger;
        $tempThis=$(this);
        $tempName=$(this).attr('name');
           if($(this).attr('waschecked')=='true'){
               $(this).prop('checked',false);
               $(this).attr('waschecked','false');
           }
           else{
               $(this).attr('waschecked','true');
           }
           $('input[name='+$tempName+']').each(function(){
              
               if(!$(this).is($tempThis)){
                   $(this).attr('waschecked','false');
               }
           });
        //console.log($(this).children('[type=radio]').prop('checked'));
        var radioId=$(this).parent().attr('id');
        var radioInputObj=$(this);
        var currentCost=parseInt(document.getElementById("cost-value").innerHTML);
        var xhttp= new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState===4 &&this.status===200){
                
                if(this.responseText){
                    var clickedCost=this.responseText;
                    var modifiedCost=currentCost;
                    if($(radioInputObj).attr('waschecked')=="true"){
                        if(radioInputObj.attr('name')==lastAddedRadioName){
                            if(radioInputObj.is(lastClickedRadio)){ 
                                modifiedCost+=parseInt(clickedCost);
                            }
                            else{
                                modifiedCost-=parseInt(lastAddedRadioCost);
                                modifiedCost+=parseInt(clickedCost);
                            }
                    }
                    else{
                        modifiedCost+=parseInt(clickedCost);
                        //needs further validation
                        $('input[name='+$tempName+']').each(function(){
              
                           
                       });
                    }
                    lastAddedRadioName=radioInputObj.attr('name');
                    lastClickedRadio=radioInputObj;
                    lastAddedRadioCost=clickedCost;

                    }
                    else {
                        var modifiedCost=currentCost-parseInt(clickedCost);
                        lastAddedRadioCost=0;
                    }
                    document.getElementById("cost-value").innerHTML=modifiedCost.toString();

                }
            }
            
        };

        xhttp.open("GET","modifyCost.php?id="+radioId,true);
        xhttp.send();
 });

    // radio button toggle 
    /*$('input[type="radio"]').click(function(){
     console.log('2');
  

    });
    */
});

function viewTab(idx){
    if (idx==currentIdx)return;
    var tabs=document.getElementsByClassName('form-tab');
    $(tabs[currentIdx]).fadeOut(500,function(){
        $(tabs[idx]).fadeIn(500);
    });
   
    currentIdx=idx;
}
function viewRefubrishmentTabs(){
    if(!refubTabsToggleFlag){
        $('#refubrishment-categories-list').slideDown();
        refubTabsToggleFlag=1;
    }
    else {
        $('#refubrishment-categories-list').slideUp();
        refubTabsToggleFlag=0;
    }
}
//خخخخخخخخ

