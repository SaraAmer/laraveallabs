
<html>
    <head>
    
  
@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
    
    <body>



     
      <div class="py-3 col-md-9">
 
        <h1>Posts</h1>
  
   
        <table class="table table-striped" >
            <thead>
              
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted by</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
           
              <tbody>
                 
  @foreach($posts as $post)
                <tr>
                  
                  <td>{{$post['id']}}</td>
                  <td>{{$post['title']}}</td>
                  <td>{{$post['posted_by']}}</td>
                  <td>{{$post['created_at']}}</td>
                  <td><x-button class=" btn btn-primary mx-2" value="view" href="{{route('post.show',['post' => $post['id']])}}" />
                  <x-button value="Edit" class="btn btn-info mx-2" href="{{route('post.edit')}}"/>
                  <x-button class="btn btn-danger" value="delete" href=""/></td>
                </tr>
          
  @endforeach
              </tbody>
              
            
           
      
          </table>
        </div>
        <a class=" btn btn-success mx-2" href="{{route('post.create')}}" >Create Post</a>
</div>




@endsection




</body>
</html>