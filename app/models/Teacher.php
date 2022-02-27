<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model{
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'gender',
        'school_id'	,
        'avatar',
        'major'	,
        'salary',
        'birthday'
    ];
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
?>