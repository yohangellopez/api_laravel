<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{


    public function register(Request $request){
        //validar 
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tasks',
            'description' => 'required'
        ]);

        if($validator->fails()){
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'The task has not been created',
                'error' => $validator->errors()
            );
        }else{
            $task = Task::create($request->all());
            $data = array(
                'status' => 'success',
                'task'   => $task,
                'code'   => 200,
                'message'=> 'The task has been successfully created'
            );
        };
            
        return response()->json($data);
    }

    public function showlist($filtro = 0){
        if($filtro == '0'){
            $tasks = Task::all();
        }else{
            if ($filtro == '1'){
                $tasks = Task::where('completed',true)->get();
            }else{
                if($filtro != '0' || $filtro!='1'){
                    $tasks= Task::where('name','LIKE','%'.$filtro.'%')->get(); 
                }     
            }
        } 
        return response()->json($tasks);
    }

    public function show($id){
        try{
            $task = Task::findOrFail($id);
            $data =array (
                'status' =>'success',
                'code'   =>200,
                'task'   =>$task,
                'message'=>'The task has been found correctly'
            );
        }
        catch(ModelNotFoundException $e){
            $data = array (
                'status' =>'error',
                'code'   =>200,
                'message'=>'The task has not been found'
            );
        }
        return response()->json($data);
    }

    public function update(Request $request, $id){

         //verificamos que la task exista en la base de datos
         $taskFound= Task::where('id',$id)->first();

        if ($taskFound){
            $taskFound->name        =$request->name;
            $taskFound->description =$request->description;
            $taskFound->save();
            $data = array(
                'status' => 'success',
                'task'   => $taskFound,
                'code' => 200,
                'message' => 'The task has been successfully updated'
            );
        }else{
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'The task has not been updated'
            ); 
        }
        return response()->json($data);
    }

    public function destroy($id){
        //verificamos que la task exista en la base de datos
        $task= task::where('id',$id)->first();

        //Si detecta una tarea la elimina, del contrario lanza un error
        if ($task){
           $task->delete();
           $data = array(
               'status' => 'success',
               'code' => 200,
               'message' => 'The task has been successfully removed'
           );
        }
        else{
           $data = array(
               'status' => 'error',
               'code' => 404,
               'message' => 'The task has not been removed'
           ); 
        }
       return response()->json($data);
    }

    public function modifyStatus($id){
        //verificamos que la task exista en la base de datos
        $taskFound= task::where('id',$id)->first();

        //Si detecta una tarea la elimina, del contrario lanza un error
        if ($taskFound){
            $taskFound->completed=1;
            $taskFound->save();
            $data = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'The task has been modified'
            );
        }
        else{
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'The task has not been modified'
            ); 
        }
        return response()->json($data);
    }

}
