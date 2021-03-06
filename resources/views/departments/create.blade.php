@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h3 class="text-center">Управление, отдел (отделение), служба <br /> штаба округа</h3>
            
            {{ Form::model($department, ['url' => route('departments.store')]) }}
                @include('departments.form')
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