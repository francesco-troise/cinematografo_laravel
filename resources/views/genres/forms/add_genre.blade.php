@extends('layouts.app')

@section('title', 'Aggiungi un genere')

@section('content')
    <div class="container py-4">
        <a href="{{ route('genres.index') }}" class="text-info text-decoration-none small mb-3 d-inline-block">
            ← Torna ai generi
        </a>

        <div class="row g-4">

            <div class="col-md-9">
                <div class="p-4 rounded-4 shadow" style="background-color: #1a1d20;">
                    <form action="{{ route('genres.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-4">
                            <label for="name" class="text-info small fw-bold text-uppercase">Titolo del Genere</label>
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg text-white border-info border-0 border-bottom rounded-0"
                                value=""
                                style="background-color: #2b3035 !important; border-bottom-width: 2px !important;">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="text-info small fw-bold text-uppercase">
                                Descrizone del genere
                            </label>
                            <textarea name="description" id="description" rows="3" class="form-control text-white border-secondary rounded-3"
                                style="background-color: #2b3035 !important;"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="url_image" class="text-info small fw-bold text-uppercase">Cambia la cover</label>
                            <input type="file" name="url_image" id="url_image"
                                class="form-control form-control-sm text-white border-secondary"
                                style="background-color: #2b3035 !important;">
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <button type="submit" class="btn btn-info px-5 fw-bold rounded-pill shadow text-dark">
                                Aggiungi genere
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
