<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Validator;

class ApiController extends Controller
{
    public function index(){
       $student = Student::all();

       if($student->count()> 0){
        return response()->json([
            'status'=> 200,
            'student' => $student

       ],200);
       }else{
        return response()->json([
            'status'=> 404,
            'message' => 'Data is not found'

       ],404);
       }


    }



    public function store(Request $request){

        $data = new Student;
        $data->name = $request->name;
        $data->class = $request->class;
        $data->roll = $request->roll;
        $data->reg = $request->reg;
        $data->save();

        return response()->json([
            'status'=> 5000,
            'message'=>'Data insert successfully',
            'data'=>$data
        ]);



    }
    public function show($id){

        $data = Student::find($id);
        if($data){
            return response()->json([
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'status'=>500,
                'message'=>'Data not found'
            ]);
        }

    }

    public function update(Request $request,$id){
        $data =Student::find($id);
        $data->name = $request->name;
        $data->class = $request->class;
        $data->roll = $request->roll;
        $data->reg = $request->reg;
        $data->save();

        return response()->json([
            'status'=> 5000,
            'message'=>'Data insert successfully',
            'data'=>$data
        ]);

    }

    public function delete($id){
        Student::find($id)->delete();
        return response()->json([
            'message'=> 'Data delete successfully'
        ]);
    }
}
