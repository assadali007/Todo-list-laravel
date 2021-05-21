<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Facade\Ignition\Tabs\Tab;

class Main extends Controller
{
    //===================================================================  get Available tasks
    public function home()
    {


       $data = Task::all();

       // $data = Task::where('visible',1)->get();
       $data = Task::orderBy('id','desc')->get();

        return view('home',['newdata'=>$data]);
    }
    //==============================================================  show new task form in the view

    public function new_task()
    {
        return view('new_task_form');
    }

    //========================================================================== insert data into database

    public function new_task_submit(Request $request)
    {

        //get the new task definition
      $data = $request->input('text_new_task');
      //save task into the database
     $task = new Task;
     $task->task= $data;
     $task->visible= 0;
     $task->save();

     //return to the main page

     return redirect()->route('home');


    }
    // ====================================================== update the task done
    public function task_done($id)
    {

       $task = Task::find($id);
       $task->done = new \DateTime();
       $task->save();
       return redirect()->route('home');

    }
    # ==================================================================== update the task undone
    public function task_undone($id)
    {

       $task = Task::find($id);
       $task->done = null;
       $task->save();
       return redirect()->route('home');

    }
    # ==================================================================== display update task form
    public function update_task($id)
    {
        //get selected task
        $task = Task::find($id);

        //display the update task form
        return view('update_task_form',['newdata'=>$task]);

    }
    #==============================================================================update data into database
     public function update_task_submit(Request $request)
     {
         //get form inputs
         $id_task = $request->input('id_task');
         $edit_task = $request->input('text_update_task');
         //update task
         $task = Task::find($id_task);
         //find the column in the database
         $task->task= $edit_task;
         $task->save();

         //display tasks table

         return redirect()->route('home');

     }
     // ==========================================================
     public function task_visible($id)
     {
         //make task unvisible
         $task = Task::find($id);
         $task->visible = 0;
         $task->save();

         return redirect()->route('home');

     }
     public function task_unvisible($id)
     {
         //make task visible
         $task = Task::find($id);
         $task->visible = 1;
         $task->save();

         return redirect()->route('home');

     }
     // ===================================================
     public function list_invisibles()
     {
         //get invisibles tasks
         $data = Task ::where('visible',0)
                        ->orderBy('id','desc')
                        ->get();

        return view('home',['newdata'=>$data]);
     }
     // ==============================================
     public function list_visibles()
     {
         //get visibles tasks
         $data = Task ::where('visible',1)
                        ->orderBy('id','desc')
                        ->get();

        return view('home',['newdata'=>$data]);
     }
}
