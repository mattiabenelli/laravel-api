@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12">
            <h2 class="py-3">Modifica il progetto</h2>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12 py-3">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group my-3">
                    <label class="control-label">Titolo</label>
                    <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ old('title') ?? $project->title }}">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Copertina</label>
                    <div>
                    <img src="{{asset('storage/' .$project->cover_image)}}" class="w-50">
                    </div>
                    <input type="file" name="cover_image" id="cover_image" class="form-control
                    @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                    <div class="text-danger">
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Tecnologie</label>
                    @foreach ($technologies as $technology)
                        <div>
                            @if ($errors->any())
                                <input type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $technology->name }}</label>
                            @else
                            <input type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology) ? 'checked' : ''  }}>
                            <label class="form-check-label">{{ $technology->name }}</label>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Tipo</label>
                    <select class="form-control" name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Contenuto</label>
                    <textarea type="text" class="form-control" placeholder="Contenuto" id="content" name="content">{{ old('content') ?? $project->content }}</textarea>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-sm btn-success">Modifica progetto</button>
                </div>
            </form>
        </div>
    </div>
@endsection