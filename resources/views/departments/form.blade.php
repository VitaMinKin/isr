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
    <div class="row">
        <div class="col-xl-12 col-12 mt-1">
                <div class="form-check form-switch p-0">
                    <div class="form-group">
                        {{ Form::label('officersObi', 'Отметьте (через ctrl) офицеров по ОБИ, назначенных ответственными за управление', ['class' => 'form-check-label']) }}
                        {{ Form::select('officersObi[]', $officersObi, $department->officers()->pluck('officer_id'), ['multiple' => 'multiple', 'class' => 'form-control']) }}
                        <p class="text-right"> <a href="/officers"> Офицера нет в списке </a> </p>
                   </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12 mt-1">
                <div class="form-check form-switch p-0">
                    <div class="form-group">
                        {{ Form::label('officersOzi', 'Отметьте (через ctrl) офицеров, назначенных ответственными за ЗИ в управлении', ['class' => 'form-check-label']) }}
                        {{ Form::select('officersOzi[]', $officersOzi, $department->officers()->pluck('officer_id'), ['multiple' => 'multiple', 'class' => 'form-control']) }}
                        <p class="text-right"> <a href="/officers"> Офицера нет в списке </a> </p>
                   </div>
                </div>
        </div>
    </div>
<!-- </div> -->