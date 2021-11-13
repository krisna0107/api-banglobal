<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banlist extends Model
{
    protected $table = 'banlist';
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
