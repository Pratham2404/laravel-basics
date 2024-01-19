<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Todo;

class TaskController extends Controller
{
    public function getAllTasks(){
        try{
            return Todo::all();
        } catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function getTaskById($id){
        // dd($id);
        // Log::info($id);
        try{
        if($id==NULL) return "Please provide ID";
          $data = Todo::find($id);
        //   dd($todo->title);
            if($data==NULL) return "ID doesn't exist";
            return $data;
        } catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function addTask(Request $request){
        try{
        $task =  new Todo;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->save();
        return "Task added successfully";
        } catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function updateTask(Request $request,$id){
        try{
            $data = Todo::find($id);
            if($data==NULL) return "ID doesn't exist to update";
            $data->title = $request->title;
            $data->content = $request->content;
            $data->save();
            return "Task has been successfully updated"; 
        } catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function deleteTask($id){
        try{
            $data = Todo::find($id);
            if($data==NULL) return "ID doesn't exist";
            $data->delete();
            return "Task has been successfully deleted.";
        }catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function restoreTask($id){
        try{
            $data = Todo::withTrashed()->find($id);
            $data->restore();
            return "Task restored successfully.";

        }catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

    public function startendTask($task,$id){
        try{
            // dd($task);
            $data = Todo::find($id);
            if($data==NULL) return "ID doesn't exist";

            if($task =='startTask'){
            if($data->currStatus == 'In Progress') return "Task has been already started";
            // dd($data->currStatus);
            if($data->currStatus == 'Completed') return "Task has been already ended.Do you want to start again?";
            $data->startTime = now();
            $data->currStatus = 'In Progress';
            $data->save();
            return "Your task has been started successfully.";
        }
          if($task=='endTask'){
            if($data->currStatus == 'Not Completed') return "Task is not started";
            if($data->currStatus == 'Completed') return "Task has been already ended.";
            $data->endTime = now();
            $data->currStatus = 'Completed';
            $data->save();
            return "Your task has been ended successfully.";
          }

        }catch (\Exception $e) {
            return $e -> getMessage();
        }
    }

}
