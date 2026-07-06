<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureUrl extends Model
{
    protected $table = 'pictures_url';
    //Define que columnas pueden ser rellenadas
    //masivamenre
    protected $fillable = [
        'user_id',
        'picture_url',
        'title',
        'description'
    ];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
