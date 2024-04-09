@extends('backend.layouts.layoutNew')
@section('stylesheets')
@endsection
@section('content')
    <div class="m-c-heading">
        <h2>Support Category</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Support Category</li>
            </ol>
        </nav>
        <a href="{{ route('admin.supportCategory.create') }}" class="main-button m-b-rounded" title="click to add">
            <span class="material-icons">add</span>
        </a>
    </div>

    <div class="wrapper-shadow-inset">
        <div class="table-wrapper">
            <table class="dTable" id="example2" data-action="{{ route('admin.supportCategory.ajax') }}">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/supportCategory.js') }}"></script>
@endsection
