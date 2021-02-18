@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mt-6 justify-content-center">
        <div class="col-9">

            <h1 class="text-center">Должностное лицо отдела ОБИ</h1>


            <form method="POST" action="/officers">
                @csrf
                
                <div class="row">
                    <div class="col my-3">
                        <label for="inputRank" class="form-label">Воинское звание</label>
                        <select id="inputRank" class="form-select" name="officer[military_rank]">
                        <option selected>Выберите...</option>
                        @foreach ($ranks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputSurname" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="inputSurname" name="officer[surname]">
                    </div>
                    <div class="col-md-4">
                        <label for="inputName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="inputName" name="officer[name]">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPatronymic" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="inputPatronymic" name="officer[patronymic]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="inputPosition" class="form-label">Должность</label>
                        <input type="text" class="form-control" id="inputPosition" placeholder="Офицер по ОБИ" name="officer[military_position]">
                    </div>
                </div>

                
                <div class = "row">
                    <div class="form-group col my-3">
                        <label for="avatar" class="form-label">Фото</label>
                        <input type="file" class="form-file" id="avatar">
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>

    

</div>

@endsection
