<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<a href="{{route('projects.create')}}" 
>
<button type="submit" class="btn btn-warning btn-block" style="margin-top: 50px">create project</button>


</a>
<table class="table table-dark" style="margin-top:50px">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">createdBy</th>
      <th scope="col">Start-at</th>
      <th scope="col">End-at</th>
      <th scope="col">Done</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php $x = 0; ?>
    @foreach ($projects as $project)
        <?php $x++; ?>
    <tr>
      <th scope="row">{{ $x }} </th>
      <td>{{ $project->name }}</td>
      <td>{{ $project->creator }}</td>
      <td>{{\Carbon\Carbon::parse($project->start_at)->format('d/m/y')}}
      <td>{{\Carbon\Carbon::parse($project->end_at)->format('d/m/y')}}
     
      <td>{{$project->getTotalPercentage()}}%</td>
      <td> 
       
         
        <a href="{{route('projects.edit',$project->id)}}"
          class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
          edit
        </a>
        <a href="{{route('projects_destroy',$project->id)}}"
        class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
        delete
      </a>
      
     </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

