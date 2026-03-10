<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assigned_to',
        'title',
        'description',
        'status',
        'priority',
        'closed_at'
    ];

    protected $casts = [
        'closed_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Creator of the incident
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Assigned worker/supervisor
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}