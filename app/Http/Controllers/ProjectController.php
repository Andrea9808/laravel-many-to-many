<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project :: all();
        return view('pages.index', compact('projects'));
    }


    public function create(){
        $technologies = Technology::all();
        $types = Type::all();
        return view('pages.create', compact('types','technologies'));
    }

    public function store(Request $request){

        $data = $request -> all();
        dd($data);
    }
}
