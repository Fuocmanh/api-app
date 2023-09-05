<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = "fbc_members";
    protected $fillable = ["username", "password", "name", "email", "phone", "address", "point", "status", "verification_code", "role_id"];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
