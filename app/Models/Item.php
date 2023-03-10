<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id',
        'ware_id',
        'price',
        'quantity',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function ware()
    {
        return $this->belongsTo(Ware::class);
    }
}
