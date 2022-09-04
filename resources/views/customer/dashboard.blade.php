@extends('customer.layout.layout')

@section('content')

    <h2>Hello, {{auth('customer')->user()->name}}</h2>

@endsection