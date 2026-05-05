@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">

                <span class="badge rounded-pill bg-primary fs-5 text-dark mx-1">
                    <a class="text-decoration-none text-dark" href="{{ route('movies.index') }}">
                        Torna ai film
                    </a>
                </span>
                <div class="card shadow">

                    <div class="card-header bg-dark text-white py-3">
                        <div class="d-flex justify-content-between align-items-center small mb-2 text-uppercase fw-bold">
                            <span>
                                <a class="text-decoration-none text-white"
                                    href="{{ route('people.show', $movie->getDirector()) }}">{{ $movie->getDirectorName() }}
                                </a>
                            </span>
                            <div>
                                @foreach ($movie->getGenres() as $genre)
                                    <span class="badge rounded-pill bg-light text-dark mx-1">
                                        <a class="text-decoration-none text-dark" href="{{ route('genres.show', $genre) }}">
                                            {{ $genre->name }}
                                        </a>
                                    </span>
                                @endforeach
                            </div>
                            <span>PEGI {{ $movie->pegi }}</span>

                            <span>{{ $movie->duration }} min</span>

                        </div>
                        <h1 class="text-center mb-0 mt-2 h2 fw-bold text-uppercase italic">
                            {{ $movie->title }}
                        </h1>
                    </div>

                    <div class="card-body p-4">
                        <div class="row align-items-start">
                            <div class="col-md-5 col-lg-4 text-center">
                                <img src="{{ Storage::url($movie->url_poster) }}" alt="{{ $movie->title }}"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-height: 400px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-7 col-lg-8 mt-3 mt-md-0">
                                <h6 class="text-uppercase fw-bold text-secondary mb-3 small border-bottom pb-1">Trama</h6>
                                <p class="card-text lh-lg">
                                    {{ $movie->plot }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light p-4">
                        <h6 class="text-uppercase fw-bold mb-3 small text-secondary border-bottom pb-2">Cast</h6>
                        <ul class="row list-unstyled mb-0">
                            @foreach ($cast_data as $cast_member)
                                <li class="col-md-6 mb-2">
                                    <small class="fw-bold">{{ $cast_member['name'] }}
                                        {{ $cast_member['last_name'] }}</small>
                                    <span class="text-muted small">:</span>
                                    <span class="small text-secondary">{{ $cast_member['role'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
