@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
<h1>Projects</h1>
<a href="{{route('project.create')}}"> <button type="button" class="btn btn-success">Create</button></a>
    <ul>
        @foreach ($projects as $project)
            <div class="project-container">
                <h1 class="project-title">Project:</h1>
                <li>
                    <h2>NAME:{{$project->name}}</h2>
                    <h2>DESCRIPTION:{{$project->description}}</h2>
                    <h2>TECHNOLOGY:
                        @foreach ($project->technologies as $technology)
                            {{$technology->name}}
                        @endforeach
                    </h2>
                </li>
                <div class="type-details">
                    <h3 class="type-title">Type Project</h3>
                    <h6 class="type-name">TYPE NAME:{{$project->type->name}}</h6>
                    <h6 class="type-date">DATE:{{$project->date}}</h6>
                </div>

                <a href="{{route('project.edit', $project->id)}}"> <button type="button" class="btn btn-success">Edit</button></a>
            </div>
        @endforeach
    </ul>
@endsection
