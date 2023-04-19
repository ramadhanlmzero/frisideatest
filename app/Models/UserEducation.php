<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserEducation extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'table_user_education';
    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usereducationmajor()
    {
        return $this->belongsTo(UserEducationMajor::class);
    }

    public function usereducationdegree()
    {
        return $this->belongsTo(UserEducationDegree::class);
    }
}
