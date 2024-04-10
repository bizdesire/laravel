@extends('home.layouts.layout')
@section('content')
<div class="col-12">
<div class=" row shadow-sm p-3 mb-5 bg-white rounded">
<div class="col-4">
<div class="card">
  <img src="/{{$pool->image}}" class="card-img-top" alt="...">
  
</div>
</div>

<div class="col-4">
<div class=" ">
  <h5 class="card-title">Pool Information: </h5>
  <div class="card-body">
    <h5 class="card-title">{{$pool->name}} ({{$pool->type?->name}})</h5> 
    <p class="card-text">Available : {{$pool->no_participate}} / {{$pending = $pool->no_participate - $pool->members_count}}</p>
    <p class="card-text">Prize Rs.{{$pool->prize}}</p>
    <p class="card-text">No. of Prizes : {{$pool->prizes_count}}</p> 
    <p class="card-text">Rs.{{$pool->discounted_price}} <del>Rs.{{$pool->price}}</del></p>

    @if(empty($pool->member) && $pending > 0)
       @if(auth()->user()->balance() > $pool->discounted_price )
       <a href="{{route('home.poll.join',$pool->id)}}" class="btn btn-primary">Join</a>
       @else
       <h3>Insufficient funds</h3>
       <a href="{{route('home.mywallet')}}" class="btn btn-primary">Add Funds</a>
       @endif
    @endif

    @if(!empty($pool->member))
     
    <a href="#" class="btn btn-success">LET's PLAY</a>
    @endif
  </div>
</div>
</div>

<div class="col-4">
<div class=" ">
  <h5 class="card-title">Prizes: </h5>
  <div class="card-body"> 
    @foreach($pool->prizes as $k => $prize)
    <p class="card-text">#{{$k + 1}} Rs.{{$prize->prize}}</p>  
    @endforeach
  </div>
</div>
</div>
</div>
</div>
@endsection