@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
<h1>Tambah Produk</h1>
<form method="POST" action="{{ route('products.store') }}">@csrf @include('products._form')</form>
@endsection
