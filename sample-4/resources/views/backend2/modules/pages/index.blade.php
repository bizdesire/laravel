@extends('backend.layouts.layoutNew')
@section('stylesheets') 
@endsection
@section('content')


        <div class="m-c-heading">
            <h2>Page Content Management</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Page Content Management</li>
              </ol>
            </nav>
            
          </div>

          <div class="wrapper-shadow-inset">
             <div class="table-wrapper">
              <table class="dTable" id="example2" data-action="{{route('admin.pages.ajax')}}">
                <thead>
                  <tr>
                   
                    <th>Title</th> 
                    
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
<script type="text/javascript" src="{{url('/admin-vue/scripts/admin/blog.js')}}"></script>
 
@endsection