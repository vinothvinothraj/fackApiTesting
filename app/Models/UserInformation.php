<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = 'user_information'; 

    protected $fillable = [
        'user_id',         
        'first_name',      
        'last_name',       
        'nic_id',          
        'gender',    
        'user_type',     
        'description',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
