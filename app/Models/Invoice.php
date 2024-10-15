<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer', 'invoice_no', 'terms', 'start_date', 'due_date', 'grand_total'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
