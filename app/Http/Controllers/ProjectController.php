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
        $data = $request->all();

        $project = new Project();
        $project->name = $data['name'];
        $project->description = $data['description'];


        $type = Type::find($data['type_id']);
        $project->type()->associate($type);

        $project->save();

        $technology = Technology::find($data['technology_id']);
        $project->technologies()->attach($technology);

        return redirect()->route('project.index');
    }
}
