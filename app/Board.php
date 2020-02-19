<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
