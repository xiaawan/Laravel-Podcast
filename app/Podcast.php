<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use SoftDeletes;
    protected $hidden = ['deleted_at'];
    protected $fillable = ['name', 'description', 'marketing_url', 'feed_url', 'image', 'status'];
}
