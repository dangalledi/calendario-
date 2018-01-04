<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /**
     * @var string
     */
    protected $table = 'evento';

    /**
     * @var [tipe]
     */
    protected $fillable = [
      'title','start','end','color'
    ];
}
