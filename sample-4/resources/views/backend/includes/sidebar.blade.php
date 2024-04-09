 <aside class="sidebar">
        <div class="logo">Admin Panel</div>
        <div class="user">
          <!-- <span><img src="{{url('admin-vue/images/profile.jpg')}}" alt=""></span> -->
          <a href="javascript:void(0);">{{Auth::user()->name}}</a>
        </div>
        <ul class="l-s-none d-flex flex-wrap ">
          <li class="{{activeMenuItem(['admin.dashboard'])}}"><a href="{{route('admin.dashboard')}}"><span class="material-icons sidebar-icon">dashboard</span>Dashboard</a></li>
          <li class="{{activeMenuItem(['admin.blogCategory.index','admin.blogCategory.create','admin.blogCategory.edit'])}}"> <a href="{{route('admin.blogCategory.index')}}"><span class="material-icons sidebar-icon">category</span>Blog Category</a></li>
          <li class="{{activeMenuItem(['admin.forumCategory.index','admin.forumCategory.edit','admin.forumCategory.create'])}}"> <a href="{{route('admin.forumCategory.index')}}"><span class="material-icons sidebar-icon">forum</span>Forum Category</a></li>
          <li class="{{activeMenuItem(['admin.forum.list','admin.forum.comments'])}}"> <a href="{{route('admin.forum.list')}}"><span class="material-icons sidebar-icon">forum</span>
            Forums</a></li>
          <li class="{{activeMenuItem(['admin.blog.list','admin.blog.comments'])}}"> <a href="{{route('admin.blog.list')}}"><span class="material-icons sidebar-icon">forum</span>Blogs</a></li>
          <li class="{{activeMenuItem(['admin.team.index','admin.team.create','admin.team.edit'])}}"> <a href="{{route('admin.team.index')}}"><span class="material-icons sidebar-icon">diversity_3</span>Our Team</a></li> 
          <li class="{{activeMenuItem(['admin.pages.index','admin.pages.edit'])}}"> <a href="{{route('admin.pages.index')}}"><span class="material-icons sidebar-icon">category</span>Page Contents</a></li> 
          <li class="{{activeMenuItem(['admin.partner.index','admin.partner.edit','admin.partner.create'])}}"> <a href="{{route('admin.partner.index')}}"><span class="material-icons sidebar-icon">handshake</span>Our Partners</a></li> 
          <li class="{{activeMenuItem(['admin.guideline.index','admin.guideline.create','admin.guideline.edit'])}}"> <a href="{{route('admin.guideline.index')}}"><span class="material-icons sidebar-icon">handshake</span>Guidelines</a></li>
          <li class="{{activeMenuItem(['admin.supportCategory.index','admin.supportCategory.create','admin.supportCategory.edit'])}}"> <a href="{{route('admin.supportCategory.index')}}"><span class="material-icons sidebar-icon">handshake</span>Support Category</a></li> 
          <li class="{{activeMenuItem(['admin.supportTicketReason.index','admin.supportTicketReason.create','admin.supportTicketReason.edit'])}}"> <a href="{{route('admin.supportTicketReason.index')}}"><span class="material-icons sidebar-icon">handshake</span>Support Ticket Reasons</a></li> 
          <li class="{{activeMenuItem(['admin.supportTickets.index','admin.supportTickets.comments'])}}"> <a href="{{route('admin.supportTickets.index')}}"><span class="material-icons sidebar-icon">handshake</span>Support Tickets</a></li> 
          <li class="{{activeMenuItem(['admin.user.list'])}}"> <a href="{{route('admin.user.list')}}"><span class="material-icons sidebar-icon">forum</span>Users</a></li>
       </ul>
</aside>