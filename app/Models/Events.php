<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    // Event model
    protected $fillable = [
        'EventName',
        'Tags',
        'Categorie',
        'EventBanner',
        'EventLocation',
        'BookingLink',
        'EventOwner',
        'eventDate',
        'Description',
        'colorCode',
    ];
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where('EventName', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Tags', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Categorie', 'like', '%' . $filters['search'] . '%')
                ->orWhere('EventOwner', 'like', '%' . $filters['search'] . '%');
        }
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'EventOwner');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
