@extends('layouts.app')

@section('content')
 <div class='container-lg'>
    
    <h3 class="text-center text-uppercase mt-3"> Должностные лица, обеспечивающие <br /> безопасности информации на объектах информатизации </h3>
    
    <table class="table table-bordered table-striped table-responsive-sm table-sm" cols="4">
    <thead class="table-dark">
        <tr class="text-center">
            <th scope="col" width=3%>№ п/п</th>
            <th scope="col" class='align-middle'>Должность</th>
            <th scope="col" class="col-xl-4 col-4 align-middle">Воинское звание</th>
            <th scope="col" class="align-middle">ФИО</th>
        </tr>
    </thead>
    <tbody class="table-hover cursor-pointer">
        @if ($officers->isEmpty())
            <tr>
                <td colspan="5">
                    <p class="text-center font-italic mt-15"> Нет данных для отображения </p>
                </td>
            </tr>

        @else
       
            @foreach($officers as $officer)
                <tr title='{{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }}'>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $officer->military_position }} </td>
                    <td>{{ $officer->militaryRank->name }}</td>
                    <td><a href="/officers/{{ $officer->id }}">{{ $officer->surname }} {{ mb_substr($officer->name, 0, 1) }}.{{ mb_substr($officer->patronymic, 0, 1) }}.</a></td>
                </tr>
            @endforeach

            {{ $officers->links() }}
        @endif
    </tbody>
    </table>
    <div class="row d-flex justify-content-end m-0">
        <a class="btn btn-primary" href="{{ route('officers.create') }}" role="button">Добавить</a>
    </div>

    
</div>


@endsection
