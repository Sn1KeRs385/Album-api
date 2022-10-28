<?php

namespace App\Models\Traits\Relations;


use App\Models\UserCode;
use App\Models\UserIdentifier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Collection<int, UserIdentifier> $identifiers
 * @property Collection<int, UserCode> $codes
 */
trait UserRelations
{
    public function identifiers(): HasMany
    {
        return $this->hasMany(UserIdentifier::class);
    }

    public function codes(): HasMany
    {
        return $this->hasMany(UserCode::class);
    }
}
