<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events'; 
    protected $primaryKey = 'id_eve';
    
    protected $fillable = [
        'tit_eve',
        'des_eve',
        'fec_pub_eve',
        'fec_ini_eve',
        'fec_fin_eve',
        'tag_eve',
        'pre_img',
        'res_img',
        'dir_eve'
    ];
    
    protected $dates = ['deleted_at', 'fec_pub_eve', 'fec_ini_eve', 'fec_fin_eve'];
    
    public function getPreviewImgUrlAttribute()
    {
        $basePath = 'images/event_images/';
        $imagePath = $basePath . $this->pre_img;
        
        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::url($imagePath);
        }
        return asset('assets/images/event/preview/example_preview_event.jpg');
    }
    
    public function getResourceImgUrlAttribute()
    {
        $basePath = 'images/event_images/';
        $imagePath = $basePath . $this->res_img;
        
        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::url($imagePath);
        }
        return asset('assets/images/event/example_event.jpg');
    }

    public function scopeSearch($query,$term){
        $term="%$term%";
        $query->where(function($query) use ($term){
            $query->where('tit_eve','like',$term);
        });
    }
    
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->fec_ini_eve)->format('d F, Y h:i A');
    }
    
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->fec_fin_eve)->format('d F, Y h:i A');
    }
    
    public function getStartTimeAttribute()
    {
        return Carbon::parse($this->fec_ini_eve)->format('h:i A');
    }
    
    public function getEndTimeAttribute()
    {
        return Carbon::parse($this->fec_fin_eve)->format('h:i A');
    }

    public function getParagraphsAttribute()
    {
        $content = str_replace('<br>', "\n", $this->des_eve);
        return preg_split("/\r\n|\n|\r/", $content);
    }
}
