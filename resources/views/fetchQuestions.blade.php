<h1 style="font-size:35px;text-align:center;">Reservation Questions</h1>
@foreach($data['ques'] as $key=>$value)
<div class="ques_box">
<i class="fa fa-times"  style="position:absolute;width:23px!important;left:5px!important;font-size:30px;"id="close" onclick=""></i>
<div class="ques_div">
<input type="text" class="ques_name"value="{{$key}}">
</div>
@foreach($data['ques'][$key] as $value)
<div class="option_box">
<i class="fa fa-times"  style="left:5px!important;width:13px;"id="close" onclick=""></i>

<h4>{{$value->name}}</h4>
<input type="text" class="op_input" value="{{$value->price}}">
</div>
@endforeach
</div>
<hr>
@endforeach

