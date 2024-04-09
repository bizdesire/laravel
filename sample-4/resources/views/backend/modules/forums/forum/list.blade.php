@extends('backend.layouts.layoutNew')
@section('stylesheets')
@endsection
@section('content')
    <div class="m-c-heading">
        <h2>Forums</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forums</li>
            </ol>
        </nav>
    </div>
    <div class="wrapper-shadow-inset">
        <div class="table-wrapper">
             <div>
                <form data-action="{{ route('admin.forum.ajax') }}" id="filterData" class="row">
                  <div class="col-4"><button class="main-button">Filter</button></div>
                </form>
             </div>
             <div class="row" id="getFilterData">
               
             </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/forums.js') }}"></script>
@endsection
