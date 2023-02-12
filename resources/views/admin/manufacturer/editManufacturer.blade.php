@extends('admin.master')

@section('content')

<hr/>
<div class="row">
    <div class="col-lg-12">
       
        <hr/>
        <div class="well">
            
           {!! Form::open(['url'=>'manufacturer/update','method'=>'POST','class'=>'form-horizontal','name'=>'editManufacturerForm'])!!}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Manufacturer Name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$manufacturerById->manufacturerName}}" class="form-control" name="manufacturerName">
                        <input type="hidden" value="{{$manufacturerById->id}}" class="form-control" name="id">
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Manufacturer Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="manufacturerDescription" rows="8">{{$manufacturerById->manufacturerDescription}}</textarea>
                    </div>
                </div>
                 
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Publication Status </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publicationStatus">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Manufacturer Info</button>
                    </div>
                </div>
               
         {!! Form::close()!!}
                
        </div>
    </div>
    
</div>

<script>
document.forms['editManufacturerForm'].elements['publicationStatus'].value={{$manufacturerById->publicationStatus}}
</script>

@endsection