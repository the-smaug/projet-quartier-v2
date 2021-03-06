@extends('dashboard.default')

@section('content-header')

    <h1>Gestion des lieux culturels</h1>

@endsection


@section('content')

    {!! Form::open(['url' => url('places'), 'method' => 'post', 'files' => true]) !!}

    <div class="form-group">
        <label for="nameFr">Nom</label>
        <input name="nameFr" id="nameFr" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="decriptionFr">Description</label>
        <textarea class="form-control" name="descriptionFr" id="decriptionFr" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="nameEn">Nom anglais</label>
        <input name="nameEn" id="nameEn" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="decriptionEn">Description anglaise</label>
        <textarea class="form-control" name="decriptionEn" id="decriptionEn" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" name="image" id="image" type="file">
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input class="form-control" name="latitude" id="latitude" type="number" step="any">
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input class="form-control" name="longitude" id="longitude" type="number" step ="any">
        </div>

        <button class="btn-primary btn" type="submit">Ajouter</button>


    {!! Form::close() !!}

    <div class="flex-container">
    @foreach($places as $place)

        <div class="item_gallery">
            <h1>{{ $place->name }}</h1>
            <img src="/storage/app/public/places/{{$place->url }}">
            <p>{{ $place->description }}</p>
            <button type="button" class="btn btn-warning">Supprimer</button>
        </div>

    @endforeach
    </div>

@endsection