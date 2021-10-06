@extends('layouts.app')
@section('content')

    
    <div id="app" class="col-sm-6 col-sm-offset-3">
        

        <div class="panel-body col-sm-12">
            
            <h3>Blog List</h3>
            <hr>

            <a href="{{url('create')}}">Add Blog</a>
            <br><br>

            <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if($blogs)
                        @foreach($blogs as $blog)
                          <tr>
                            <td>{{ $blog->name }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>{{ $blog->category }}</td>
                            <td>{{ $blog->tag }}</td>
                            <td><a href="">Edit</a> || <a href="">Delete</a></td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
          </table>
            
        </div>
    
    </div>
    
@stop

@section('script')

    <script src="https://unpkg.com/vue@2.6.11/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        
    </script>

@stop