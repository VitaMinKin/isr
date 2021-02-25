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
        <div class="col-8">
            {{ Form::label('military_position', 'Должность', ['class' => 'form-label']) }}
            {{ Form::text('military_position', "$officer->military_position", ['class' => 'form-control']) }}
        </div>
        <div class="col-4 d-flex justify-content-center align-items-end">
            <div class="col p-0">
                
                
                <div class="form-check form-switch">
                    {{ Form::checkbox('information_security', "$officer->information_security" or 'false', "$officer->information_security", ['class' => 'form-check-input']) }}
                    {{ Form::label('information_security', 'Офицер отдела ОБИ', ['class' => 'form-check-label']) }}
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12 mt-1">
                <div class="form-check form-switch p-0">
                    <div class="form-group">
                        {{ Form::label('departments', 'Отметьте (через ctrl) связанные управления', ['class' => 'form-check-label']) }}
                        {{ Form::select('departments[]', $departments, $officer->departments()->pluck('department_id'), ['multiple' => 'multiple', 'class' => 'form-control']) }}
                        <p class="text-right"> <a href="/departments"> Управления нет в списке </a> </p>
                   </div>
                </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group col my-3">
            {{ Form::label('avatar', 'Фото', ['class' => 'form-label']) }}
            {{ Form::file('avatar', ['class' => 'form-file', 'accept' => 'image/jpeg,image/png,image/gif,image/jpg,image/bmp,image/svg']) }}
        </div>
    </div>