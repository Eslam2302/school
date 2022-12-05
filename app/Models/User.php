<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    use LogsActivity;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'email',
        'password',
        'date_of_birth',
        'date_of_join',
        'gender',
        'address',
        'phone',
        'parent_name',
        'parent_number',
        'image',
    ];

    protected $appends = ['image_path'];




    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $eventName) => "User {$eventName}")
        ->useLogName('User');
        // Chain fluent methods for configuration options
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute($value) {

        return ucfirst($value);

    }

    public function getSecondNameAttribute($value) {

        return ucfirst($value);

    }

    public function geLastNameAttribute($value) {

        return ucfirst($value);

    }

    public function getImagePathAttribute() {

        return asset('uploads/user_images/' . $this->image);

    }

    public function tickets() {

        return $this->hasMany(ticket::class);

    } // end of product function

}
