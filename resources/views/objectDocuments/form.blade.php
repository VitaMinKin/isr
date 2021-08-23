<div class="row my-1">
    <div class="col-12">
        {{ Form::label('documents_list_id', 'Наименование документа', ['class' => 'form-label']) }}
        {{ Form::select('documents_list_id', $documentsList, $objectDocument->documents_list_id ?? null, ['class' => 'form-control custom-select mr-sm-2'] ) }}
    </div>
</div>
<div class="row my-1">
    <div class="col-12">
        {{ Form::label('preliminary_accounting', 'Номер предварительного учета', ['class' => 'form-label']) }}
        {{ Form::text('preliminary_accounting', $objectDocument->preliminary_accounting ?? null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'ЖУВД']) }}
    </div>
</div>
<div class="row my-1">
    <div class="col-12">
        <p class="text-center my-1">Информация о постановке документа на постоянный учет:</p>
    </div>
</div>
<div class="row my-1 d-flex align-items-end">
    <div class="col-3 pr-1">
        {{ Form::label('number_type', 'Категория', ['class' => 'form-label']) }}
        {{ Form::select('number_type', ['inbox' => 'Входящий', 'inventory' => 'Инвентарный', 'other' => 'Другой'], $objectDocument->number_type ?? null, ['class' => 'form-control custom-select mr-sm-2'] ) }}
    </div>
        <div class="col-3 px-1">
            {{ Form::label('number', 'Номер', ['class' => 'form-label']) }}
            {{ Form::text('number', $objectDocument->number ?? null, ['class' => 'form-control mr-sm-2', 'placeholder' => '0000']) }}
        </div>
        <div class="col-3 px-1">
            {{ Form::label('number_mil_unit', 'Воинская часть', ['class' => 'form-label']) }}
            {{ Form::select('number_mil_unit', ['42992' => '42992', 'osk' => 'ОСК ВВО'], $objectDocument->number_mil_unit ?? null, ['class' => 'form-control custom-select mr-sm-2']) }}
        </div>

    <div class="col-3 pl-1">
        {{ Form::label('date', 'Дата документа', ['class' => 'form-label']) }}
        {{ Form::date('date', $objectDocument->date ?? null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row mt-3">
    <div class="input-group col-12">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="documentFile" name="documentFile">
            <label class="custom-file-label" for="documentFile">{{ $objectDocument->file_name ?? "Файл отсканированного документа (изображение или PDF)" }}</label>
        </div>
        @if (isset($objectDocument) && $objectDocument->file_name)
        <div class="input-group-append">
            <a href="{{ route('documents.fileDelete', $objectDocument) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow" class="btn btn-outline-secondary" style="border:1px solid #ced4da;" type="button">Удалить</a>
        </div>
        @endif
    </div>
</div>
<div class="row my-1">
    <div class="col-12">
        {{ Form::label('comment', 'Описание, комментарий, примечание или любая дополнительная информация', ['class' => 'form-label']) }}
        {{ Form::textarea('comment', $objectDocument->comment ?? null, ['class' => 'form-control mr-sm-2', 'rows' => '3']) }}
    </div>
</div>