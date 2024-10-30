<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model
{
    use SoftDeletes;

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
        $basePath = 'assets/images/event/preview/';
        $imagePath = $basePath . $this->pre_img;
        
        if (file_exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        return asset('assets/images/event/preview/example_preview_event.jpg');
    }
    
    public function getResourceImgUrlAttribute()
    {
        $basePath = 'assets/images/event/';
        $imagePath = $basePath . $this->res_img;
        
        if (file_exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        return asset('assets/images/event/example_event.jpg');
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
