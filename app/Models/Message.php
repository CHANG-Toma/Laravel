<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected function cast() : array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
