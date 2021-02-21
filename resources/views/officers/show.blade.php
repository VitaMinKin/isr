@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
    <div class="card text-center">
        <div class="card-header">
            {{ $officer->military_position }}
        </div>
        <div class="row card-body">
            <div class="col">
                <div class="row">
                    <div class="col-xl-4 col-4">
                    <!-- <div id="avatar" class="col-4" style='background-image:url({{ Storage::url("$officer->avatar") }})'> -->
                        <img class="img-fluid img-thumbnail" src='{{ Storage::url("$officer->avatar") }}'>
                    </div>
                    <!-- </div> -->
                    <div class="col-xl-8 col-8">
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинская должность </p>
                        <h2> {{ $officer->military_position }} </h2>
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинское звание </p>
                        <h3> {{ $officer->militaryRanks()->first()->name }} </h3>
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Фамилия, имя, отчество </p>
                        <h1> {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </h1>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
    </div>

   
@endsection
