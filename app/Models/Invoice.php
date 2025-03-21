<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'ar_invoices';

    protected $fillable = [
        'accounts_id','status', 'terms', 'start_date', 'due_date', 'grand_total',
    ];

    public function account()
    {
        return $this->belongsTo(Accounts::class,'accounts_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
