@extends('admin.master')

<!--Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-control'])!!}-->

@section('content')

<hr/>
<div class="row">
    <div class="col-lg-12">
        <h3 style="text-align: center"><?php //echo $message; ?></h3>
        <hr/>
        <div class="well">
            
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Blog Title </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="blog_title">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Author Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="author_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Blog Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="blog_description" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Blog Image </label>
                    <div class="col-sm-10">
                        <input type="file" name="blog_image" accept="image/*"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Publication Status </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publication_status">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Blog Information</button>
                    </div>
                </div>
               
           </form>
                
        </div>
    </div>
    
</div>

@endsection