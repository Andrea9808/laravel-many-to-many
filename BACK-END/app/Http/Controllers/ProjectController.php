<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project :: all();
        return view('pages.index', compact('projects'));
    }

    public function show($id){
        $projects = Project :: find($id);

        return view('pages.show', compact('projects'));
    }


    public function create(){

        $technologies = Technology::all();
        $types = Type::all();
        return view('pages.create', compact('types','technologies'));
    }

    public function store(Request $request){
        $data = $request->all();

        $img = $data['image'];
        $image_path = Storage :: disk('public') -> put('images', $img);


        $project = new Project();
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->date = $data['date'];
        $project->image = $image_path;

        $type = Type::find($data['type_id']);
        $project->type()->associate($type);



        // Generato prima il type_id
        $project->save();


        //le relazioni many to many dopo il save
        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('project.index');
    }

    public function edit($id){

        $projects = Project::find($id);
        $technologies = Technology::all();
        $types = Type::all();

        return view('pages.edit', compact('projects','technologies', 'types'));
    }


    public function update(Request $request, $id){
        $data = $request->all();



        $project = Project::find($id);
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->date = $data['date'];


        $type = Type::find($data['type_id']);
        $project->type()->associate($type);

        $img = $data['image'];
        $image_path = Storage :: disk('public') -> put('images', $img);
        $project->image = $image_path;

        // Generato prima il type_id
        $project->save();


       //le relazioni many to many dopo il save
       $project->technologies()->sync($data['technology_id']);

        return redirect()->route('project.show', $project ->id);
    }

    public function delete($id){

        $project = Project :: find($id);
        $project->technologies()->sync([]);
        $project->delete();

        return redirect()->route('project.index');

    }

}


