<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news'; 
    protected $primaryKey = 'id_new';
    
    protected $fillable = [
        'tit_new',
        'des_new',
        'fec_pub_new',
        'tag_new',
        'pre_img',
        'res_img',
    ];
    
    protected $dates = ['deleted_at', 'fec_pub_new'];
    
    public function getPreviewImgUrlAttribute()
    {
        $basePath = 'images/news_images/';
        $imagePath = $basePath . $this->pre_img;
        
        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::url($imagePath);
        }
        return asset('assets/images/news/preview/news_preview.jpg');
    }
    
    public function getResourceImgUrlAttribute()
    {
        $basePath = 'images/news_images/';
        $imagePath = $basePath . $this->pre_img;
        
        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::url($imagePath);
        }
        return asset('assets/images/news/news_default.jpg');
    }

    public function scopeSearch($query,$term){
        $term="%$term%";
        $query->where(function($query) use ($term){
            $query->where('tit_new','like',$term);
        });
    }

    public function getFormattedFecPubNewAttribute()
    {
        return Carbon::parse($this->fec_pub_new)->format('d M, Y');
    }

    public function getTagsArrayAttribute()
    {
        return explode(',', $this->tag_new);
    }

    public function getParagraphsAttribute()
    {
        $content = str_replace('<br>', "\n", $this->des_new);
        return preg_split("/\r\n|\n|\r/", $content);
    }

}
