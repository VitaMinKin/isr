@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
    <h2 class="text-center mb-4 "> Должностные лица </h2>
    <div class="card text-center">
        <div class="card-header">
            <div class="row">
                <div class="col-xl-4 col-4">    
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="departments-tab" data-toggle="tab" href="#departments" role="tab" aria-controls="departments" aria-selected="false">Управления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Контакты</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-8 col-8 text-muted text-uppercase d-flex justify-content-end align-items-end">
                    @if ($officer->information_security)
                        <p class="p-0 m-0"> Отдел обеспечения безопасности информации </p>
                    @else
                        <p class="p-0 m-0"> Ответственные за защиту информации в управлениях </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row card-body">
                <div class="tab-content col" id="officerTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-xl-4 col-4">
                                <img class="img-fluid img-thumbnail" src='{{ Storage::url("$officer->avatar") }}'>
                            </div>
                            <div class="col-xl-8 col-8 text-left">
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинская должность </p>
                                <h2> {{ $officer->military_position }} </h2>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Воинское звание </p>
                                <h3> {{ $officer->militaryRank->name }} </h3>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Фамилия, имя, отчество </p>
                                <h1> {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </h1>
                                <p class="card-text">Статус: исполнение обязанностей [командировка][отпуск]</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end mt-4">
                                <a href='{{ url("/officers/$officer->id/edit") }}' class="btn btn-primary mr-1">Редактировать</a>
                                <a href='{{ url("/officers/$officer->id/") }}' data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-primary ml-1">Удалить</a>
                            </div>
                        </div>
                    </div> <!-- end's profile tab -->
                    <div class="tab-pane fade" id="departments" role="tabpanel" aria-labelledby="departments-tab">
                            <div class="col-xl-12 col-12">
                                        <h5> Управления, связанные с офицером </h5>
                                        <div class="list-group">
                                            @if ($officer->departments()->get()->isEmpty())
                                                <a href="#" class="list-group-item list-group-item-action disabled">Нет связанных управлений</a>
                                            @else
                                                @foreach ($officer->departments()->orderBy('name')->get() as $department)
                                                    <a href="/departments/{{ $department->id }}" class="list-group-item list-group-item-action">{{ $department->name }} </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                        
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Контактные телефоны</div>
                </div>

        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <p class="m-0 p-0" title="Последнее обновление - {{ $officer->updated_at }}"> Дата создания записи - <b>{{ $officer->created_at }}</b> </p>
        </div>
    </div>


    </div>

   
@endsection
