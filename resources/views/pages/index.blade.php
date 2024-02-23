@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <ul>
        @foreach ($projects as $project)
            <div class="project-container">
                <h1 class="project-title">Project description</h1>
                <li>
                    <h2>{{$project->description}}</h2>
                </li>
                <div class="type-details">
                    <h3 class="type-title">Type Project</h3>
                    <h6 class="type-name">{{$project->type->name}}</h6>
                    <h6 class="type-date">{{$project->type->date}}</h6>
                </div>
                <p class="project-description">{{$project->description}}</p>
            </div>
        @endforeach
    </ul>
@endsection
