@extends('layouts.app')

@section('title', 'Modifica Persona')

@section('content')
    <div class="container py-5">

        <div class="mb-4">
            <a href="{{ route('people.index') }}" class="btn btn-outline-secondary btn-sm shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>Torna ad attori e registi
            </a>
        </div>

        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="mb-3">
                        <img src="{{ Storage::url($person->url_image) }}"
                            class="rounded-circle shadow-lg border border-4 border-primary"
                            style="width: 200px; height: 200px; object-fit: cover;" alt="{{ $person->name }}">
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary p-2 px-3 rounded-pill border">
                        <i class="bi bi-image me-1"></i> Foto attuale
                    </span>
                    <h3 class="mt-3 fw-bold text-primary">{{ $person->name }} {{ $person->last_name }}</h3>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="bi bi-person-gear me-2"></i>Modifica Informazioni persona
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('people.update', $person) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nome"
                                    value="{{ old('name', $person->name) }}">
                                <label for="name">Nome persona</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    placeholder="Cognome" value="{{ old('last_name', $person->last_name) }}">
                                <label for="last_name">Cognome persona</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label small fw-bold text-muted">Genere</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="M"
                                            {{ old('gender', $person->gender) == 'M' ? 'selected' : '' }}>Uomo</option>
                                        <option value="F"
                                            {{ old('gender', $person->gender) == 'F' ? 'selected' : '' }}>Donna</option>
                                        <option value="O"
                                            {{ old('gender', $person->gender) == 'O' ? 'selected' : '' }}>Altro</option>
                                        <option value="U"
                                            {{ old('gender', $person->gender) == 'U' ? 'selected' : '' }}>Sconosciuto
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label small fw-bold text-muted">Data di
                                        nascita</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                        value="{{ $person->date_of_birth }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nationality" class="form-label small fw-bold text-muted">Nazionalità</label>
                                <select name="nationality" id="nationality" class="form-select">
                                    <option value="">Scegli nazione</option>
                                    @foreach ($nationalities as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('nationality', $person->nationality) == $id ? 'selected' : '' }}>
                                            {{ $id }} ({{ $name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="url_image" class="form-label small fw-bold text-muted">Sostituisci foto
                                    profilo</label>
                                <input type="file" name="url_image" id="url_image" class="form-control">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm fw-bold">
                                    <i class="bi bi-check-circle me-2"></i>Salva Modifiche
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
