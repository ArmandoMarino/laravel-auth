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

    <div class="d-flex justify-content-end" >
        {{-- BOTTON TO PROJECTS INDEX --}}
        <a class="btn btn-secondary me-2" href="{{route('admin.projects.index')}}">
            <i class="me-2 fa-solid fa-left-long"></i> Back
        </a>

        {{-- BOTTON TO PROJECTS EDIT --}}
        <a class="btn btn-warning me-2" href="{{route('admin.projects.edit', $project->id)}}">
            <i class="me-2 fa-solid fa-pencil"></i> Edit
        </a>

        <form action="{{route('admin.projects.destroy', $project->id)}}" class="delete-form" method="POST" data-entity='Project'>
            {{-- Method DELETE --}}
            @method('DELETE')
            {{-- TOKEN --}}
            @csrf
            <button type="submit" class="btn btn-small btn-danger" >
              <i class="fa-solid fa-trash me-2"></i> Delete Project
            </button>
          </form>
    </div>
</div>

@endsection

