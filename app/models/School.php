<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class School extends Model{
    protected $table = 'schools';
    protected $fillable = [
        'name',
        'address',
        'logo'
    ];
    public function teachers(){
        return $this->hasMany(Teacher::class, 'school_id');
    }
}