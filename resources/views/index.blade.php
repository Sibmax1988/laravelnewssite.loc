@extends('layouts.template')

@section('content')


    <div class="row col-lg-12" id="app">
        @forelse($news as $newsone)

        <div  class="card bg-light mb-3 text-center col-lg-3 border-info">
            @if ($newsone->images)
            <img class="card-img-top img-responsive rounded"  alt="Card image cap" src={{asset($newsone->images)}}>
            @endif
            <div class="card-body">
                <h4 class="card-title">{{$newsone->title}}</h4>
                <p class="card-text">{{$newsone->summary}}</p>
                <a class="btn btn-primary" href={{route('textnews', ['id' => $newsone->id])}} >@lang('messages.learnMore')</a>
            </div>
            <div class="card-footer text-muted">
                {{$newsone->created_at}}
            </div>
        </div>
    @empty
        <p>@lang('messages.noNews')</p>
    @endforelse
    </div>
    @endsection
