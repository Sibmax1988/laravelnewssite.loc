@extends('layouts.app')


@section('content')

    <div class="container">
        <a href="{{route('admin.create')}}" class="btn btn-info"> @lang('messages.createNews')</a>
    </div>


    <div class="container-fluid col-lg-10">
        <br>
        <destroynews-component></destroynews-component>
    </div>

   @endsection
