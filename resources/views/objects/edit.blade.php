@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">
            
            <h3 class="text-center">Объект информатизации управления: {{ $object->department->name }}</h3>
            
            {{ Form::model($object, ['url' => route('objects.update', $object), 'method' => 'PATCH']) }}
                @include('objects.form')

            <div class="row">
                <div class="col d-flex justify-content-end">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

