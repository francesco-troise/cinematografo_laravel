@extends('layouts.app')

@section('title', 'Attori - Registi')

@section('content')
    <div class="container py-5">
        <div class="d-flex align-items-center mb-5">
            <h1 class="fw-bold text-primary mb-0">Attori & Registi</h1>
            <a href="{{ route('movies.index') }}"
                class="btn bg-secondary-subtle text-primary btn-sm shadow-sm d-inline-flex align-items-center border-0 px-3 py-2 fw-bold ms-4">
                <i class="bi bi-film me-2"></i> Vai ai film
            </a>
            <a href="{{ route('people.create') }}">Aggiungi nuovo Attore/Regista</a>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach ($people as $person)
                <div class="col">
                    <a href="{{ route('people.show', $person) }}">
                        <div class="card h-100 border-0 shadow-sm hover-card bg-dark text-white overflow-hidden">

                            <div class="position-relative" style="height: 250px;">
                                <img src="{{ Storage::url($person->url_image) }}"
                                    class="w-100 h-100 object-fit-cover card-img-top" alt="{{ $person->name }}">

                                <span
                                    class="position-absolute top-0 end-0 m-2 badge rounded-pill bg-black bg-opacity-50 border border-secondary">
                                    {{ $person->gender == 'M' ? 'Uomo' : 'Donna' }}
                                </span>
                            </div>

                            <div class="card-body p-3">
                                <h6 class="card-title fw-bold mb-1 text-truncate">
                                    {{ $person->name }} {{ $person->last_name }}
                                </h6>
                                <p class="card-text small text-secondary mb-3">Cast & Crew</p>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <!--Dettagli Show-->
                                    <a href="{{ route('people.show', $person) }}" class="btn btn-primary btn-sm px-2 py-1">
                                        <i class="bi bi-eye"></i>Dettagli
                                    </a>
                                    <!--Modifica Edit-->
                                    <a href="{{ route('people.edit', $person) }}"
                                        class="btn btn-outline-warning btn-sm px-2 py-1">
                                        <i class="bi bi-pencil"></i>Modifica informazioni
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>

    <style>
        .hover-card {
            transition: transform 0.3s ease, shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4) !important;
        }

        body {
            background-color: #0f171e;
        }
    </style>
@endsection
