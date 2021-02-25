@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
    <h2 class="text-center mb-4 "> Управления, отделы (отделения) и службы штаба округа </h2>
    <div class="card text-center">

        <div class="card-header text-muted">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-12">    
                    <ul class="nav nav-tabs card-header-tabs" id="departmentsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Профиль управления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="officer-obi-tab" data-toggle="tab" href="#oobi" role="tab" aria-controls="oobi" aria-selected="false">Офицеры по ОБИ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="oficer-ozi-tab" data-toggle="tab" href="#oozi" role="tab" aria-controls="contact" aria-selected="false">Ответственные за ЗИ</a>
                        </li>
                    </ul>
                </div>
               
            </div>
        </div>
        <div class="row card-body">
                <div class="tab-content col" id="departmentsTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
                    <div class="col">
                        <div class="row">
                            <div class="col-xl-12 col-12 text-left">
                                
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Наименование управления </p>
                                <h2> {{ $department->name }} </h2>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Аббревиатура </p>
                                <h3> {{ $department->short_name }} </h3>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Подчиненность </p>
                                <h1> {{ $department->subordination }} </h1>
                            </div>
                        </div>
                    </div>

                    </div> <!-- end's profile tab -->
                    <div class="tab-pane fade" id="oobi" role="tabpanel" aria-labelledby="departments-tab">
                                    
                                    <div class="col-xl-12 col-12">
                                            <h5> Офицеры по ОБИ, закрепленные за управлением </h5>
                                        <div class="list-group">
                                            @if ($department->officers()->where('information_security', true)->get()->isEmpty())
                                                <a href="#" class="list-group-item list-group-item-action disabled">Нет закрепленных офицеров</a>
                                            @else
                                                @foreach ($department->officers()->where('information_security', true)->get() as $officer)
                                                    <a href="/officers/{{ $officer->id }}" class="list-group-item list-group-item-action">{{ $officer->militaryRanks()->first()->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>                     
                    </div>
                    <div class="tab-pane fade" id="oozi" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="col-xl-12 col-12">
                                        <h5> Офицеры, ответственные за защиту информации в управлении </h5>
                                        <div class="list-group">
                                            @if ($department->officers()->where('information_security', false)->get()->isEmpty())
                                                <a href="#" class="list-group-item list-group-item-action disabled">Нет закрепленных офицеров</a>
                                            @else
                                                @foreach ($department->officers()->where('information_security', false)->get() as $officer)
                                                    <a href="/officers/{{ $officer->id }}" class="list-group-item list-group-item-action">{{ $officer->militaryRanks()->first()->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                    </div>
                </div>

        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <p class="m-0 p-0" title="Последнее обновление - {{ $department->updated_at }}"> Дата создания записи - <b>{{ $department->created_at }}</b> </p> </p>
            <div class="d-flex justify-content-end">
                <a href='{{ url("/departments/$department->id/edit") }}' class="btn btn-primary mr-1">Редактировать</a>
                <a href='{{ url("/departments/$department->id/") }}' data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-primary ml-1">Удалить</a>
            </div>
        </div>
    </div>
    </div>

   
@endsection
