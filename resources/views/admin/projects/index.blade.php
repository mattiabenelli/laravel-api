@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between py-4">
        <div>Progetti recenti</div>
        <div>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Aggiungi nuovo progetto</a>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>id</th>
            <th>titolo</th>
            <th>content</th>
            <th>slug</th>
            <th>azioni</th>
        </thead>
        <tbody>
            @foreach ($projects as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-square btn-primary" href="{{ route('admin.projects.show', $item->slug)}}" title="Visualizza progetto">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-square btn-warning" href="{{ route('admin.projects.edit', $item->slug)}}" title="Modifica progetto">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $item->slug)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-square btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection