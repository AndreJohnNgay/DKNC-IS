<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use App\Models\User;


class ItemHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'item',
        'updated_on',
        'updated_by',
        'action',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function item() {
        return $this->belongsTo(Inventory::class);
    }
}
