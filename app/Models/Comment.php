<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'event_id', // Foreign key linking to the events table
        'name',
        'email',
        'comment_text',
    ];

    // Define the relationship with the Event model
    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }
}
