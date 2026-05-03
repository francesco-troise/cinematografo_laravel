@extends('layouts.app')
@section('title', $movie->title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>{{ $movie->title }}</span>
                <b>-</b>
                <span>{{ $movie->getDirectorName() }}</span>
            </div>
            <div class="card-body">
                <img src="{{ Storage::url($movie->url_poster) }}" alt="">
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
