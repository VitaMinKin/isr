@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h3 class="text-center">Добавление документа в объект информатизации</h3>
            <h4 class="text-center">Управление: {{ $informatizationObject->department->name }}</h4>
            <h4 class="text-center">Объект информатизации: {{ $informatizationObject->name }}</h4>
            
            {{ Form::open(['url' => route('documents.store'), 'files' => true]) }}
                <input name='informatization_object_id' type='hidden' value="{{ $informatizationObject->id }}" />
                @include('objectDocuments.form')
                <div class="row my-1">
                    <div class="col d-flex justify-content-end">
                        {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>    
            {{ Form::close() }}
        </div>
        
    </div>

    

</div>

@endsection