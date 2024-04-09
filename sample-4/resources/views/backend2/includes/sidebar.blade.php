 <aside class="sidebar">
        <div class="logo">Admin Panel</div>
        <div class="user">
          <!-- <span><img src="{{url('admin-vue/images/profile.jpg')}}" alt=""></span> -->
          <a href="javascript:void(0);">{{Auth::user()->name}}</a>
        </div>
        <ul class="l-s-none d-flex flex-wrap ">
          <li class="active"><a href="{{route('admin.dashboard')}}"><span class="material-icons sidebar-icon">category</span>Dashboard</a></li>
          <li><a href="{{route('admin.blogCategory.index')}}"><span class="material-icons sidebar-icon">category</span>Blog Category</a></li>
          <li><a href="{{route('admin.forumCategory.index')}}"><span class="material-icons sidebar-icon">category</span>Forum Category</a></li>
          <li><a href="{{route('admin.team.index')}}"><span class="material-icons sidebar-icon">category</span>Our Team</a></li> 
          <li><a href="{{route('admin.pages.index')}}"><span class="material-icons sidebar-icon">category</span>Page Contents</a></li> 
       </ul>
</aside> 