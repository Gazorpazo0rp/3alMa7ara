
    var currentIdx=0;
    var refubTabsToggleFlag=0;
    var cost=0;
    var modifiedCost=0;
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

    $('.radio-option-has-cost').click(function(){
        debugger;
        modifiedCost=0;
        var thisObj=$(this);
        var radioName=$(this).attr('name');
        var radioId=$(this).parent().attr('id');
        //console.log($(this).attr('waschecked'));

        var currentCost=parseInt(document.getElementById("cost-value").innerHTML);
        var clickedCost=pricesArray[radioId];
        if($(thisObj).attr('waschecked')=="false"){
            modifiedCost+=clickedCost;
            if(lastClickedArray[radioName]!="") {
                modifiedCost-=pricesArray[lastClickedArray[radioName]];
                console.log(lastClickedArray[radioName]);
            }
           // console.log(radioName);
            lastClickedArray[radioName]=radioId;

        }
        else{
            modifiedCost-=clickedCost;
            lastClickedArray[radioName]="";
            //console.log(radioName); 
            console.log(lastClickedArray[radioName]);
        }
        cost=modifiedCost+currentCost;
        document.getElementById('cost-value').innerHTML=cost.toString();
        //toggle radio button
        if($(this).attr('waschecked')=='true'){
            $(this).prop('checked',false);
            $(this).attr('waschecked','false');
        }
        else{
            $(this).attr('waschecked','true');
        }
        $('input[name="'+radioName+'"]').each(function(){
           
            if(!$(this).is(thisObj)){
                $(this).attr('waschecked','false');
            }
        });

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

