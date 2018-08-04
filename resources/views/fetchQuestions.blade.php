<h1 style="font-size:35px;text-align:center;">Reservation Questions</h1>
<?php $idx=0;?>
@foreach($Ques as $Q)
<div class="ques_box">
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
<input type="text" class="op_input" value="{{$ans->price}}" id = "{{$ans->price}}">
</div>
@endforeach
</div>
<hr>
<?php $idx++;?>
<a href=""><button class="submitQues">Submit changes</button></a>

@endforeach

