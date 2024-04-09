@extends('backend.layouts.layoutNew')
@section('content')
    <div class="m-c-heading">
        <h2>Dashboard</h2> 
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="dashboard-stats">
                <h4>Total Blogs</h4>
                <div class="d-s-details"><span class="d-s-count">{{ $blogs }}</span></div> 
            </div>
        </div> 
        <div class="col-sm-3">
            <div class="dashboard-stats">
                <h4>Total Forums</h4>
                <div class="d-s-details"><span class="d-s-count">{{ $forums }}</span></div> 
            </div>
        </div> 
        <div class="col-sm-3">
            <div class="dashboard-stats">
                <h4>Open Tickets</h4>
                <div class="d-s-details"><span class="d-s-count">{{ $tickets }}</span></div> 
            </div>
        </div> 

        <div class="col-sm-6 mt-3">
            <div class="row">
               <div class="col-12">
                <h4>Support Ticket Notifications</h4>
                    @foreach ($notifications as $n)
                        <div class="card text-white bg-info mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">Support ({{$n->tickets_count}})</div>
                                    <div class="col-6 text-right"> <strong class="pull-right">{{$n->created_at->diffForHumans()}}</div>
                                </div>
                            </div>
                            <div class="card-body">
                               <p class="card-text">{!!$n->message!!}</p>
                            </div>
                            <div class="card-footer bg-transparent border-warning text-right"><a href="{{$n->getLink()}}" class="btn btn-warning">View</a></div>
                        </div> 
                    @endforeach
               </div>
            </div>
        </div> 
    </div>
@endsection