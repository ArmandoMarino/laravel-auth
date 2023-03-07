@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<header>
    <h1>Projects List</h1>
</header>

{{-- TABLE --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Creato il</th>
        <th scope="col">Aggiornato il</th>
      </tr>
    </thead>

    <tbody>
        @forelse($projects as $project)
        <tr>
            <th scope="row">{{$project->id }}</th>
            <td>{{$project->title }}</td>
            <td>{{$project->slug }}</td>
            <td>{{$project->created_at }}</td>
            <td>{{$project->updated_at }}</td>
            <td>
                <a class="btn btn-small btn-primary" href="{{route('admin.projects.show', $project->id)}}">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </td>
          </tr>
        @empty
        <tr>
            <td scope='row' colspan="5">Non ci sono Progetti</td>
        </tr>
        @endforelse
    
      
    </tbody>
  </table>
@endsection