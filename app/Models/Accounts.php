<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'ar_accounts';
    protected $primaryKey = 'id' ;

    protected $fillable = [
        'full_name', 'email', 'contact_no', 'address'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'accounts_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
