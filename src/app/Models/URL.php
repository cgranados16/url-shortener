<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'originalURL', 'code' 
    ];

    protected $hidden = [
        'id','updated_at', 'code'
    ];

    protected $casts = [
        'created_at' => 'datetime:M d, Y, h:i A',
    ];

    public function getShortURLAttribute(){
        return url('/'.$this->code);
    }

    protected $appends = ['shortURL'];
    protected $table = 'urls';
}
