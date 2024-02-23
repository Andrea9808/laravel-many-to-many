@extends('layouts.main-layout')
@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <ul>
        @foreach ($types as $type)
            <div class="project-container">
                <h1 class="project-title">Type project</h1>
                <span class="type-details">{{$type->name}} - {{$type->date}}</span>

                <h1 class="project-title">Description:</h1>
                @foreach ($type->projects as $project)
                    <p class="project-description">{{$project->description}}</p>
                @endforeach
            </div>
        @endforeach
    </ul>
@endsection
