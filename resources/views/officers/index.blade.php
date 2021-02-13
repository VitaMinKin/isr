@extends('layout')

@section('content')
 <div class='container-lg'>
 
    <h2 class="text-center text-uppercase mt-3"> Ответственные за обеспечение безопасности информации <br/> на объектах информатизации </h1>
    <table class="table table-bordered table-striped table-responsive-sm">
    <thead class="table-dark">
        <tr class="text-center">
        <th scope="col" class="col-1">№ п/п</th>
        <th scope="col">Должность</th>
        <th scope="col" class="col-2">Воинское звание</th>
        <th scope="col">ФИО</th>
        <th scope="col">Фото</th>
        </tr>
    </thead>
    <tbody class="table-hover cursor-pointer">
        @foreach($officers as $officer)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $officer->military_position }}</td>
            <td>{{ $officer->military_rank }}</td>
            <td>{{ $officer->surname }}</td>
            <td><p>png</p></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="row d-flex justify-content-end m-0">
        <a class="btn btn-primary" href="/officers/create" role="button">Добавить</a>
    </div>
</div>


@endsection