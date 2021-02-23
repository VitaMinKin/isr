@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
    <div class="card text-center">
        <div class="card-header text-muted">
            @if ($officer->information_security)
                <p class="p-0 m-0 text-uppercase"> Отдел обеспечения безопасности информации </p>
            @else
                <p class="p-0 m-0 text-uppercase"> Ответственные за защиту информации в управлениях </p>
            @endif
        </div>
        <div class="row card-body">
            <div class="col">
                <div class="row">
                    <div class="col-xl-4 col-4">
                    <!-- <div id="avatar" class="col-4" style='background-image:url({{ Storage::url("$officer->avatar") }})'> -->
                        <img class="img-fluid img-thumbnail" src='{{ Storage::url("$officer->avatar") }}'>
                    </div>
                    <!-- </div> -->
                    <div class="col-xl-8 col-8 text-left">
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинская должность </p>
                        <h2> {{ $officer->military_position }} </h2>
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинское звание </p>
                        <h3> {{ $officer->militaryRanks()->first()->name }} </h3>
                        <p class="p-0 pt-1 m-0 mt-3 font-italic"> Фамилия, имя, отчество </p>
                        <h1> {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </h1>
                        <p class="card-text">Статус: исполнение обязанностей [командировка][отпуск]</p>
                        <div class="d-flex justify-content-start">
                            <a href='{{ url("/officers/$officer->id/edit") }}' class="btn btn-primary mr-1">Редактировать</a>
                            <a href='{{ url("/officers/$officer->id/") }}' data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-primary ml-1">Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <p class="m-0 p-0"> Дата создания записи - <b>{{ $officer->created_at }}</b> </p> <p class="m-0 p-0"> Последнее обновление - <b>{{ $officer->updated_at }}</b> </p>
        </div>
    </div>
    </div>

   
@endsection
