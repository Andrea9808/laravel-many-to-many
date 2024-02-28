@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
<h1>Projects</h1>
<div class="container">
    <a href="{{route('project.create')}}"> <button type="button" class="btn btn-success">Create</button></a>
        <ul>
            @foreach ($projects as $project)
                <div class="project-container">
                    <h1 class="project-title">Project:</h1>
                    <li>
                        <a href="{{route('project.show', $project ->id)}}"><h2>{{$project->name}}</h2></a>
                        {{-- <h2>DESCRIPTION:{{$project->description}}</h2>
                        <h2>TECHNOLOGY: --}}
                            {{-- @foreach ($project->technologies as $technology)
                                {{$technology->name}}
                            @endforeach --}}
                        </h2>
                    </li>
                    {{-- <div class="type-details">
                        <h3 class="type-title">Type Project</h3>
                        <h6 class="type-name">TYPE NAME:{{$project->type->name}}</h6>
                        <h6 class="type-date">DATE:{{$project->date}}</h6>
                    </div> --}}

                    <div class="d-flex justify-content-center">
                        <a href="{{route('project.edit', $project->id)}}"> <button type="button" class="btn btn-success">Edit</button></a>

                        <form action="{{ route('project.delete', $project ->id) }}" method="POST">

                            @csrf
                            @method("DELETE")

                            <button  type="submit" class="btn btn-danger ms-5">Delete</button>
                        </form>

                    </div>

                </div>
            @endforeach
        </ul>
</div>
@endsection
