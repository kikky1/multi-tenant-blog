<!DOCTYPE html>
<html>
  @include('admin.header')

  <body>
    <header class="header">   

      @include('admin.nav')

    </header>

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Pending Dashboard</h2>
          </div>
        </div>

@include('admin.echoSession')

        @if ($pendingUsers->isEmpty())
        
           <div class="bg-white text-dark text-center">
                <p>No pending Users.</p>
           </div>
            @else

               <div class="container ms-auto text-center justify-content-center align-items-center">
                <table class="table text-white">
                    
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $pendingUsers as $user )
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route('admin.approve', $user->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve Account</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  
                </table>
               </div>
        @endif
        

@include('admin.footer')
  </body>
</html>