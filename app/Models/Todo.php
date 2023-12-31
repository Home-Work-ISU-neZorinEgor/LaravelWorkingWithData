<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'user_id'];

    public function users()
    {
        return User::all();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}