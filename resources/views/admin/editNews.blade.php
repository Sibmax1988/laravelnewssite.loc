@extends('layouts.app')


@section('content')
    <form class="form-horizontal" action="{{route('admin.update',$news->id)}}" method="post">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        @include('admin.partials.forms')
    </form>

@endsection