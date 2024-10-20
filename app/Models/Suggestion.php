<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;

    protected $table = 'suggestions'; 
    protected $primaryKey = 'id_sug';

    protected $fillable = [
        'tit_sug',
        'des_sug',
        'id_vot_sug'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($suggestion) {
            if (!Voter::find($suggestion->id_vot_sug)) {
                throw new \Exception("Invalid voter id");
            }
        });
        
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class, 'id_vot_sug');
    }

}
