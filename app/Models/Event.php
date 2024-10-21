<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events'; 
    protected $primaryKey = 'id_eve';

    protected $fillable = [
        'tit_eve',
        'des_eve',
        'fec_pub_eve',
        'fec_eve',
        'tag_eve'
    ];

    
}
