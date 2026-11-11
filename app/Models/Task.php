<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'user_id', 'name', 'description', 'is_completed', 'start_at', 'expired_at'];
    protected function casts(): array
    {
        return [
            'is_completed' => 'integer',
            'start_at' => 'datetime:Y-m-d H:i:s',
            'expired_at' => 'datetime:Y-m-d H:i:s'
        ];
    }
    
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
