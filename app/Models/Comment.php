<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        // caching was in min before but now done in seconds
        // to cache something for 1 hour = 60 min
        // now 3600 seconds
        return cache()->remember('key', 3600, function () {
            return $this->belongsTo(User::class);
        });

        // you could use the now()-addHour() which will be converted to seconds
    }
}
