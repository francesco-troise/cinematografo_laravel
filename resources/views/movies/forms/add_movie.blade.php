@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Inserisci Nuovo Film</h2>


        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!--INFO FILM-->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Informazioni Film</div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Titolo</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!--Genere-->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Generi (Seleziona uno o più)</label>
                            <select name="genre_ids[]" class="form-control" multiple required style="height: 100px;">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Tieni premuto Ctrl (o Cmd) per selezionare più generi.</small>
                        </div>

                        <!--Durata-->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Durata (in minuti)</label>
                            <input type="number" name="duration" class="form-control" placeholder="es. 120">
                        </div>

                        <!--PEGI-->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">PEGI</label>
                            <select name="pegi" class="form-control">
                                <option value="3">3+</option>
                                <option value="7">7+</option>
                                <option value="12">12+</option>
                                <option value="16">16+</option>
                                <option value="18">18+</option>
                            </select>
                        </div>

                        <!--Caricamento immagine di poster-->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Poster del Film (Immagine)</label>
                            <input type="file" name="poster" class="form-control" accept="image/*">
                        </div>

                        <!--Trama-->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Trama</label>
                            <textarea name="plot" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!--CAST(MASSIMO 6 PERSONE)-->
            <h3 class="mb-3">Cast e Collaboratori (Max 6)</h3>

            <datalist id="people-list">
                @foreach ($people as $person)
                    <option value="{{ $person->id }}">{{ $person->name }} {{ $person->last_name }}</option>
                @endforeach
            </datalist>

            <div class="row">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-secondary border-bottom pb-2">Persona #{{ $i + 1 }}</h5>

                                <div class="mb-3">
                                    <label class="form-label">Cerca Persona (ID)</label>
                                    <input type="text" list="people-list" name="cast[{{ $i }}][person_id]"
                                        class="form-control" placeholder="Scrivi per cercare...">
                                </div>

                                <label class="form-label"><strong>Ruoli:</strong></label>
                                <div class="role-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 5px;">
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="cast[{{ $i }}][role_ids][]" value="{{ $role->id }}"
                                                id="role_{{ $i }}_{{ $role->id }}">
                                            <label class="form-check-label" style="font-size: 0.85rem;"
                                                for="role_{{ $i }}_{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="mt-4 mb-5 text-center">
                <button type="submit" class="btn btn-success btn-lg px-5">Salva Film Completo</button>
            </div>
        </form>
    </div>
@endsection
