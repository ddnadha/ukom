<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
