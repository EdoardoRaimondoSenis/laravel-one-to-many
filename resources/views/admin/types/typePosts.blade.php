@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Elenco Categorie</h1>
        
        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong> è stato eliminato correttamente.
            </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Categorie</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><span class="badge text-bg-success">{{ $post->type->name }}</span></td>
                    <td>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-secondary">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il post?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Elimina" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection