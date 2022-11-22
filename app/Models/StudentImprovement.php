<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentImprovement extends Model
{
    use HasFactory;

    protected $table = 'sub_menus';
    protected $fillable = ['from_class', 'from_year', 'to_year', 'to_class', 'student_id'];

    public static function save_student_improve($request)
    {
        $saveData = StudentImprovement::create([
            'from_class' => $request->present_class,
            'from_year' => $request->present_year,
            'to_class' => $request->improve_class,
            'to_year' => $request->improve_year,
            'student_id' => 1, // student table id
        ]);
        if (!empty($saveData)) {
            $result = [
                'message' => 'Student improve saved successfully.',
                'response' => 'success',
            ];
        } else {
            $result = [
                'response' => 'error',
                'message' => 'Failed.',
            ];
        }
        return $result;
    }
}
