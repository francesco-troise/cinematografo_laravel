@extends('layouts.app')

@section('title', 'Aggiungi Persona')

@section('content')
    <div class="container py-5">

        <div class="mb-4">
            <a href="{{ route('people.index') }}" class="btn btn-outline-secondary btn-sm shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>Torna ad attori e registi
            </a>
        </div>

        <div class="row">


            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="card-title mb-0 fw-bold">
                            <i class="bi bi-person-gear me-2"></i>Aggiungi informazioni persona
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nome"
                                    value="">
                                <label for="name">Nome persona</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    placeholder="Cognome" value="">
                                <label for="last_name">Cognome persona</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label small fw-bold text-muted">Genere</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option value="M">Uomo</option>
                                        <option value="F">Donna</option>
                                        <option value="O">Altro</option>
                                        <option value="U">Sconosciuto
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label small fw-bold text-muted">Data di
                                        nascita</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                        value="">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nationality" class="form-label small fw-bold text-muted">Nazionalità</label>
                                <select name="nationality" id="nationality" class="form-select">
                                    <option value="">Scegli nazione</option>
                                    @foreach ($nationalities as $id => $name)
                                        <option value="{{ $id }}">
                                            {{ $id }} ({{ $name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="url_image" class="form-label small fw-bold text-muted">Aggiungi foto
                                    profilo</label>
                                <input type="file" name="url_image" id="url_image" class="form-control">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm fw-bold">
                                    <i class="bi bi-check-circle me-2"></i>Aggiungi!
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
