@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <div class="container form_">
        <h1 class="text-center">Edit your project</h1>
        <form action="{{ route('project.update', $projects->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$projects->name}}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{$projects->description}}">
            </div>

            <div class="form-group">
                <label for="technology_id">Technology:</label>
                <select name="technology_id" id="technology_id" class="form-control">
                    @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}"
                        @if ($technology->id == $projects->technologies->first()->id)
                            selected
                        @endif
                    >
                        {{ $technology->name }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_id">Type:</label>
                <select name="type_id" id="type_id" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"

                            @if ($type->id == $projects->type->id)
                            selected
                            @endif

                            >{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{$projects->date}}">
            </div>

            <button type="submit" class="btn btn-primary">EDIT</button>
        </form>
    </div>
@endsection