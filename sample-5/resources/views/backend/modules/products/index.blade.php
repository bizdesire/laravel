@extends('backend.layouts.layoutNew')
@section('stylesheets') 
@endsection
@section('content')


        <div class="m-c-heading">
            <h2>Product Management</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Management</li>
              </ol>
            </nav>
            <a href="{{route('admin.product.create')}}" class="main-button m-b-rounded" title="click to add category">
              <span class="material-icons">add</span>
            </a>
          </div>

          <div class="wrapper-shadow-inset">
             <div class="table-wrapper">
              <table class="dTable" id="example2" data-action="{{route('admin.product.ajax')}}">
                <thead>
                  <tr>
                    <th>Picture</th> 
                    <th>Name</th> 
                    <th>Price</th> 
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
<script type="text/javascript" src="{{url('/admin-vue/scripts/admin/products.js')}}"></script>
 
@endsection