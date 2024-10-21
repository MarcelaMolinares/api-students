<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
        public function index(){
          return Student::all();
        }

        public function show($id){
            return  Student::findOrFail($id);
        }

        public function store(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'max:255',
                'email' => 'email|unique:students',
                'phone' => 'digits:10',
                'language' => 'in:English,Spanish,French',
            ]);

            if ($validator->fails()) {
                return response()->json(["errors" => $validator->errors()], 400);
            }

            Student::create($request->all());
            return response()->json(["message" => "Se ha creado el estudiante exitosamente"]);
        }

        public function update(Request $request,$id) {
            $validator = Validator::make($request->all(), [
                'name' => 'max:255',
                'email' => 'email|unique:students',
                'phone' => 'digits:10',
                'language' => 'in:English,Spanish,French',
            ]);

            if ($validator->fails()) {
                return response()->json(["errors" => $validator->errors()], 400);
            }

            Student::findOrFail($id)->update($request->all());
            return response()->json(["message" => "Se ha actualizado el estudiante exitosamente"]);
        }

        public function destroy($id) {
            Student::findOrFail($id)->delete();
            return response()->json(["message" => "Se ha eliminado el estudiante exitosamente"]);
        }
           
        
       
}

