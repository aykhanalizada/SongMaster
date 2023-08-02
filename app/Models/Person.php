<?php

namespace App\Models;

use GuzzleHttp\BodySummarizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Person extends Model
{
    use HasFactory;
    protected $table="people";
    protected $fillable=["id","first_name","last_name","father_name","birth_date","civil_status","created_at","updated_at"];

    public function view()
    {
    }
    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->locale('az')->isoFormat('LL');

    }


    public function getFormattedBirthDateAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->format('Y-m-d');
    }


    public function getCivilStatusAttribute($value)
    {
        return $value == '1' ? 'Evli' : 'Subay';
    }


    public function setCivilStatusAttribute($value)
{
    $this->attributes['civil_status'] = $value == 'Evli' ? '1' : '0';
}




}
