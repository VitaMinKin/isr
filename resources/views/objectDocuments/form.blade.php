<div class="row my-1">
    <div class="col-6">
        {{ Form::label('document_name_id', 'Наименование документа', ['class' => 'form-label']) }}
        {{ Form::select('document_name_id', $documentNames, $objectDocument->document_name_id ?? null, ['class' => 'form-control custom-select mr-sm-2'] ) }}
    </div>
   
    <div class="col-6">
        {{ Form::label('preliminary_accounting', 'Номер предварительного учета', ['class' => 'form-label']) }}
        {{ Form::text('preliminary_accounting', $objectDocument->preliminary_accounting ?? null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'ЖУВД']) }}
    </div>
</div>
<div class="row my-1">
    <div class="col-4">
        <p><input type="radio" name="number_type" value='inbox' checked>Входящий</p>
        <p><input type="radio" name="number_type" value='inventory'>Инвентарный</p>
    </div>
      <div class="col-4">
        {{ Form::label('number', 'Номер постоянного учета (вх., инв.)', ['class' => 'form-label']) }}
        {{ Form::text('number', $objectDocument->number ?? null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'входящий или инвентарный']) }}
    </div>

    <div class="col-4">
        {{ Form::label('date', 'Дата документа', ['class' => 'form-label']) }}
        {{ Form::date('date', $objectDocument->date ?? null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 custom-file">
        <input type="file" class="custom-file-input" id="documentFile", name="documentFile">
        <label class="custom-file-label mx-3" for="documentFile">Файл документа</label>
    </div>
</div>
<div class="row my-1">
    <div class="col-12">
        {{ Form::label('comment', 'Комментарий, примечание или дополнительная информация', ['class' => 'form-label']) }}
        {{ Form::textarea('comment', $objectDocument->comment ?? null, ['class' => 'form-control mr-sm-2', 'rows' => '3']) }}
    </div>
</div>