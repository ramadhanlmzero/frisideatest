<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'table_user';
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
