<?php

namespace App\Modules\Note\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public const SORT_DATE_ASC = 'date_asc';
    public const SORT_DATE_DESC = 'date_desc';
    public const SORT_TITLE_ASC = 'title_asc';
    public const SORT_TITLE_DESC = 'title_desc';

    public const AVAILABLE_SORTS = [
        self::SORT_DATE_ASC,
        self::SORT_DATE_DESC,
        self::SORT_TITLE_ASC,
        self::SORT_TITLE_DESC,
    ];

    /**
     * @param Builder $query
     * @param string|null $status
     * @return Builder
     */
    public function scopeFilterByStatus(Builder $query, ?string $status): Builder
    {
        return $query->when($status, fn($q) => $q->where('status', $status));
    }

    /**
     * @param Builder $query
     * @param string|null $from
     * @param string|null $to
     * @return Builder
     */
    public function scopeFilterByDateRange(Builder $query, ?string $from, ?string $to): Builder
    {
        return $query
            ->when($from, fn($q) => $q->whereDate('created_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('created_at', '<=', $to));
    }

    /**
     * @param Builder $query
     * @param string|null $searchTerm
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?string $searchTerm): Builder
    {
        return $query->when($searchTerm, function($q) use ($searchTerm) {
            $q->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        });
    }

    /**
     * @param Builder $query
     * @param string|null $sort
     * @return Builder
     */
    public function scopeApplySort(Builder $query, ?string $sort): Builder
    {
        return $query->when($sort, function($q) use ($sort) {
            switch ($sort) {
                case self::SORT_DATE_ASC:
                    return $q->orderBy('created_at', 'asc');
                case self::SORT_DATE_DESC:
                    return $q->orderBy('created_at', 'desc');
                case self::SORT_TITLE_ASC:
                    return $q->orderBy('title', 'asc');
                case self::SORT_TITLE_DESC:
                    return $q->orderBy('title', 'desc');
                default:
                    return $q->orderBy('created_at', 'desc');
            }
        }, fn($q) => $q->orderBy('created_at', 'desc'));
    }
}
