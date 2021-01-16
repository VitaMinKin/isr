@extends('layout')

@section('content')
<header>
    <div class="nav bg-primary text-white d-flex justify-content-center">
        <p class="text-center align-content-center screenTitle">
            ЭКРАН СОСТОЯНИЯ ВВОДА ОБЪЕКТОВ ИНФОРМАТИЗАЦИИ В ЭКСПЛУАТАЦИЮ
        </p>
    </div>
</header>
<div class="flex-grow-1">
    <div class='jumbotron jumbotron-fluid bg-dark'>
        <div class='container-lg'>
            <div class='row'>
                <div class='col-12 col-md-10 col-lg-8 mx-auto text-white'>
                        <h1 class='display-3'>Page Analyzer</h1>
                        <p class='lead'>Check web pages for free</p>
                        <form class='d-flex justyfy-content-center' type="post" actions="/domains">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name='domains[name]' placeholder="www.example.com" value="">
                                <button class="btn btn-primary ml-3 px-5 text-uppercase" type="submit">Check</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection