<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentDocument extends Model
{
    protected $fillable = [
        'shipment_id',
        'path',
        'original_name',
        'mime_type',
        'size',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function getFileColorAttribute(): string
    {
        $colors = [
            'pdf'  => 'bg-red-500/20 text-red-400 border-red-500/40',
            'doc'  => 'bg-blue-500/20 text-blue-400 border-blue-500/40',
            'docx' => 'bg-blue-500/20 text-blue-400 border-blue-500/40',
            'jpg'  => 'bg-green-500/20 text-green-400 border-green-500/40',
            'jpeg' => 'bg-green-500/20 text-green-400 border-green-500/40',
            'png'  => 'bg-green-500/20 text-green-400 border-green-500/40',
            'webp' => 'bg-green-500/20 text-green-400 border-green-500/40',
        ];

        $ext = strtolower(pathinfo($this->original_name, PATHINFO_EXTENSION));

        return $colors[$ext] ?? 'bg-gray-500/20 text-gray-400 border-gray-500/40';
    }

    public function getFileExtensionAttribute(): string
    {
        return strtoupper(pathinfo($this->original_name, PATHINFO_EXTENSION));
    }

    public function getFileSizeKbAttribute(): string
    {
        return number_format($this->size / 1024, 1) . ' KB';
    }
}
