@extends('layouts.app')
@section('content')

    <br><br>

    <div id="app" class="col-sm-6 col-sm-offset-3">
        

        <div class="panel-body col-sm-12">
            
            <h3>Add Blog</h3>
            <hr>

            <a href="{{url('list')}}">Blog List</a>
            <br><br>


            <div class="form-group">
                
                <label class="col-sm-3 control-label">Name:*</label>
                <div class="col-sm-9">
                    <input type="text" v-model="name" class="form-control" id="name" placeholder="Blog Name">
                    <p id="nameMsg" style="max-height:3px;"></p>
                </div>
            </div>
           

            <div class="form-group">
                <label class="col-sm-3 control-label">Slug:</label>
                <div class="col-sm-9">
                    <input type="text" v-model="slug" class="form-control" id="slug" placeholder="Blog Slug">
                    <p id="slugMsg" style="max-height:3px;"></p>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                    <input type="text" v-model="category" class="form-control" id="category" placeholder="Blog Category">
                    <p id="categoryMsg" style="max-height:3px;"></p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Tag:</label>
                <div class="col-sm-9">
                    <input type="text" v-model="tag" class="form-control" id="tag" placeholder="Blog Tag">
                    <p id="tagMsg" style="max-height:3px;"></p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Banner:</label>
                <div class="col-sm-9">
                    <input type="text" v-model="banner" class="form-control" id="banner" placeholder="Blog Banner">
                    <p id="bannerMsg" style="max-height:3px;"></p>
                </div>
            </div>

            
            <div class="form-group">
                <label class="col-sm-3 control-label">Body:</label>
                <div class="col-sm-9">
                    <textarea type="text" v-model="body" class="form-control" id="body" placeholder="Blog Body"></textarea>
                </div>
            </div>

            <button class="btn btn-sucess" v-on:click="addBlog">Submit</button>
            
        </div>
    
    </div>
    
@stop

@section('script')

    <script>

        new Vue({
            el: '#app',
            data: {
                name: '',
                slug: '',
                category: '',
                tag: '',
                banner: '',
                body: ''
            },
            
            methods: 
            {
                addBlog: function ()
                {   
                    let vm = this;
                    token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    axios.post('insert', 
                        {
                            name: vm.name,
                            slug: vm.slug,
                            category: vm.category,
                            tag: vm.tag,
                            banner: vm.banner,
                            body: vm.body,
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
                                vm.name = '';
                                vm.slug = '';
                                vm.category = '';
                                vm.tag = '';
                                vm.banner = '';
                                vm.body = '';

                                alert(_response.data.responseText);
                                return false;
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