<div class="row">
    <div class="col my-3">
        {{ Form::label('military_rank', 'Воинское звание', ['class' => 'form-label']) }}
        {{ Form::select('military_rank', $ranks, "$officer->military_rank") }}
        
    </div>
    </div>   
    <div class="row">
        <div class="col-md-4">
            {{ Form::label('surname', 'Фамилия', ['class' => 'form-label']) }}
            {{ Form::text('surname', "$officer->surname", ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('name', 'Имя', ['class' => 'form-label']) }}
            {{ Form::text('name', "$officer->name", ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            {{ Form::label('patronymic', 'Отчество')}}
            {{ Form::text('patronymic', "$officer->patronymic", ['class' => 'form-control']) }}
        </div>
    </div>        
    <div class="row">
        <div class="col-12">
            {{ Form::label('military_position', 'Должность', ['class' => 'form-label']) }}
            {{ Form::text('military_position', "$officer->military_position", ['class' => 'form-control']) }}
        </div>
    </div>
    <div class = "row">
        <div class="form-group col my-3">
            {{ Form::label('avatar', 'Фото', ['class' => 'form-label']) }}
            {{ Form::file('avatar', ['class' => 'form-file', 'accept' => 'image/jpeg,image/png,image/gif,image/jpg,image/bmp,image/svg']) }}
        </div>
    </div>