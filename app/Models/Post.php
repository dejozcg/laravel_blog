<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false){
            $query
            ->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }
        $query->when($filters['category'] ?? false, fn($guery, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );
        /*
        ovo je:
         if($filters['search'] ?? false){
            $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        isto sto i ovo:
         $query->when($filters['search'] ?? false, fn($guery, $search) => 
            $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%'));


            -- ovo je isto
             $query->when($filters['category'] ?? false, fn($guery, $category) => 
            $query
                ->whereExists(fn($query) => 
                    $query->from('categories')
                        ->whereColumn('categories.id', 'posts.category_id')
                        ->where('categories.slug', $category))
        );
        -- sa ovim
                $query->when($filters['category'] ?? false, fn($guery, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );
        */
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
