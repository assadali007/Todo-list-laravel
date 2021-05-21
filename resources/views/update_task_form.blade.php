@extends('main_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>TODO LIST</h3>
            <hr>
             <h3 class="text-center mb-5">Update TASK</h3>
              <form action="{{route('update_task_submit')}}" method="POST">
                @csrf
                <input type="hidden" name="id_task" id="id_task" value="{{$newdata->id}}">
                  <div class="row">
                  <div class="col-sm-4 offset-sm-4">
                      <div class="form-group">
                          <label for="text_update_task">Text</label>
                          <input id="text_update_task" class="form-control" type="text" name="text_update_task" value="{{$newdata->task}}">
                      </div>
                      <div class="form-group">
                          <br>
                          <input type="submit" value="submit" class="btn btn-success ">
                          <a href="{{route('home')}}" class="btn btn-primary">Cancel</a>
                      </div>
                      </div>

                  </div>
                  </div>
              </form>

    </div>
</div>
</div>
@endsection
