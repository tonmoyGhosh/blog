@extends('layouts.app')

@section('style')
<style>
.trash { color:rgb(209, 91, 71); }
.flag { color:rgb(248, 148, 6); }
.panel-body { padding:0px; }
.panel-footer .pagination { margin: 0; }
.panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
.panel-body .radio, .checkbox { display:inline-block;margin:0px; }
.panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
.list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
.list-group { margin-bottom:0px; }
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] { margin-left:0px; }
</style>
@stop


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
                    <input type="text" name="name" class="form-control" id="name" placeholder="Blog Name">
                    <p id="nameMsg" style="max-height:3px;"></p>
                </div>

                <label class="col-sm-3 control-label">Slug:*</label>
                <div class="col-sm-9">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Blog Slug">
                    <p id="slugMsg" style="max-height:3px;"></p>
                </div>

                <label class="col-sm-3 control-label">Category:</label>
                <div class="col-sm-9">
                    <input type="text" name="category" class="form-control" id="slug" placeholder="Blog Category">
                    <p id="categoryMsg" style="max-height:3px;"></p>
                </div>

                <label class="col-sm-3 control-label">Tag:</label>
                <div class="col-sm-9">
                    <input type="text" name="tag" class="form-control" id="slug" placeholder="Blog Tag">
                    <p id="tagMsg" style="max-height:3px;"></p>
                </div>

                <label class="col-sm-3 control-label">Body:</label>
                <div class="col-sm-9">
                    <textarea type="text" name="body" class="form-control ckeditor" id="body" placeholder="Blog Body"></textarea>
                    <p id="bodyMsg" style="max-height:3px;"></p>
                </div>

            </div>

            <input type="text" class="form-control" placeholder="Add Todo List" v-model="todoValue" v-on:keyup.enter="setTodoList">
            
            
        
        </div>
    
    </div>
    
@stop

@section('script')

    <script src="https://unpkg.com/vue@2.6.11/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>

        $(document).ready(function() 
        {
           $('.ckeditor').ckeditor();
        });

    </script>

@stop