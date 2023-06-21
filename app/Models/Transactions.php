<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Transactions extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['uuid','paidAmount','Currency','parentEmail','statusCode','paymentDate','parentIdentification'];
    protected $casts = [];
    protected $hidden = [
        'created_at',
        'update_at',
        'deleted_at'
    ];

    public function User(){
        return $this->belongsTo(User::class,'parentEmail','email');
    }

    protected static function booted()
    {
        static::creating(function($model){
            $model->uuid = Str::random(8) . '-' . Str::random(4). '-' . Str::random(4). '-' . Str::random(4). '-' . Str::random(12);
        });
    }
}
