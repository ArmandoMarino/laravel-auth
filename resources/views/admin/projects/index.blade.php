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
        <th></th>
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
            <td class="d-flex">
                {{-- ROUTE TO SHOW --}}
                <a class="btn btn-small btn-primary" href="{{route('admin.projects.show', $project->id)}}">
                    <i class="fa-solid fa-eye"></i>
                </a>

                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete-form" data-entity='Project'>
                  {{-- Method DELETE --}}
                  @method('DELETE')
                  {{-- TOKEN --}}
                  @csrf
                  <button type="submit" class="btn btn-small btn-danger" >
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
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

