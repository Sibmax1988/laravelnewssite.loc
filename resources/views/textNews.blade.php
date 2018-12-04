@extends('layouts.template')



@section('content')
    <div>
        <h3 class="display-4">{{$news->title}}</h3>
        <div class="col-lg-5">
            @if ($news->images)
                <img class="rounded img-responsive"  alt="image"src={{asset($news->images)}} >@endif
        </div>
        <div>
           <p class="lead"> {{$news->fullText}}</p>
        </div>
    </div>
    <br>
    <div class="display" id="comments">
        <comments-component news-id = "{{$news->id}} "
                            comment = "@lang('messages.comment')">

        </comments-component>
    </div>
@endsection
