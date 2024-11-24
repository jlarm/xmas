<?php

namespace App\Models;

use App\Enum\ItemStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'store',
        'size',
        'color',
        'link',
        'price',
        'purchased',
        'parent',
        'grandma',
    ];

    public function kid(): BelongsTo
    {
        return $this->belongsTo(Kid::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('main')
            ->format('webp')
            ->nonQueued();
    }

    public function purchaseStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->purchased ? ItemStatus::Purchased : (
                $this->created_at->gt(now()->subWeek()) ? ItemStatus::New : null
            ),
        );
    }

    protected function casts(): array
    {
        return [
            'purchased' => 'boolean',
        ];
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
        );
    }
}
