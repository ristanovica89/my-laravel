<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Shipment extends Model
{
    use HasFactory;

    public const STATUS_UNASSIGNED   = 'unassigned';
    public const STATUS_ACTIVE    = 'active';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_PROBLEM   = 'problem';

    public const STATUSES = [
        self::STATUS_UNASSIGNED,
        self::STATUS_ACTIVE,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELLED,
        self::STATUS_PROBLEM,
    ];

    public const STATUS_COLORS = [
    self::STATUS_UNASSIGNED   => 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/40',
    self::STATUS_ACTIVE    => 'bg-accent/20 text-accent border border-accent/40',
    self::STATUS_COMPLETED => 'bg-green-500/20 text-green-400 border border-green-500/40',
    self::STATUS_CANCELLED => 'bg-black text-violet-400 border border-violet-500',
    self::STATUS_PROBLEM   => 'bg-red-600/30 text-red-500 border border-red-600', 
    ];

    protected $fillable = [
        'title',
        'from_city',
        'from_country',
        'to_city',
        'to_country',
        'price',
        'status',
        'details',
        'user_id',
        'client_id',
    ];

    public function setStatusAttribute($status): void
    {
        $status = strtolower(trim($status));

        if (!in_array($status, self::STATUSES)) {
            throw new \InvalidArgumentException("Invalid shipment status: {$status}");
        }
        $this->attributes['status'] = $status;
    }

    public function documents(): HasMany
    {
        return $this->hasMany(ShipmentDocument::class);
    }
}
