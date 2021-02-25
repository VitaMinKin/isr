@extends('layouts.app')

@section('content')
 <div class='container-lg'>
    
    <h2 class="text-center text-uppercase mt-3"> Управления, отделы (отделения) и службы штаба округа </h2>
    
    <table class="table table-bordered table-striped table-responsive-sm table-sm" cols="4">
    <thead class="table-dark">
        <tr class="text-center">
            <th scope="col" width=3%>№ п/п</th>
            <th scope="col" class='align-middle'>Наименование</th>
            <th scope="col" class="col-xl-2 col-2 align-middle">Короткое наименование <br /> (аббревиатура)</th>
            <th scope="col" class="align-middle">Подчиненность</th>
        </tr>
    </thead>
    <tbody class="table-hover cursor-pointer">
        @if ($departments->isEmpty())
            <tr>
                <td colspan="5">
                    <p class="text-center font-italic mt-15"> Нет данных для отображения </p>
                </td>
            </tr>

        @else
       
            @foreach($departments as $department)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="/departments/{{ $department->id }}">{{ $department->name }}</a></td>
                    <td>{{ $department->short_name }}</td>
                    <td>{{ $department->subordination }}</td>
                </tr>
            @endforeach

            {{ $departments->links() }}
        @endif
    </tbody>
    </table>
    <div class="row d-flex justify-content-end m-0">
        <a class="btn btn-primary" href="/departments/create" role="button">Добавить</a>
    </div>

    
</div>


@endsection
