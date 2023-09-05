<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table ="fbc_roles";
    protected $fillable = ["name"];
    public function members()
    {
        return $this->hasMany(Member::class, 'role_id', 'id');
    }
}
