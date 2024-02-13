<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'Newsletter'; // Define the custom table name
    protected $fillable = ['email', 'status']; // Define fillable properties

    // Optionally, you can define timestamps to manage created_at and updated_at columns
    public $timestamps = true;
}