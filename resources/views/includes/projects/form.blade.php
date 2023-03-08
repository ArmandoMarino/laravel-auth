

@if($project->exsists)
<form method="POST" action=" {{route('admin.projects.update')}}" class="mt-4">
@method('PUT')
@else
<form method="POST" action=" {{route('admin.projects.store')}}" class="mt-4">
@endif
    
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" value="{{$project->title}}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Add image</label>
                <input name="image" type="url" class="form-control" id="image" value="{{$project->image}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="col-md-12">
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"value="{{$project->description}}"></textarea>
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