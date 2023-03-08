{{-- IF EXIST in create (model)update else store --}}
@if($project->exists)
<form method="POST" action=" {{route('admin.projects.update', $project->id)}}" class="mt-4">
@method('PUT')
@else
<form method="POST" action=" {{route('admin.projects.store')}}" class="mt-4">
@endif
    
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input placeholder="Insert Title here..." name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $project->title)}}" minlength="5" maxlength="50" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Add image</label>
                <input placeholder="Insert URL image here..." name="image" type="url" class="form-control @error('image') is-invalid @enderror" id="image" value="{{old('image', $project->image)}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="col-md-12">
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea placeholder="Insert description here..." name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"> {{old('description',$project->description)}}</textarea>
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