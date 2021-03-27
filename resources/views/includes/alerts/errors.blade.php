@if(Session::has('error'))
    
    <div class="alert alert-danger">
        <strong>Danger!</strong>{{Session::get('error')}}
      </div>
    
@endif
