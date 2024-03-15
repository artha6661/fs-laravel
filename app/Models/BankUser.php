<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankUser extends Model
{
    use HasFactory;
    protected $table = "bankuser";

    protected $primarykey = "id";
    protected $fillable = [
        "name",
        "date_of_birth",
        "email",
        "phone_number",
        "account_number"
    ];
}
