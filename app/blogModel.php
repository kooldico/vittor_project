<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogModel extends Model
{
     protected  $guarded=['id'];

    use SoftDeletes;

    protected $fillable = [
        'title',
        'user_id'
        'description',
        'slug',
        'status'

    protected $date = ['deleted_at'];

    protected $table="blog";


    public function product()
    {
        return $this->belongsTo('App\User');
    }



}
