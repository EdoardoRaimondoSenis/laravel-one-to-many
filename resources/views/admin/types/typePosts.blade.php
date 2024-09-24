@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Elenco Categorie</h1>
        
        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong> è stato eliminato correttamente.
            </div>
        @endif

        @foreach ($types as $type)
        <h2 class="badge text-bg-success mb-3 mt-3">{{ $type->name }}</h2>
            <ul class="list-group">
                @foreach ($type->posts as $post)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $post->title }}</span>
                        <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-warning">Vedi</a>
                        </li>
                @endforeach
            </ul>
            {{-- <td>
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Dettagli</a>
                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-secondary">Modifica</a>
                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Elimina" class="btn btn-danger">
                </form>
            </td> --}}
        @endforeach
    </div>
@endsection