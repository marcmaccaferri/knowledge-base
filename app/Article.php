<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['User_Id', 'category_id', 'Article_Title', 'Article_Body'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
