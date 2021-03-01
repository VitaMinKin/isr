<div class="row my-3">
    <div class="col">
        {{ Form::label('department_id', 'Наименование управления, отдела (отделения), службы', ['class' => 'form-label']) }}
        {{ Form::select('department_id', $departments->pluck('name', 'id'), $object->department->id ?? '0', ['class' => 'form-control custom-select']) }}
    </div>
</div>   
<div class="row my-3">
    <div class="col-xl-12 col-md-12">
        {{ Form::label('name', 'Наименование объекта информатизации', ['class' => 'form-label']) }}
        {{ Form::text('name', "$object->name", ['class' => 'form-control']) }}
    </div>
</div>
<div class="row my-3">
    <div class="col-xl-6 col-md-6 ">
        {{ Form::label('category', 'Категория объекта информатизации', ['class' => 'form-label']) }}
        {{ Form::select('category', ['1' => 'Первая', '2' => 'Вторая', '3' => 'Третья', '4' => 'ДСП'], $object->category, ['class' => 'form-control custom-select'] ) }}
    </div>
    <div class="col-xl-6 col-md-6 ">
        {{ Form::label('type', 'Тип объекта информатизации', ['class' => 'form-label']) }}
        {{ Form::select('type', ['ВТ' => 'Вычислительной техники', 'ВП' => 'Выделенного помещения'], $object->type, ['class' => 'form-control custom-select'] ) }}
    </div>
</div>
<div class="form-group">
        {{ Form::label('comment', 'Комментарий или примечание', ['class' => 'form-label']) }}
        {{ Form::textarea('comment', "$object->comment", ['class' => 'form-control', 'rows' => '3']) }}
</div>
    