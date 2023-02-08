<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'team_id', 'content'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
