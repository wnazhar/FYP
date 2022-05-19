<?php

namespace App;

use App\Ads;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'adsId','media', 'mediaId',
    ];

    protected $guarded=[];

    public function ads(){
        return $this->belongsTo(Ads::class);
    }
}
