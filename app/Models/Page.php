<?php

namespace App\Models;

use App\Base\SluggableModel;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QCod\ImageUp\HasImageUploads;

class Page extends SluggableModel
{
    use HasFactory, HasImageUploads;
    
    protected $dates = ['published_at'];

    protected static $imageFields = [
        'thumbnail' => [
            'width' => 800,
            'placeholder' => '/images/placeholder.jpg',
        ]
    ];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now())->orderBy('published_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id', 'id');
    }

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('page', ['pSlug' => $this->slug]);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
