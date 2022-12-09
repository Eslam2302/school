<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ticket extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'priority',
        'type',
        'subject',
        'status',
        'details',
        'image',
    ];

    protected $appends = ['image_path'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs()
        ->setDescriptionForEvent(fn(string $eventName) => "Ticket {$eventName}")
        ->useLogName('Ticket');
        // Chain fluent methods for configuration options
    }

    public function getImagePathAttribute() {

        return asset('uploads/ticket_images/' . $this->image);

    }


    public function user() {

        return $this->belongsTo(User::class);

    }

}
