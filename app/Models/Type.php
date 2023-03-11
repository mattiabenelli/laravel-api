<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Project;


class Type extends Model
{
    protected $fillable = ['name','slug'];
    
    use HasFactory;

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function project(){
        return $this->hasMany(Project::class);
    }

}
