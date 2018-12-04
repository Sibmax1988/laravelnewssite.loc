<div class="form-group">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label for="headnews" class="col-lg-1">@lang('messages.headnews')</label>
    <input type="text" class="form-control-lg col-lg-6" id="headnews" name="headnews" placeholder=@lang('messages.headnews')
           @if (isset ($news->id) )
           value="{{$news->title}}"
           @endif>

</div>

<div class="form-group">
    <label for="summary" class="col-lg-1" rows="2">@lang('messages.summary')</label>
    <textarea class="form-control-lg  col-lg-6" id="summary" name="summary" rows="2">@if (isset ($news->id)){{$news->summary}}@endif</textarea>
</div>


<div class="form-group  ">
    <label for="fulltext" class="col-lg-1">@lang('messages.fulltext')</label>
    <textarea class="form-control-lg  col-lg-6" id="fulltext" name="fulltext" rows="5" placeholder=@lang('messages.fulltext')>@if (isset ($news->id)){{$news->fullText}}@endif</textarea>
</div>

<div class="form-group">
    <label for="images" class="col-lg-1">@lang('messages.images')</label>
    <input type="text" class="form-control-lg col-lg-6" id="images" name="images" placeholder=@lang('messages.images')
    @if (isset ($news->id) )
            value="{{$news->images}}"
            @endif>
</div>


<button type="submit" class="btn btn-success">@lang('messages.publish')</button>

<a href="{{action('Admin\AdminController@index')}}" class="btn btn-info">@lang('messages.back')</a>


