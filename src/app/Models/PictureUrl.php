<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureUrl extends Model
{
    //Define que columnas pueden ser rellenadas
    //masivamenre
    protected $fillable = [
            'user_id',
            'picture_url',
            'title',
            'description'
    ];
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
}
