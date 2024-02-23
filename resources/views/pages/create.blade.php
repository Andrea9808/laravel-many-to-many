@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1 class="text-center">New Project</h1>
    <form action="{{route('project.store')}}">

        @csrf
        @method('POST')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description">
        </div>
        <div>
            <label for="technology">Technology:</label>
            <input type="text" name="technology" id="technology">
        </div>
        <div>
            <label for="project">Type:</label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
        </div>
        <button type="submit" value="CREATE" class="btn btn-primary">CREATE</button>
    </form>
@endsection
