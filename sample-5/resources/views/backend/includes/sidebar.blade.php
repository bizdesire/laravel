 <aside class="sidebar">
        <div class="logo">Client Panel</div>
        <div class="user">
          <!-- <span><img src="{{url('admin-vue/images/profile.jpg')}}" alt=""></span> -->
          <a href="javascript:void(0);">{{Auth::user()->name}}</a>
        </div>
        <ul class="l-s-none d-flex flex-wrap ">
         <li class="active"><a href="{{route('admin.dashboard')}}"><span class="material-icons sidebar-icon">category</span>Dashboard</a></li>
         <li><a href="{{route('admin.product.index')}}"><span class="material-icons sidebar-icon">category</span>Products</a></li>
       
         <li><a href="{{route('admin.user.list')}}"><span class="material-icons sidebar-icon">category</span>Users</a></li>
       </ul>
</aside> 