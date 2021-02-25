<div class="row">
    <div class="col my-3">
        {{ Form::label('name', 'Наименование управления, отдела (отделения), службы', ['class' => 'form-label']) }}
        {{ Form::text('name', "$department->name", ['class' => 'form-control']) }}
    </div>
    </div>   
    <div class="row">
        <div class="col-md-8">
            {{ Form::label('short_name', 'Короткое наименование (аббревиатура)', ['class' => 'form-label']) }}
            {{ Form::text('short_name', "$department->short_name", ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4 ">
            {{ Form::label('subordination', 'Подчиненность управления', ['class' => 'form-label']) }}
            {{ Form::select('subordination', ['КВВВО' => 'КВВВО', 'НШО' => 'НШО'], $department->subordination ) }}
        </div>
    </div>
<!-- </div> -->