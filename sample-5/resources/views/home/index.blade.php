@extends('home.layouts.layout')
@section('content')

@foreach($products as $p)
<div class="col-6">
      <div class=" row shadow-sm p-3 mb-5 bg-white rounded" style="width: 100%; margin: auto; background:#f8f9fa;">
        <div class="col-4">
          <img src="/{{$p->image}}" class="card-img-top">
        </div>
        <div class="col-4">
          <div class="card-body">
            <h5 class="card-title">{{$p->name}} </h5> 
            
            <p class="card-text">Price: Rs.{{$p->prize}}</p>
            
             
          </div>
        </div>
        <div class="col-4">
          <div class="card-body">
             <a href="{{route('home.addCart',$p->id)}}" class="btn btn-primary btn-block">Add To Cart</a>
          </div>
        </div>
    </div>
</div>
@endforeach

@endsection