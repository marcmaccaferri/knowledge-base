<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['User_Id', 'Article_Category', 'Article_Sub_Category', 'Article_Title', 'Article_Body'];
}
