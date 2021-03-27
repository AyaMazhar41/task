<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@include('includes.alerts.success')
@include('includes.alerts.errors')
<form class="form" action="{{route('tasks.store')}}" method="POST" style="margin-top: 100px">
@csrf

  <div class="form-group row" >

    <label for="example-text-input" class="col-2 col-form-label">name</label>
    <div class="col-10">
      <input class="form-control" type="text" name="name" id="example-text-input">
    </div>
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group row" >
   <label for="example-text-input" class="col-2 col-form-label">status</label>
   <div class="col-10">
    <select class="form-control" id="exampleFormControlSelect1" name="status">
       
       
            <option
                value="todo">{{'todo'}}
            </option>
        </select>
         
  
</div>
@error('status')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">project name</label>
    <div class="col-10">
    <select class="form-control" id="exampleFormControlSelect1" name="project_id">
            @if($projects&& $projects -> count() > 0)
            @foreach($projects as $project)
                <option
                    value="{{$project -> id }}">{{$project -> name}}</option>
            @endforeach

        @endif
    </div>
    </select>
    @error('project_id')
     <span class="text-danger">{{$message}}</span>
     @enderror
  </div>



      
 
  
<button type="submit" class="btn btn-success btn-block" style="margin-top: 20px">save</button>

</form>