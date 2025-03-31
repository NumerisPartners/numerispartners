<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Training extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'individual_price',
        'company_price',
        'duration',
        'level',
        'is_active',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'individual_price' => 'decimal:2',
        'company_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Obtenir les sessions associées à cette formation.
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(TrainingSession::class);
    }

    /**
     * Obtenir les sessions à venir pour cette formation.
     */
    public function upcomingSessions()
    {
        return $this->sessions()
            ->where('start_date', '>=', now())
            ->where('is_confirmed', true)
            ->orderBy('start_date');
    }

    /**
     * Vérifier si la formation a des sessions à venir.
     */
    public function hasUpcomingSessions()
    {
        return $this->upcomingSessions()->count() > 0;
    }
}
