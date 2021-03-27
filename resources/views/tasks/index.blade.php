<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<a href="{{route('tasks.create')}}" 
>
<button type="submit" class="btn btn-warning btn-block" style="margin-top: 50px">create task</button>


</a>
<table class="table table-dark" style="margin-top:50px">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Project Name</th>
      <th scope="col">change status</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php $x = 0; ?>
    @foreach ($tasks as $task)
        <?php $x++; ?>
    <tr>
      <th scope="row">{{ $x }} </th>
      <td>{{ $task->name }}</td>
      <td>{{$task->status}}</td>
      <td>{{$task->project->name}}</td>
      <td> 
       
         
          <a href="{{route('tasks.status', $task->id)}}"
            class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
            End
          </a>

        
        
       </td>

       <td> 
       
         
        <a href="{{route('tasks.edit', $task->id)}}"
          class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
         edit
        </a>
        <a href="{{route('tasks_destroy', $task->id)}}"
          class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
        delete
        </a>
        
     </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

