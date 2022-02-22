<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'title',
        'description',
        'user_id',
    
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'title_slug' => [
                'source' => 'title'
            ]
        ];
    }
}


