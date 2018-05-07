
@foreach($customers as $customer)
<div class="view-worker-div">
    <h4>{{$customer['name']}}</h4>
    <h4>{{$customer['age']}}</h4>
    <h4>{{$customer['gender']}}</h4>
    <h4>{{$customer['phone']}}</h4>
    <h4>{{$customer['email']}}</h4>
    <button class="edit-worker-button" onclick="BlockClient({{$customer['id']}})"> Block </button>
    
</div>

@endforeach
