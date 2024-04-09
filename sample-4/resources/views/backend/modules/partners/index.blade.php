@extends('backend.layouts.layoutNew')
@section('stylesheets')
@endsection
@section('content')
    <div class="m-c-heading">
        <h2>Our Partners</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Partners</li>
            </ol>
        </nav>
        <a href="{{ route('admin.partner.create') }}" class="main-button m-b-rounded" title="click to add">
            <span class="material-icons">add</span>
        </a>
    </div>

    <div class="wrapper-shadow-inset">
        <div class="table-wrapper">
            <table class="dTable" id="example2" data-action="{{ route('admin.partner.ajax') }}">
                <thead>
                    <tr>
                        <th>Logo</th>
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
    <script type="text/javascript" src="{{ url('/admin-vue/scripts/admin/partners.js') }}"></script>
@endsection
