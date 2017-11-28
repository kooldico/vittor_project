<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected  $guarded=['id'];

    use SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'slug',
        'status'
        ];

    protected $date = ['deleted_at'];

    protected $table="blog";


    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
