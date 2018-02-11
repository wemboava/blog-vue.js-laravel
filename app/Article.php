<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'title', 'description', 'content', 'date']

    protected $dates = ['deleted_at'];
}
