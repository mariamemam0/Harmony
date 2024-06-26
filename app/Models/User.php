<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lifestyle\Habit;
use App\Models\Lifestyle\Memory;
use App\Models\Lifestyle\Note;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function habits()
    {
        return $this->hasMany(Habit::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

<<<<<<< HEAD
    public function memories()
    {
        return $this->hasMany(Memory::class);
=======
    public function surveys() 
    {
        return $this->belongsToMany(Survey::class);
>>>>>>> upstream/main
    }
}
