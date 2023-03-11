@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <h1 class="my-4">{{ $project->title }}</h1>
                    <h2>Contenuto:</h2>
                    <img src="{{asset('storage/' .$project->cover_image)}}" alt="{{$project->title}}" class="w-50">
                    <h2>Categoria:</h2>
                    <p>{{ $project->type ?  $project->type->name : 'Senza categoria'}}</p>
                    <h2>Tecnologie utilizzate:</h2>
                        @forelse ($project->technologies as $item)
                            <div>{{ $item->name }}</div>
                            @empty
                            nessuna tecnologia associata al post

                        @endforelse
                    <h2>Contenuto:</h2>
                    <p>{{ $project->content }}</p>
                    <a href="{{ route('admin.projects.index') }}">Torna all'elenco</a>
                </div>
            </div>
            <div class="col-12">
            </div>
        </div>
    </div>
@endsection