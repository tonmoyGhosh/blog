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
                            <td><a href="{{url('edit')}}/{{ $blog->id }}">Edit</a> || <a href="javascript:void(0)" v-on:click="deleteBlog({{$blog->id}})">Delete</a></td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
          </table>
            
        </div>
    
    </div>
    
@stop

@section('script')

    <script>
        
        new Vue({
            el: '#app',
            methods: 
            {
                deleteBlog: function (blogId)
                {   
                  let vm = this;
                  token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                  axios.post('delete', 
                      {
                          id: blogId,
                          headers: { 
                              'Content-Type': 'application/json',
                              'X-CSRF-TOKEN': token,
                              'X-Requested-With': 'XMLHttpRequest',
                          }
                      }).then(function (_response)
                      {
                          if(_response.data.responseTitle == 'error') 
                          {   
                              alert(_response.data.responseText);
                              return false;
                          }
                          else
                          {   
                              alert(_response.data.responseText);
                              location.reload();
                          }
                      })
                      .catch(function (error) {
                          console.log(error);
                      });
                }
               
            }
        });
    </script>

@stop