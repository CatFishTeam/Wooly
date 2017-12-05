@extends('layouts.app')


@section('content')
    <div class="flex-center position-ref full-height" style="text-align: center;">
        <div class="content">
            <div class="title m-b-md">
                Catfish
            </div>
            <img src="/img/1.jpg" />
        </div>
    </div>
    <exemple-component></exemple-component>
    <gallery-level :md="md"></gallery-level>
@endsection