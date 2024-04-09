 


@foreach ($records as $record)
<div class="col-3">
    

    <div class="card mt-3">
        <img class="card-img-top" src="{{url($record->media)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$record->title}} </h5> 
          <h6> <span class="badge badge-primary">{{$record->category->name}} / {{$record->category->name}}</span></h6>
          <h6> <span class="badge badge-warning">{{$record->user->name ?? ''}}</span></h6>
        
        <div class="text-right">  <a href="{{route('admin.blog.comments',$record->slug)}}" class="btn btn-primary">View</a></div>
        </div>
      </div>
</div>
@endforeach
 
  <div class="col-12">
     {!! $records->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>
