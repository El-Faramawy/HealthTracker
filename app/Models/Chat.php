<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'chat';

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
