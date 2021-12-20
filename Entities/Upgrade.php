<?php

namespace Modules\Upgrade\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upgrade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function upgrade()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
