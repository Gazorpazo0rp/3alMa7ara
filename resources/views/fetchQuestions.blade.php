<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

                
        




<h1 style="font-size:35px;text-align:center;">Reservation Questions</h1>
<div id="new_ques">
<h2 style="text-align:center"> Add New Question </h2>
<form method="post" action="addNewQues">
{{ csrf_field() }}
        <input name="QuesName" type="text" id="ques" placeholder="Service Describtion">
        <input name="category" type="text"  placeholder="Category"><br>

        <div class="newOption">
                <input name="op1" type="text"  placeholder="Option Name">
                <input name="pr1" type="text"  placeholder="Option Price">
                <input name="op2" type="text"  placeholder="Option Name">
                <input name="pr2" type="text"  placeholder="Option Price">
        </div>
        
        <i class="fas fa-plus" id="add" onclick="addOp()"></i>
        <input type="submit" class="submitQues" value="submit changes">

        <div class="clearfix"></div>

</form>
</div>
<?php $idx=0;?>
@foreach($Ques as $Q)
<form class="ques_box" action="/editQuestion" method="post">
        {{ csrf_field() }}
<i class="fa fa-times"  style="position:absolute;width:23px!important;left:5px!important;font-size:30px;"id="close" onclick="deleteQues({{$Q->id}})"></i>
<div class="ques_div">
<input type="text" class="ques_name"value="{{$Q->descriptions}}">
<?php // ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
// ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
// السطر اللى تحتتك?>
<input style="display:none;" name="">
</div>
@foreach($Answers[$idx] as $ans)
<div class="option_box">
<i class="fa fa-times"  style="left:5px!important;width:13px;"id="close" onclick="deleteOp({{$ans->id}})"></i>

<h4>{{$ans->name}}</h4>
<input type="text" class="op_input" value="{{$ans->price}}" name= "{{$ans->id}}">

</div>
@endforeach
<input type="submit" class="submitQues" value="submit changes">

</form>
<hr>
<?php $idx++;?>

@endforeach


       
