<!DOCTYPE html>
<html>
@include('admin.header')
<body>

<header class="header"> 

@include('admin.nav')

</header>

    <div class="d-flex align-items-stretch">

@include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="text-white h5 no-margin-bottom">Viewing All Post Dashboard</h2>
          </div>
        </div>

@include('admin.echoSession')

<div class="container text-center justify-content-center align-items-center">
    <div class="mt-5 mb-5 text-white bg-success py-2">
        <h3 >All Posts</h3>
    </div>

    <div class="table-responsive shadow-sm rounded">

        <table class="table table-bordered table-hover align-middle mb-0 text-white">
        
            <thead class="thead-light">
                <tr class="">
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Tenant</th>
                    <th>Created At</th>
                 
                </tr>
            </thead>
         
           @foreach ( $posts as $post)
               
            <tr>
                <td>{{($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration}}</td>
                <td>{{$post->title}}</td>
                <td>{!!Str::limit($post->content, 50)!!}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->tenant->name}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
            </tr>
    
            @endforeach
          
            
        </table>
    </div>
    

        
   </div>

   <div class="mt-4 d-flex justify-content-center align-items-center">
        {{$posts->links()}}
    </div>

    
 @include('admin.footer')
  </body>
</html>