<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingSession extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'training_id',
        'title',
        'reference',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'address',
        'max_participants',
        'available_seats',
        'is_confirmed',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_confirmed' => 'boolean',
    ];

    /**
     * Obtenir la formation associée à cette session.
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Obtenir les inscriptions associées à cette session.
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(TrainingRegistration::class);
    }

    /**
     * Obtenir les inscriptions confirmées associées à cette session.
     */
    public function confirmedRegistrations()
    {
        return $this->registrations()->where('status', 'confirmed');
    }

    /**
     * Vérifier si la session est complète.
     */
    public function isFull(): bool
    {
        return $this->available_seats <= 0;
    }

    /**
     * Vérifier si la session est à venir.
     */
    public function isUpcoming(): bool
    {
        return $this->start_date >= now()->startOfDay();
    }

    /**
     * Vérifier si la session est en cours.
     */
    public function isOngoing(): bool
    {
        return $this->start_date <= now()->startOfDay() && $this->end_date >= now()->startOfDay();
    }

    /**
     * Vérifier si la session est terminée.
     */
    public function isPast(): bool
    {
        return $this->end_date < now()->startOfDay();
    }

    /**
     * Obtenir la durée de la session en jours.
     */
    public function getDurationInDays(): int
    {
        return $this->start_date->diffInDays($this->end_date) + 1;
    }

    /**
     * Décrémenter le nombre de places disponibles.
     */
    public function decrementAvailableSeats(): bool
    {
        if ($this->available_seats > 0) {
            $this->decrement('available_seats');
            return true;
        }
        return false;
    }

    /**
     * Incrémenter le nombre de places disponibles.
     */
    public function incrementAvailableSeats(): void
    {
        if ($this->available_seats < $this->max_participants) {
            $this->increment('available_seats');
        }
    }

    /**
     * Mettre à jour le nombre de places disponibles.
     */
    public function updateAvailableSeats(): void
    {
        $confirmedCount = $this->confirmedRegistrations()->count();
        $this->available_seats = $this->max_participants - $confirmedCount;
        $this->save();
    }
}
