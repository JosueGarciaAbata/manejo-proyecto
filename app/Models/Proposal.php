<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;

    protected $table = 'proposals';
    protected $primaryKey = 'id_pro'; 

    protected $fillable = [
        'tit_pro',
        'des_pro',
        'fec_inc_pro',
        'tags_pro',
        'id_can_pro',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($proposal) {
            if (!Candidate::find($proposal->id_can_pro)) {
                throw new \Exception("Invalid candidate ID.");
            }
        });
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_can_pro');
    }
}
