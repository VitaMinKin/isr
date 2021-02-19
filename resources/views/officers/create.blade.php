@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h1 class="text-center">Должностное лицо отдела ОБИ</h1>

            {{ Form::model($officer, ['url' => route('officers.store')]) }}
                <div class="row">
                    <div class="col my-3">
                        {{ Form::label('military_rank', 'Воинское звание', ['class' => 'form-label']) }}
                        {{ Form::select('military_rank', $ranks->toArray()) }}
                        
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-4">
                        {{ Form::label('surname', 'Фамилия', ['class' => 'form-label']) }}
                        {{ Form::text('surname', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('name', 'Имя', ['class' => 'form-label']) }}
                        {{ Form::text('name', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('patronymic', 'Отчество')}}
                        {{ Form::text('patronymic', '', ['class' => 'form-control']) }}
                    </div>
                </div>        
                <div class="row">
                    <div class="col-12">
                        {{ Form::label('military_position', 'Должность', ['class' => 'form-label']) }}
                        {{ Form::text('military_position', '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class = "row">
                    <div class="form-group col my-3">
                        {{ Form::label('avatar', 'Фото', ['class' => 'form-label']) }}
                        {{ Form::file('Выбрать', ['class' => 'form-file']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>       
            </form>
        </div>
        
    </div>

    

</div>

@endsection
