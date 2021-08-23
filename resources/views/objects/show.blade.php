@extends('layouts.app')

@section('content')
    <div class="container-xl container mt-5">
    <h2 class="text-center mb-4 "> {{ $object->name }}, {{ $object->department->name }} </h2>
    <div class="card text-center">
        <div class="card-header">
            <div class="row">
                <div class="col-xl-12 col-12">    
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Инфомация об ОИ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="composition-tab" data-toggle="tab" href="#composition" role="tab" aria-controls="composition" aria-selected="false">Состав ОИ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="contact" aria-selected="false">Документация на ОИ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row card-body">
                <div class="tab-content col" id="objectTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-xl-12 col-12 text-left">
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Управление, отдел (отделение), служба округа </p>
                                <h4><a href="{{ route('departments.show', $object->department) }}"> {{ $object->department->name }} </a></h4>
                                                                
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Наименование объекта информатизации </p>
                                <h4> {{ $object->name }} </h4>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Категория </p>
                                <h4> {{ $object->category }} </h4>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Тип объекта информатизации </p>
                                <h4> {{ $object->type }} </h4>
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Закрепленные офицеры по ОБИ </p>
                                @forelse ($object->department->officers->where('information_security', true) as $officer)
                                <a href='{{ route("officers.show", $officer) }}'>{{ $officer->militaryRank->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }}</a>
                                <br />
                                @empty
                                <p class="card-text">Нет закрепленных офицеров по ОБИ</p>
                                @endforelse

                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Ответственные за защиту информации на объекте информатизации </p>
                                @forelse ($object->department->officers->where('information_security', false) as $officer)
                                <a href='{{ route("officers.show", $officer) }}'>{{ $officer->militaryRank->name }} {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }}</a>
                                <br />
                                @empty
                                <p class="card-text">Нет офицеров, ответственных за защиту информации</p>
                                @endforelse
                                <p class="p-0 pt-1 m-0 mt-3 font-italic"> Комментарий (примечание) </p>
                                <p class="card-text"> {{ $object->comment ?? "Нет информации" }} </p>
                                <p class="card-text mt-4">*Для добавления или изменения офицеров, <a href="{{ route('departments.show', $object->department) }}"> перейдите к управлению</a>, в котором развернут данный объект информатизации</p>
                            </div>
                        </div>
                    <div class="row">    
                        <div class="col-xl-12 col-12 d-flex justify-content-end mt-4">
                            <a href="{{ route('objects.edit', $object) }}" class="btn btn-primary mr-1">Редактировать</a>
                            <a href="{{ route('objects.destroy', $object) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-primary ml-1">Удалить</a>
                        </div>
                    </div>
                        

                    </div> <!-- end's profile tab -->
                    <div class="tab-pane fade" id="composition" role="tabpanel" aria-labelledby="composition-tab">
                            <div class="row">
                                <div class="col">
                                        <h5> Состав объекта информатизации </h5>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action disabled">Информация по объекту недоступна</a>
                                        </div>
                                </div>
                            </div>
                    </div>

                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                        <div class="row0">
                            <div class="col">
                                <h5> Документы по вводу объекта информатизации в эксплуатацию </h5>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            @foreach ($documents as $document)
                                                
                                                @php
                                                    $count = $object->documents()->where('documents_list_id', $loop->iteration)->count();
                                                @endphp
                                                <a class="list-group-item 
                                                        list-group-item-action
                                                        {{ $count == 0 ? 'list-group-item-secondary' : '' }} 
                                                        d-flex 
                                                        justify-content-between 
                                                        align-items-center" 
                                                    id="list-{{ $loop->iteration }}" 
                                                    data-toggle="list" 
                                                    href="#list-content-{{ $loop->iteration }}" 
                                                    role="tab" aria-controls="docs"
                                                > {{ $document }}
                                                    @if ($count > 0)
                                                        <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Количество документов за всё время">{{ $count }}</span>
                                                    @endif
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="tab-content" id="nav-tabContent">
                                            @foreach ($documents as $document)
                                                @php
                                                    $currentDocuments = $object->documents()->where('documents_list_id', $loop->iteration)->get();
                                                @endphp
                                                <div class="tab-pane fade show" id="list-content-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="list-home-list">
                                                    @if (!empty($currentDocuments))

                                                        @foreach ($currentDocuments as $document)
                                                            <div class="list-group-item list-group-item-action">
                                                                <div class="row .bg-light">
                                                                    <!-- row with document name -->
                                                                                                        
                                                                    <div class="col">
                                                                        <h6 class="card-title mb-2 font-weight-bold">
                                                                            <a href="{{ route('documents.edit', $document) }}" data-toggle="tooltip" data-placement="bottom" title="Редактировать" class="text-uppercase"> {{ $document->documentsList->title }} </a>
                                                                        </h6>
                                                                    </div>
                                                                                                
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col">
                                                                        Учет
                                                                    </div>
                                                                    <div class="col">
                                                                        Введен в действие
                                                                    </div>
                                                                    <div class="col">
                                                                        Окончание действия
                                                                    </div>
                                                                    <div class="col">
                                                                        Ссылка на файл
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col border-right d-flex align-self-center justify-content-center">
                                                                        <div>
                                                                            <span class="font-weight-bold"> Предварительный: </span><br /> {{ $document->preliminary_accounting ?? "-" }} <br />
                                                                            <span class="font-weight-bold"> Постоянный: </span> <br /> 
                                                                            @if ($document->number_type == "inventory")
                                                                                Инв. 
                                                                            @elseif ($document->number_type == "inbox")
                                                                                Вх. 
                                                                            @endif
                                                                            {{ $document->number }}
                                                                            @if ($document->number_mil_unit == "osk")
                                                                                - ОСК ВВО
                                                                            @else
                                                                                - {{ $document->number_mil_unit ?? null}}
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col border-right d-flex align-self-center justify-content-center">
                                                                        {{ $document->date ?? "Документ не готов (проект)"}}
                                                                    </div>
                                                                    <div class="col border-right d-flex align-self-center justify-content-center">
                                                                    <!-- Срок действия -->
                                                                        {{ $document->validity ?? "Бессрочно" }}
                                                                    </div>
                                                                    <div class="col d-flex align-self-center justify-content-center">
                                                                        @if ($document->file_name)
                                                                            {{ Html::link(route('documents.download', $document), "$document->file_name") }}
                                                                        @else
                                                                            <p class="text-muted m-0 p-0">Нет файла</p>
                                                                        @endif
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col text-italic">
                                                                        {{ $document->comment }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col d-flex justify-content-between">
                                                                        <div class="text-black-50">
                                                                            Отредактирован {{ $document->updated_at }}
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{ route('documents.destroy', $document) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="Удалить" class="mx-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                                </svg>
                                                                            </a>
                                                                        
                                                                            <a href="{{ route('documents.edit', $document) }}" data-toggle="tooltip" data-placement="bottom" title="Редактировать" class="mx-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                                <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                                            </svg>
                                                                            </a>
                                                                            
                                                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Комментировать" class="mx-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                                                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                                <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                                                </svg>
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        Документы отсутствуют
                                                    @endif









                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                 </div>

                            </div>
                        </div>
                        
                                <div class="row">
                                    <div class="col-xl-12 col-12 my-1 d-flex justify-content-end">
                                        <a href="{{ route('documents.create', ['object' => $object]) }}" class="btn btn-primary">Добавить документ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <p class="m-0 p-0" title="Последнее обновление - {{ $object->updated_at }}"> Дата создания записи - <b>{{ $object->created_at }}</b> </p>
        </div>
    </div>


    </div>

   
@endsection
