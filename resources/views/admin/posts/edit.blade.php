@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h1>Modifica il post {{ $post->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label class="form-label" for="title">Titolo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
    @error('title')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="start_date">Data di inizio</label>
    <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('start_date', $post->start_date) }}" required>
    @error('start_date')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="end_date">Data di fine</label>
    <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('end_date', $post->end_date) }}" required>
    @error('end_date')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="form-label" for="collaborators">Collaboratori:</label>
    <input class="form-control" type="text" name="collaborators" id="collaborators" value="{{ old('collaborators', $post->collaborators) }}">
    @error('collaborators')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <label class="formlabel" for="argument">Argomento</label>
    <textarea cols="30" rows="6" class="form-control" name="argument" id="argument" required>{{ old('argument', $post->argument) }}</textarea>
    @error('argument')
        <div class="alert alert-danger error">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary mt-3">Salva</button>
</form>
</div>
@endsection