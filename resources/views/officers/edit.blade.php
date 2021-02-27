@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h3 class="text-center">Должностное лицо управления, отдела (отделения), <br /> службы штаба округа</h3>
            
            {{ Form::model($officer, ['url' => route('officers.update', $officer), 'method' => 'PATCH', 'files' => true]) }}
                @include('officers.form')
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>       
            {{ Form::close() }}
        </div>
        
    </div>
</div>

@endsection
