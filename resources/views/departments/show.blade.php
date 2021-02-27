@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
        <h2 class="text-center mb-4 "> Управления, отделы (отделения) и службы </h2>
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
                                <a class="nav-link" id="oficer-ozi-tab" data-toggle="tab" href="#oozi" role="tab" aria-controls="oozi" aria-selected="false">Ответственные за ЗИ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="objects-tab" data-toggle="tab" href="#objects" role="tab" aria-controls="objects" aria-selected="false">Объекты информатизации</a>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
            <div class="row card-body">
                <div class="tab-content col" id="departmentsTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

                        <div class="row">
                            <div class="col-xl-12 col-12 d-flex justify-content-end mt-4">
                                <a href="{{ route('departments.edit', $department) }}" class="btn btn-primary mr-1">Редактировать</a>
                                <a href="{{ route('departments.destroy', $department) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-primary ml-1">Удалить</a>
                            </div>
                        </div>

                    </div> <!-- end's profile tab -->
                    <div class="tab-pane fade" id="oobi" role="tabpanel" aria-labelledby="oobi-tab">
                                    
                                    <div class="col-xl-12 col-12">
                                            <h5> Офицеры по ОБИ, закрепленные за управлением </h5>
                                        <div class="list-group">
                                            @if ($department->officers()->where('information_security', true)->get()->isEmpty())
                                                <a href="#" class="list-group-item list-group-item-action disabled">Нет закрепленных офицеров</a>
                                                <div class="col  text-right mt-2 p-0">
                                                    Для добавления офицеров, перейдите в раздел <a href="{{ route('departments.edit', $department) }}"> редактирования управления </a>
                                                </div>
                                            @else
                                                @foreach ($department->officers()->where('information_security', true)->get() as $officer)
                                                    <a href="/officers/{{ $officer->id }}" class="list-group-item list-group-item-action">{{ $officer->militaryRank->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </a>
                                                @endforeach
                                                <div class="col  text-right mt-2 p-0">
                                                    <p class="card-text"> Офицеры закреплены за управлениями на основании <a href="#">приказа</a> по обеспечению безопасности информации на ОИ штаба округа </p>
                                                </div>
                                            @endif
                                                <div class="col  text-right mt-2 p-0">
                                                    <p class="card-text"> Вы также можете перейти на <a href="{{ route('officers.index') }}">список всех офицеров</a>, добавленных в систему </p>
                                                </div>
                                        </div>
                                    </div>                     
                    </div>
                    <div class="tab-pane fade" id="oozi" role="tabpanel" aria-labelledby="oozi-tab">
                                    <div class="col-xl-12 col-12">
                                        <h5> Офицеры, ответственные за защиту информации в управлении </h5>
                                        <div class="list-group">
                                            @if ($department->officers()->where('information_security', false)->get()->isEmpty())
                                                <a href="#" class="list-group-item list-group-item-action disabled">Нет закрепленных офицеров</a>
                                                <div class="col  text-right mt-2 p-0">
                                                    Для добавления офицеров, перейдите в раздел <a href="{{ route('departments.edit', $department) }}"> редактирования управления </a>
                                                </div>
                                            @else
                                                @foreach ($department->officers()->where('information_security', false)->get() as $officer)
                                                    <a href="/officers/{{ $officer->id }}" class="list-group-item list-group-item-action">{{ $officer->militaryRank->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </a>
                                                @endforeach
                                                <div class="col  text-right mt-2 p-0">
                                                    <p class="card-text"> Офицеры закреплены за управлениями на основании <a href="#">Приказа</a> по обеспечению безопасности информации на ОИ штаба округа </p>
                                                </div>
                                            @endif
                                                <div class="col  text-right mt-2 p-0">
                                                    <p class="card-text"> Вы также можете перейти на <a href="{{ route('officers.index') }}">список всех офицеров</a>, добавленных в систему </p>
                                                </div>
                                        </div>
                                    </div>
                    </div>
                    <div class="tab-pane fade" id="objects" role="tabpanel" aria-labelledby="objects-tab">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <h5> Объекты информатизации в управлении </h5>
                                <div class="list-group">
                                    @if ($department->informatizationObjects->isEmpty())
                                        <a href="#" class="list-group-item list-group-item-action disabled">Объектов информатизации нет</a>
                                    @else
                                        <div class="list-group-item list-group-item-action disabled">
                                            <div class="row">
                                                <div class="col">
                                                    Наименование
                                                </div>
                                                <div class="col">
                                                    Категория
                                                </div>
                                                <div class="col">
                                                    Тип
                                                </div>
                                                <div class="col">
                                                                
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($department->informatizationObjects as $object)
                                            <div class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href= "{{ route('objects.show', $object) }}">{{ $object->name }}</a>
                                                    </div>
                                                    <div class="col">
                                                        {{ $object->category }}
                                                    </div>
                                                    <div class="col">
                                                        {{ $object->type }}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('objects.edit', $object) }}">Редактировать</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-12 mt-4">
                                <h5> Новый объект информатизации </h5>
                                <form action="{{ route('objects.store') }}" method="post">
                                        <input type="hidden" name="department_id" value="{{ $department->id }}">
                                        {{ csrf_field() }}
                                    <div class="form-row align-items-center d-flex justify-content-center">
                                        <div class="col-auto my-1">
                                            <label class="sr-only" for="name">Наименование</label>
                                            <input type="text" class="form-control mr-sm-2" id="name" name="name" placeholder="Наименование объекта">
                                        </div>
                                        
                                        <div class="col-auto my-1">
                                            <select class="custom-select mr-sm-2" id="category" name="category">
                                                <option disabled selected>Категория</option>
                                                <option value="1">Первая</option>
                                                <option value="2">Вторая</option>
                                                <option value="3">Третья</option>
                                                <option value="4">ДСП</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-auto my-1">
                                            <label class="sr-only" for="category">Тип</label>
                                            <select class="custom-select mr-sm-2" id="type" name="type">
                                                <option disabled selected>Тип</option>
                                                <option value="ВП">Вычислительной техники</option>
                                                <option value="ВТ">Выделенного помещения</option>
                                            </select>
                                        </div>
                            
                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            
            <div class="card-footer text-muted d-flex justify-content-between">
                <p class="m-0 p-0" title="Последнее обновление - {{ $department->updated_at }}"> Дата создания записи - <b>{{ $department->created_at }}</b> </p>
            </div>
        </div>
    </div>

   
@endsection
