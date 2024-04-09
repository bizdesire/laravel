 


@foreach ($records as $record)
<div class="col-12">
    

    <div class="card mt-3">
        
        <div class="card-body">
          <h5 class="card-title">{{$record->subject}} </h5> 
          <h6>Category : <span class="badge badge-primary">{{$record->category->label}}</span></h6>
          <h6>Status : <span class="badge badge-warning">{{$record->getStatus()}}</span></h6>
          <p class="card-text">{{$record->message}}</p>
        <div class="text-right">  <a href="{{route('admin.supportTickets.comments',$record->id)}}" class="btn btn-primary">View Comments</a></div>
        </div>
      </div>
</div>
@endforeach

<div class="col-12">
  {!! $records->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
