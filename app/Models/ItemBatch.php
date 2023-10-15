<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'batch_no',
        'expiration_date',
        'stock',
    ];
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
