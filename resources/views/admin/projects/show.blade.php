@extends('layouts.app')

@section('title', $project->title)

@section('content')

<header>
    <h1>{{ $project->title }}</h1>
</header>
<div class="clearfix">
    @if($project->image)
    <img class="float-start" src="{{$project->image}}" alt="{{$project->slug}}">
    @endif
    <p>{{ $project->description }}</p>
    <div class="d-flex justify-content-between" >
        <div>
            <p>Creato il : <time>{{$project->created_at}} </time></p>
            <p>Aggiornato il : <time>{{$project->updated_at}} </time></p>
        </div>
    </div>

    {{-- BOTTON TO PROJECTS INDEX --}}
    <div class="d-flex justify-content-end" >
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">
            <i class="me-2 fa-solid fa-left-long"></i> Back
        </a>
    </div>
</div>

@endsection