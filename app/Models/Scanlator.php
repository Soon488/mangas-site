<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanlator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'desc',
        'leader',
    ];

    public static function getIndexScans()
    {
        return Scanlator::limit(20)
                            ->paginate();
    }

    public function mangas()
    {
        return $this->hasMany(Manga::class, 'scanlator');
    }
}
