<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'logo', 'category', 'is_archived'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'club_id');
    }
}