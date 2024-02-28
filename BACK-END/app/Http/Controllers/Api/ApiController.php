<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class ApiController extends Controller
{

    //PROVA
    // public function getTest(){
    //     return response()->json([
    //         'status'=>'success',
    //         'message'=>'This is a test message'
    //     ]);
    // }

    public function getTechnologies(){
        $technologies = Technology::all();

        return response()->json([
            'status'=>'success',
            'technologies'=>$technologies
        ]);
    }

    public function createTechnologies(){
        $data = $request->all();

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
