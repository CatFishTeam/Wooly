@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    <example-component></example-component>

@endsection

@component('alert-blade')
    @slot('title')
        Forbidden
    @endslot

    You are not allowed to access this resource!
@endcomponent
