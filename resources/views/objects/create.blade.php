@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h3 class="text-center">Создание нового объекта информатизации</h3>
            
            {{ Form::model($object, ['url' => route('objects.store')]) }}
                @include('objects.form')
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>       
            {{ Form::close() }}
        </div>
        
    </div>

    

</div>

@endsection