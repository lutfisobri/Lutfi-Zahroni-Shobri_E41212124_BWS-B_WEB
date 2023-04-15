@extends('week3.layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display4">Halaman Home</h1>
            <p class="lead">Halaman ini merupakan halaman home</p>
        </div>
        <p>Nama : {{ $name }}</p>
        <p>Mata Pelajaran</p>
        <ul>
            @foreach ($courses as $course)
                <li>{{ $course }}</li>
            @endforeach
        </ul>
    </div>
@endsection

{{-- 
    Directive @extends menghubungkan view ke view master.
    Directive @section mendefinisikan sebuah bagian (section) dari isi halaman
web,     
--}}