<?php

namespace App\Http\Controllers;

use App\Commentator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function publishComment (Request $request){
        $commentator = new Commentator();
        $commentator->newsId = $request->input('newsId');
        $commentator->commenterName = $request->input('commentatorName');
        $commentator->commentText = $request->input('textComment');

        if (!$commentator->save()) {
            return response()->json(['comResult' => ''], 200);

        }else {
            return $this->getComment($request);
        }
    }


    public function getComment(Request $request){

        $comments = Commentator::where('newsId','=', $request->input ('newsId'))
            ->orderby('created_at','desc')
            ->get();
        return response()->json( $comments, 200);
    }

}
