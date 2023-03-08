@extends('layouts.app')

@section('title', 'Make new Project')

@section('content')
<h1 class="mt-3">Make new Project</h1>
<form method="POST" action=" {{route('admin.projects.store')}}" class="mt-4">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Add image</label>
                <input name="image" type="url" class="form-control" id="image" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="col-md-12">
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>
            </div>  
        </div>
    </div>

    <div>
        {{-- BUTTON UPDATE --}}
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i>
            Save
        </button>
        {{-- LINK TO INDEX --}}
        <a href="{{route('admin.projects.index')}}" class="btn btn-small btn-secondary">
            <i class="fa-solid fa-left-long"></i>
            Back
        </a>
    </div>
</form>




@endsection