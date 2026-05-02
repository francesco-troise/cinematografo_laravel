@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-dark text-white rounded-5 shadow-lg border border-secondary border-opacity-25 mt-4">
        <div class="container py-5">
            <div class="d-flex align-items-center mb-4">
                <!-- Badge in stile "Ticker" di borsa -->
                <span
                    class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 fw-bold shadow-sm">
                    <i class="bi bi-graph-up-arrow me-1"></i> MARKET OPEN: 2.540 FILMS
                </span>
            </div>

            <h1 class="display-3 fw-extrabold tracking-tight">
                Investi nel tuo <span class="text-primary text-gradient">Intrattenimento</span> <i
                    class="bi bi-rocket-takeoff"></i>
            </h1>

            <p class="col-md-8 fs-4 text-secondary mb-5">
                Analizza, monitora e gestisci la tua collezione cinematografica come un vero portfolio finanziario.
                Dati in tempo reale, statistiche avanzate e proiezioni di visione per il cinefilo moderno.
            </p>

            <!-- Bottoni in stile "Trading Platform" -->
            <div class="d-flex flex-wrap gap-3">
                <a href="#"
                    class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg d-flex align-items-center border-0">
                    <i class="bi bi-grid-1x2-fill me-2"></i> OPEN DASHBOARD
                </a>
                <a href="#"
                    class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold d-flex align-items-center border-opacity-25">
                    <i class="bi bi-person-bounding-box me-2"></i> VIEW PROFILE
                </a>
            </div>
        </div>
    </div>

    <div class="content py-5">
        <div class="container">
            <div class="row g-4 text-white">
                <!-- Card Statistica 1 -->
                <div class="col-md-4">
                    <div class="card bg-secondary bg-opacity-10 border-0 rounded-4 p-3 shadow-sm">
                        <div class="card-body">
                            <small class="text-uppercase text-secondary fw-bold">Watchlist Performance</small>
                            <h2 class="fw-bold mt-2 text-success">+12.4% <i class="bi bi-caret-up-fill fs-6"></i></h2>
                            <p class="text-secondary small">La tua libreria sta crescendo più velocemente della media.</p>
                        </div>
                    </div>
                </div>
                <!-- Card Statistica 2 -->
                <div class="col-md-4">
                    <div class="card bg-secondary bg-opacity-10 border-0 rounded-4 p-3 shadow-sm">
                        <div class="card-body">
                            <small class="text-uppercase text-secondary fw-bold">Total Assets</small>
                            <h2 class="fw-bold mt-2">1,240 h</h2>
                            <p class="text-secondary small">Valore totale in ore di visione accumulate.</p>
                        </div>
                    </div>
                </div>
                <!-- Card Statistica 3 -->
                <div class="col-md-4">
                    <div class="card bg-secondary bg-opacity-10 border-0 rounded-4 p-3 shadow-sm">
                        <div class="card-body">
                            <small class="text-uppercase text-secondary fw-bold">Daily Volume</small>
                            <h2 class="fw-bold mt-2 text-info">3.2 <i class="bi bi-play-circle-fill fs-6"></i></h2>
                            <p class="text-secondary small">Media di film analizzati nelle ultime 24 ore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
