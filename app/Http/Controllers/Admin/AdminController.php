<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateRequest;
use App\Mail\NewsEmail;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Jobs\SendMessage;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.admin', ['news'=>News::orderBy('created_at','desc')]);

    }

    public function getNews(){
        $news = News::orderBy('created_at','desc')->get();
        return response()->json( $news, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createNews');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRequest $request)
    {
        //
        $news = new News;
        $news->title = $request->headnews;
        $news->summary = $request->summary;
        $news->fulltext = $request->fulltext;
        $news->images = $request->images;
        $news->save();

        SendMessage::dispatch();

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return bool
     */
    public function show($id)
    {
        //
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = News::find($id);
        return view('admin.editNews',compact('news', 'id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, $id)
    {
        //
        $news = News::find($id);
        $news->title = $request->heabnews;
        $news->title = $request->headnews;
        $news->summary = $request->summary;
        $news->fulltext = $request->fulltext;
        $news->images = $request->images;
        $news->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
   /* public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('admin');
    }*/

    public function destroy(Request $request)
    {

        $news = News::find($request->input('id'));
        $news->delete();
        return $this->getNews();

    }


}
