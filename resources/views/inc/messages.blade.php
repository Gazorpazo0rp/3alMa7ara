@if(count ($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div calss="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div calss="alert alert-danger">
        {{session('error')}}
    </div>
@endif


