@extends('layouts.app')

@section('content')
 <div class='container-lg'>
    
    <h3 class="text-center text-uppercase mt-3"> Объекты информатизации </h3>
    
    <table class="table table-bordered table-striped table-responsive-sm table-sm" cols="5">
    <thead class="table-dark">
        <tr class="text-center">
            <th scope="col" width=3%>№ п/п</th>
            <th scope="col" class='align-middle col-xl-4 col-4'>Наименование управления</th>
            <th scope="col" class="col-xl-4 col-4 align-middle">Наименование объекта</th>
            <th scope="col" class="align-middle col-xl-2 col-2">Категория</th>
            <th scope="col" class="align-middle col-xl-2 col-2">Тип</th>
        </tr>
    </thead>
    <tbody class="table-hover cursor-pointer">
        @if ($objects->isEmpty())
            <tr>
                <td colspan="5">
                    <p class="text-center font-italic mt-15"> Нет данных для отображения </p>
                </td>
            </tr>

        @else
       
            @foreach($objects as $object)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('departments.show', $object->department) }}">{{ $object->department->name }}</a></td>
                    <td><a href="{{ route('objects.show', $object) }}"> {{ $object->name }}</a></td>
                    <td>{{ $object->category }}</td>
                    <td>{{ $object->type }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
    </table>
    {{ $objects->links("pagination::bootstrap-4") }}
    <div class="row d-flex justify-content-end m-0">
        <a class="btn btn-primary" href="{{ route('objects.create') }}" role="button">Добавить</a>
    </div>

    
</div>


@endsection
