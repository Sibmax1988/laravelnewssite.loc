@extends('layouts.app')


@section('content')

    <form class="form-horizontal" action="{{route('admin.store')}}" method="post">
        {{csrf_field()}}
       @include('admin.partials.forms')
    </form>


@endsection