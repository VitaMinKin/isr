@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h3 class="text-center">Редактирование документа <b><u>{{ $objectDocument->documentsList->title }}</u></b></h3>
            <h4 class="text-center">Объект информатизации: <a href="{{ route('objects.show', $objectDocument->informatizationObject) }}">{{ $objectDocument->informatizationObject->name }}</a></h4>
            <h4 class="text-center">Управление: <a href="{{ route('departments.show', $objectDocument->informatizationObject->department) }}">{{ $objectDocument->informatizationObject->department->name }}</a></h4>
            
            {{ Form::model($objectDocument, ['url' => route('documents.update', $objectDocument), 'method' => 'PATCH', 'files' => true]) }}
                @include('objectDocuments.form')
                <div class="row my-1">
                    <div class="col d-flex justify-content-end">
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
        
    </div>

    

</div>

@endsection