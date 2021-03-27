<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@include('includes.alerts.success')
@include('includes.alerts.errors')
<form class="form" action="{{route('projects.store')}}" method="POST" style="margin-top: 100px">
@csrf

  <div class="form-group row" >

    <label for="example-text-input" class="col-2 col-form-label"  >name</label>
    <div class="col-10">
      <input class="form-control" type="text" name="name" id="example-text-input">
    </div>
    @error('name')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group row" >
  <label for="example-text-input" class="col-2 col-form-label">creator</label>
  <div class="col-10">
    <input class="form-control" type="text" name="creator" id="example-text-input">
  </div>
  @error('creator')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>


  <div class="form-group row">
    <label for="example-date-input" class="col-2 col-form-label">started at </label>
    <div class="col-10">
      <input class="form-control" type="date" name="start_at" id="example-date-input">
    </div>
  </div>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">ended at </label>
        <div class="col-10">
          <input class="form-control" type="date" name="end_at" id="example-date-input">
        </div>
     </div>
 
  
<button type="submit" class="btn btn-success btn-block">save</button>

</form>