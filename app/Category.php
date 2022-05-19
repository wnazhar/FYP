<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $guarded=[];

    protected $primarykey='categoryId';

    protected $fillable = [
        'categoryName', 'categoryPlan', 'categoryPrice', 'categoryMedia', 'categoryBoost',
    ];
    
}
