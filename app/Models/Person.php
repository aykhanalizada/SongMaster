<?php

namespace App\Models;

use GuzzleHttp\BodySummarizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table="people";
    protected $fillable=["id","first_name","last_name","father_name","birth_date","civil_status","created_at","updated_at"];

    public function view()
    {
    }
}
