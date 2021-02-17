@extends('layout')

@extends('header')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-4" style="background-color:blue">

                    </div>
                    <div class="col-8">
                        <h2> {{ $officer->military_position }} </h2>
                        <h3> {{ $officer->militaryRanks()->first()->name }} <h3>
                        <h1> {{ $officer->surname }} {{ $officer->name }} {{ $officer->patronymic }} </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@extends('footer')