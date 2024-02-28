@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
<h1 class="text-white">Project</h1>
    <div class="container">
        <div class="card">
            <h1>Name Project: {{$projects->name}}</h1>
            <h2>DESCRIPTION:{{$projects->description}}</h2>
            <h3 class="type-title">Technology:</h3>
            @foreach ($projects->technologies as $technology)
                   <h5>{{$technology->name}}</h5>
             @endforeach
             <h3 class="type-title">Type Project</h3>
             <h6 class="type-name">TYPE NAME:{{$projects->type->name}}</h6>
             <h6 class="type-date">DATE:{{$projects->date}}</h6>
             @if ($projects->image)
                <img src="{{asset('storage/'.$projects -> image) }}" alt="img project">
             @endif
        </div>
    </div>



    <style>
        body {
            background-color: rgb(150, 20, 150)
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .type-title {
            margin-top: 15px;
        }

        .type-name, .type-date {
            margin-bottom: 10px;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
@endsection

