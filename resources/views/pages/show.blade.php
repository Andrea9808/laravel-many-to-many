@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
<h1>Project</h1>
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
        </div>
    </div>
@endsection
