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
                        <div class="row">
                            <div class="col">
                                <h5> Документы по вводу объекта информатизации в эксплуатацию </h5>
                                <div class="list-group">
                                    @if ($object->documents->isEmpty())
                                        <a href="#" class="list-group-item list-group-item-action disabled">Документов на объект информатизации нет</a>
                                    @else
                                        <div class="list-group-item list-group-item-action disabled">
                                            <div class="row">
                                                <div class="col">
                                                    Наименование документа
                                                </div>
                                                <div class="col">
                                                    Предварительный учет (жувд)
                                                </div>
                                                <div class="col">
                                                    Постоянный учет (инвентарный, входящий)
                                                </div>
                                                <div class="col">
                                                    Дата документа            
                                                </div>
                                                <div class="col">
                                                    Комментарий (Примечание)           
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($object->documents as $document)
                                            <div class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col">
                                                        {{ $document->documentName->title }}
                                                    </div>
                                                    <div class="col">
                                                        {{ $document->preliminary_accounting }}
                                                    </div>
                                                    <div class="col">
                                                        {{ $document->number }}
                                                    </div>
                                                    <div class="col">
                                                        {{ $document->date }}
                                                    </div>
                                                    <div class="col">
                                                        {{ $document->comment }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-12 mt-4">
                                        <h5> Новый документ на объект информатизации</h5>
                                        <form action=" route('documents.store') " method="post">
                                                <input type="hidden" name="informatization_object_id" value="{{ $object->id }}">
                                                {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-row align-items-center d-flex justify-content-center">
                                                    <div class="col my-1">
                                                        {{ Form::label('document_name_id', 'Наименование документа', ['class' => 'sr-only']) }}
                                                        {{ Form::select('document_name_id', $documentNames, '', ['class' => 'form-control custom-select mr-sm-2'] ) }}
                                                    </div>
                                                    
                                                    <div class="col my-1">
                                                        {{ Form::label('preliminary_accounting', 'Номер предварительного учета (жувд)', ['class' => 'sr-only']) }}
                                                        {{ Form::text('preliminary_accounting', '', ['class' => 'form-control mr-sm-2', 'placeholder' => 'Номер предварительного учета (жувд)']) }}
                                                    </div>
                                                    
                                                    <div class="col my-1">
                                                        {{ Form::label('number', 'Номер постоянного учета (вх., инв.)', ['class' => 'sr-only']) }}
                                                        {{ Form::text('number', '', ['class' => 'form-control mr-sm-2', 'placeholder' => 'Номер постоянного учета (вх., инв.)']) }}
                                                    </div>

                                                    <div class="col my-1">
                                                        {{ Form::label('data', 'Дата документа', ['class' => 'sr-only']) }}
                                                        <input type="text" class="form-control" id="example">
                                                    </div>
                                                    
                                                    <div class="col-auto my-1 custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    
                                        
                                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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