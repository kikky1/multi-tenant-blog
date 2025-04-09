<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('Admin_Template-main/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{route('admin.dashboard')}}">Home </a></li>
            <li class=""><a href="{{route('admin.pending')}}">Pending Users</a></li>
            <li class=""><a href="{{route('admin.viewPost')}}">View Posts</a></li>
            
       
      
    </ul>
 
  </nav>