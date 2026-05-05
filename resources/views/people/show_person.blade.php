@extends('layouts.app')

@section('title', $person->name . ' ' . $person->last_name)

@section('content')
    <div class="container py-5">
        <div class="mb-4">
            <a href="{{ route('people.index') }}" class="text-primary text-decoration-none fw-bold">
                <i class="bi bi-arrow-left me-1"></i> Torna ad attori e registi
            </a>
        </div>

        <div class="card bg-dark text-white border-0 shadow-lg overflow-hidden">
            <div class="row g-0">

                <div class="col-md-4 position-relative">
                    <img src="{{ Storage::url($person->url_image) }}" class="img-fluid h-100 object-fit-cover"
                        alt="{{ $person->name }}" style="min-height: 400px;">

                    <span class="position-absolute top-0 start-0 m-3 badge rounded-pill bg-primary shadow">
                        {{ $person->gender == 'M' ? 'Uomo' : 'Donna' }}
                    </span>
                </div>

                <div class="col-md-8 d-flex flex-column">
                    <div class="card-body p-4 p-lg-5">

                        <span class="text-primary fw-bold text-uppercase small tracking-widest">Profilo Professionale</span>
                        <h1 class="display-5 fw-bold mb-4">{{ $person->name }} {{ $person->last_name }}</h1>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="text-secondary mb-1 small text-uppercase">Data di Nascita</p>
                                <p class="fs-5"><i class="bi bi-calendar-event me-2"></i>{{ $person->date_of_birth }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-secondary mb-1 small text-uppercase">Nazionalità</p>
                                <p class="fs-5"><i class="bi bi-geo-alt me-2"></i>{{ $person->nationality }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-secondary mb-1 small text-uppercase">Ruolo</p>
                            <p class="badge bg-secondary-subtle text-primary px-3 py-2">Cast & Crew</p>
                        </div>

                        <div class="mt-auto pt-4 border-top border-secondary border-opacity-25">
                            <div class="d-flex gap-3">
                                <a href="{{ route('people.edit', $person) }}"
                                    class="btn btn-outline-warning px-4 py-2 fw-bold">
                                    <i class="bi bi-pencil-square me-2"></i>Modifica Informazioni
                                </a>

                                <button class="btn btn-outline-danger px-3">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #0f171e;
        }

        .tracking-widest {
            letter-spacing: 0.1em;
        }
    </style>
@endsection
