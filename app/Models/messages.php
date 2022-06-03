<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'msg',
        'outgoing_msg_id',
        'incoming_msg_id',
      
    
      
    ];
  
    public function proprietere(){return $this->belongsTo(User::class,'user_id');}
}
