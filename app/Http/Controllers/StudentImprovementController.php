<?php

namespace App\Http\Controllers;

use App\Models\StudentImprovement;
use Illuminate\Http\Request;

class StudentImprovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'present_class' => 'required'
        ]);
        if ($validator->fails()) {
            $result['response'] = 'error';
            $result['message'] = $validator->errors();
            return response()->json($result);
        }
        $saveData = StudentImprovement::save_student_improve($request);
        if ($saveData['response'] == 'success') {
            $result = [
                'message' => 'Improvement saved successfully.',
                'response' => 'success',
            ];
        } else {
            $result = [
                'response' => 'error',
                'message' => 'Failed.',
            ];
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentImprovement  $studentImprovement
     * @return \Illuminate\Http\Response
     */
    public function show(StudentImprovement $studentImprovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentImprovement  $studentImprovement
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentImprovement $studentImprovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentImprovement  $studentImprovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentImprovement $studentImprovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentImprovement  $studentImprovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentImprovement $studentImprovement)
    {
        //
    }
}
