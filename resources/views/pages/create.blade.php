@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <div class="container form_">
        <h1 class="text-center">New Project</h1>
        <form action="{{ route('project.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group">
                <label for="technology_id">Technology:</label><br>
                {{-- <select name="technology_id" id="technology_id" class="form-control">
                    @foreach ($technologies as $technology)
                        <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                    @endforeach
                </select> --}}
                @foreach ($technologies as $technology)

                    <div>
                        <label for="{{"technology-" . $technology->id}}">
                            {{$technology->name}}
                        </label>
                        <input type="checkbox" name="technology_id[]"
                        value="{{$technology->id}}"
                        id="{{'technology-' . $technology->id}}">

                    </div>

                @endforeach
            </div>

            <div class="form-group">
                <label for="type_id">Type:</label>
                <select name="type_id" id="type_id" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">CREATE</button>
        </form>
    </div>
@endsection
