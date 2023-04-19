<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class School extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'table_school';
    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function usereducation()
    {
        return $this->hasMany(UserEducation::class);
    }
}
