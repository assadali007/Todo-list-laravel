@extends('main_layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>TODO LIST</h3>
            <hr>
            <div class="my-2">
                <a href="{{route('new_task')}}" class="btn btn-info btn-lg">Create New task</a>
                <a href="{{route('list_invisibles')}}" class="btn btn-info btn-lg">list invisible task</a>
                <a href="{{route('list_visibles')}}" class="btn btn-info btn-lg">list visible task</a>


            </div>
            <hr>
            @if ($newdata->count()=== 0)
              <p>no task existence</p>

            @else
               <table  class="table">
                  <thead class="table-dark">
                      <tr>
                          <th>Task</th>
                          <th>done/Undone</th>
                          <th>Update Task</th>
                          <th>visible/unvisible</th>
                      </tr>
                  </thead>
                  <tbody>
                   @foreach ($newdata as $value )
                   <tr>
                       <td style="width: 40%">{{$value->task}} </td>
                       <td>
                         {{-- done/not done --}}
                        @if ($value->done == null)
                      <a href="{{route('task_done',['id'=> $value->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-undo"></i></a>
                       @else
                       <a href="{{route('task_undone',['id'=> $value->id])}}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                       @endif
                       </td>
                       <td>
                       {{-- Editor --}}
                     <a href="{{route('update_task_form',['id'=> $value->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                       </td>
                       <td>
                     {{--visible/invisible --}}
                       @if ($value->visible ===1)
                       <a href="{{route('task_visible',['id'=> $value->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                     @else
                     <a href="{{route('task_unvisible',['id'=> $value->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-eye-slash"></i></a>

                     @endif
                       </td>

                   </tr>
                   @endforeach
                  </tbody>
               </table>
             <p>Total : <strong>{{$value->count()}}</strong></p>

            @endif
        </div>
    </div>
</div>
@endsection
