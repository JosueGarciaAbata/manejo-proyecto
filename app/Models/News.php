<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
        $basePath = 'assets/images/news/preview/';
        $imagePath = $basePath . $this->pre_img;
        
        if (file_exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        return asset('assets/images/news/preview/news_preview.jpg');
    }
    
    public function getResourceImgUrlAttribute()
    {
        $basePath = 'assets/images/news/';
        $imagePath = $basePath . $this->res_img;
        
        if (file_exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        return asset('assets/images/news/news_default.jpg');
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
