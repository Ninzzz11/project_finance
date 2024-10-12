<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReceivable extends Model
{
    /** @use HasFactory<\Database\Factories\AccountReceivableFactory> */
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer',
        'payment_terms',
        'amount'
    ];

    

}
