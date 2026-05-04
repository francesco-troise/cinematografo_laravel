@extends('layouts.app')

@section('title', 'Modifica: ' . $genre->name)

@section('content')
    <div class="container py-4">
        <a href="{{ route('genres.index') }}" class="text-info text-decoration-none small mb-3 d-inline-block">
            ← Torna ai generi
        </a>

        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <img src="{{ Storage::url($genre->url_image) }}"
                        class="rounded-circle shadow-lg border border-3 border-info"
                        style="width: 150px; height: 150px; object-fit: cover;" alt="Genere">
                </div>
                <h4 class="text-dark fw-bold">{{ $genre->name }}</h4>
                //
                <span class="badge-xl  text-dark">immagine attuale </span>
            </div>

            <div class="col-md-9">
                <div class="p-4 rounded-4 shadow" style="background-color: #1a1d20;">
                    <form action="{{ route('genres.update', $genre) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="text-info small fw-bold text-uppercase">Titolo del Genere</label>
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg text-white border-info border-0 border-bottom rounded-0"
                                value="{{ old('name', $genre->name) }}"
                                style="background-color: #2b3035 !important; border-bottom-width: 2px !important;">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="text-info small fw-bold text-uppercase">
                                Descrizone
                            </label>
                            <textarea name="description" id="description" rows="3" class="form-control text-white border-secondary rounded-3"
                                style="background-color: #2b3035 !important;">{{ old('description', $genre->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="url_image" class="text-info small fw-bold text-uppercase">Cambia la cover</label>
                            <input type="file" name="url_image" id="url_image"
                                class="form-control form-control-sm text-white border-secondary"
                                style="background-color: #2b3035 !important;">
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <button type="submit" class="btn btn-info px-5 fw-bold rounded-pill shadow text-dark">
                                Aggiorna Genere
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
