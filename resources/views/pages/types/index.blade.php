@extends('layouts.main-layout')
@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <ul>
        @foreach ($types as $type)
            <div class="project-container">
                <h1>Type project</h1>
                <span class="type-details">{{$type->name}} - {{$type->date}}</span>

                @foreach ($type->projects as $project)
                    <p class="text-white">Project name:{{$project->name}}</p>
                    <p class="text-white">Description: {{$project->description}}</p>
                @endforeach
            </div>
        @endforeach
    </ul>
@endsection
