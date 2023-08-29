<?php

namespace App\Models;

// Sluggable
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

//     protected $fillable = [
//         'title',
//         'excerpt',
//         'body'
//     ];

    protected $guarded = ['id'];
    protected $with = ['categories', 'author'];

    public function scopeFilter($query, array $filters){
        // Perlu dirapikan
        // if(request('search')){
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }
        
        // $search mengambil nilai dari parameter when $filters['search']
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('title', 'like', '%'. $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('categories', fn($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use($author){
                return $query->where('username', $author);
            });
        });
    }

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}


