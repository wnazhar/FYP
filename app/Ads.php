<?php

namespace App;

use App\User;
use App\Images;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table='ads';
    protected $guarded=[];

    protected $primaryKey='adsId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adsTitle', 'adsCompany', 'adsCaption', 'adsStatus', 'date', 'timeslot', 'custId', 'categoryId', 'receipt',
    ];

    public function user(){
        return $this->belongsTo(User::class,'custId');
    }
    public function media(){
        return $this->hasMany(Media::class,'mediaId');
    }

    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
    
}
 