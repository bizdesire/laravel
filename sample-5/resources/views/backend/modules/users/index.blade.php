@extends('backend.layouts.layoutNew')
@section('stylesheets') 
@endsection
@section('content')
        <div class="m-c-heading">
            <h2>User Listing</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Listing</li>
              </ol>
            </nav>
            
          </div>

          <div class="wrapper-shadow-inset">
             <div class="table-wrapper">
               <!-- /.card-header --> 
              <table class="dTable table-user-listing" id="example2" data-action="<?= route('admin.user.ajax') ?>">
                <thead>
                <tr> 
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Joining Date</th> 
                </tr>
                  
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
     </div>
        

 

<input type="hidden" id="locationUrl" value="{{ route('admin.user.ajax') }}"> 
@endsection      
@section('scripts')
<script type="text/javascript" src="{{url('/admin-vue/scripts/admin/users.js')}}"></script>
@endsection

 