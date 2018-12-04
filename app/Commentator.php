<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentator extends Model
{
    //
    protected $table = 'comments';

    protected $primaryKey = 'id';


    protected $fillable = [
        'newsId', 'commenterName', 'commentText',
    ];

}
