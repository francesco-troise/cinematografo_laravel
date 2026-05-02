@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <style>
        .hover-lift {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hover-lift:hover {
            transform: translateY(-10px);

            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);

        }
    </style>

    <div class="container-fluid py-4">
        <div class="row g-4">

            <!--INDEX SECTION-->
            <section class="col-12 col-lg-6">
                <a href="{{ route('movie.index') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-4 hover-lift">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h1 class="h5 mb-0 text-primary d-flex align-items-center gap-2">
                                <i class="bi bi-collection-play-fill fs-3"></i>
                                <b>Catalogo: accedi alla tua intera libreria di film</b>
                            </h1>
                        </div>
                        <div class="card-body text-secondary p-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-film text-primary opacity-75" style="font-size: 3rem; line-height: 1;"></i>
                                <p class="mb-0 fs-6 lh-lg">
                                    Il tuo intero catalogo di film! Ottieni informazioni principali sui film:
                                    come il cast o i generi che offre la tua libreria.
                                    Ricerca se un titolo è in tuo possesso, e le sue statistiche!
                                    <i class="bi bi-bar-chart-line-fill text-primary ms-2 fs-4 align-middle"></i>
                                </p>
                            </div>
                            <div class="mt-4 text-end">
                                <small class="text-muted bg-light px-3 py-2 rounded-pill">
                                    Dettagli tecnici <i class="bi bi-info-circle ms-1"></i>
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
            </section>

            <!--SECTION ADD MOVIE-->
            <section class="col-12 col-lg-6">
                <a href="" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-4 hover-lift">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h1 class="h5 mb-0 text-success d-flex align-items-center gap-2">
                                <i class="bi bi-calendar-plus-fill fs-3"></i>
                                <b>Nuovi arrivi?!</b>
                            </h1>
                        </div>
                        <div class="card-body text-secondary p-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-camera-reels-fill text-success opacity-75"
                                    style="font-size: 3rem; line-height: 1;"></i>
                                <p class="mb-0 fs-6 lh-lg">
                                    Aggiungi un nuovo Film alla tua libreria. Resta sull'onda dell'hype, film recenti
                                    attraggono maggiori visite e streaming.
                                    <i class="bi bi-graph-up-arrow text-success ms-2 fs-4 align-middle"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </section>

            <!--SECTION ADD GENRE-->
            <section class="col-12 col-lg-6">
                <a href="" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-4 hover-lift">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h1 class="h5 mb-0 text-danger d-flex align-items-center gap-2">
                                <i class="bi bi-tags-fill fs-3"></i>
                                <b>NUOVI GENERI!</b>
                            </h1>
                        </div>
                        <div class="card-body text-secondary p-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-grid-fill text-danger opacity-75"
                                    style="font-size: 3rem; line-height: 1;"></i>
                                <p class="mb-0 fs-6 lh-lg">
                                    Nuove tendenze? Aggiorna i generi disponibili nel tuo catalogo, permetti agli utenti una
                                    scelta maggiore.
                                    <i class="bi bi-stars text-danger ms-2 fs-4 align-middle"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </section>

            <!--SECTION ADD PEOPLE-->
            <section class="col-12 col-lg-6">
                <a href="" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 rounded-4 hover-lift">
                        <div class="card-header bg-transparent border-0 pt-4 pb-0">
                            <h1 class="h5 mb-0 text-info d-flex align-items-center gap-2">
                                <i class="bi bi-people-fill fs-3"></i>
                                <b>AGGIUNGI ATTORI E REGISTI!</b>
                            </h1>
                        </div>
                        <div class="card-body text-secondary p-4">
                            <div class="d-flex align-items-start gap-3">
                                <i class="bi bi-person-plus-fill text-info opacity-75"
                                    style="font-size: 3rem; line-height: 1;"></i>
                                <p class="mb-0 fs-6 lh-lg">
                                    Aggiungi nuovi attori o nuovi registi. Questa pratica facilita l'inserimento di nuovi
                                    film, indica solo il nome della persona e il sistema la inserirà più velocemente per te!
                                    <i class="bi bi-magic text-info ms-2 fs-4 align-middle"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </section>

        </div>
    </div>
@endsection
