{{-- IF EXIST in create (model)update else store --}}
{{-- novalidate FOR CONTROL with CONTROLLER --}}
@if($project->exists)
<form method="POST" action=" {{route('admin.projects.update', $project->id)}}" class="mt-4" novalidate>
@method('PUT')
@else
<form method="POST" action=" {{route('admin.projects.store')}}" class="mt-4" novalidate>
@endif
    
    @csrf
    <div class="row">
        {{-- TITLE --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input placeholder="Insert Title here..." name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $project->title)}}" minlength="5" maxlength="50" required>
            </div>
        </div>

        {{-- SLUG --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="slug" class="form-label">Slug's Title</label>
                <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('title', $project->title),'-')}}" disabled>
            </div>
        </div>

        {{-- IMAGE --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Add image</label>
                <input placeholder="Insert URL image here..." name="image" type="url" class="form-control @error('image') is-invalid @enderror" id="image" value="{{old('image', $project->image)}}" required>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- DESCRIPTION --}}
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


@section('scripts')
<script>
// Prendiamo gli input dal form
const slugInput = document.getElementById('slug');
const titleInput = document.getElementById('title');

// Metto un event listener sul title con il Blur ovvero dopo aver tolto il focus dal title si renderizza
titleInput.addEventListener('blur',() => {
    slugInput.value = titleInput.value.toLowerCase().split(' ').join('-');
});
</script>
@endsection