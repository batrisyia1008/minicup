<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitorShopeeTicket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uniq',
        'slug',
        'code',
        'ticketType',
        'status',
    ];
}
