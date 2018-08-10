
    var currentIdx=0;
    var refubTabsToggleFlag=0;
    var cost=0;
    var modifiedCost=0;
    var keepnumval=1;
$(document).ready(function(){

    //Validate only digits input.
    $(".num").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    
    //initialize the form tabs to view only refubrishment tab
    $('.form-tab').each(function(){
        if($(this).attr('id')!='refub-tab')
        $(this).css('display','none');
    })

    // event listner radio button click
    $('.container').click(function(){
        //console.log(cost);
        if(cost!==0){
        $('#submit-button').removeAttr('disabled');
        }
        else{
            $('#submit-button').attr('disabled',true);

        }
    });

    $('.radio-option-has-cost').click(function(){
        
        var a7a=$(this).next();
        if($(this).next().hasClass('check')) $(this).next().removeClass('check');
        else $(this).next().addClass('check');
        modifiedCost=0;
        var thisObj=$(this);
        var radioName=$(this).attr('name');
        var radioId=$(this).parent().attr('id');
        //console.log($(this).attr('waschecked'));

        var currentCost=parseInt(document.getElementById("cost-value").innerHTML);
        var clickedCost=pricesArray[radioId];
        var num=$(this).parent().children().last().val();
        
        
        if($(thisObj).attr('waschecked')=="false"){
            modifiedCost+=clickedCost*parseInt(num);
            $(this).attr('waschecked','true');
            $(this).prop('checked',true);
            $(this).parent().children().last().prop('disabled',false);

        }
        else{
            modifiedCost-=clickedCost*parseInt(num);
            $(this).attr('waschecked','false');
            $(this).prop('checked',false);

            $(this).parent().children().last().prop('disabled',true);

        }
        cost=modifiedCost+currentCost;
        document.getElementById('cost-value').innerHTML=cost.toString();
        
    });
    // radio button toggle 
    /*$('input[type="radio"]').click(function(){
     console.log('2');
  

    });
    */
    // focusout change cost function
    $('.num').focus(function(){
        keepnumval=parseInt($(this).val());
    });
    $('.num').focusout(function(){

        debugger;
        if($(this).val()=="")
        {
            console.log(keepnumval.toString());
            $(this).val(keepnumval.toString()) ; 
            return ;
        }
        
        var currentCost=parseInt(document.getElementById("cost-value").innerHTML);
        var diff=(parseInt($(this).val())-keepnumval);
        var id=(parseInt($(this).parent().attr('id')));
        var price=pricesArray[id];
        currentCost += price*diff;
        document.getElementById('cost-value').innerHTML=currentCost.toString();

    });






    //workers select

   $('.radiobutton-img').click(function(){
    $(this).siblings().each(function(){
        if($(this)[0].tagName=="INPUT"){
            var radioName=$(this).attr('name');
            var thisObj=$(this);
            if($(this).attr('waschecked')=='true'){
                $(this).prop('checked',false);
                $(this).attr('waschecked','false');
                $(this).parent().css('border','1px solid rgb(192, 184, 184)');

            }
            else{
                $(this).attr('waschecked','true');
                $(this).parent().css('border','1px solid #233444');

            }
            $('input[name="'+radioName+'"]').each(function(){
                if(!$(this).is(thisObj)){
                    $(this).parent().css('border','1px solid rgb(192, 184, 184)');
                    $(this).attr('waschecked','false');
                }
            });
        }
    });
});
    //Validate Only numbers in the text box
     

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

