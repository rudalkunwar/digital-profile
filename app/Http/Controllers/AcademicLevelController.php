<?php

namespace App\Http\Controllers;

use App\Models\AcademicLevel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $academicLevel = AcademicLevel::all();
            return response()->json(['message' => 'Success',  $academicLevel], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed',  $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validate = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['message' => 'Failed', $validate->errors()], 400);
            } else {
                $academicLevelData = $validate->validated();
            }

            $academicLevel =    AcademicLevel::create($academicLevelData);

            return response()->json(['message' => 'Success', $academicLevel], 201);
        } catch (Exception $e) {

            return response()->json(['message' => 'Failed', $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $academicLevel = AcademicLevel::find($id);
            if (!$academicLevel) {
                return response()->json(['message' => 'Failed', 'Academic Level not found'], 404);
            }

            return response()->json(['message' => 'Success', $academicLevel], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $validate = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['message' => 'Failed', $validate->errors()], 400);
            } else {
                $academicLevelData = $validate->validated();
            }

            $academicLevel = AcademicLevel::find($id);

            if (!$academicLevel) {
                return response()->json(['message' => 'Failed', 'Academic Level not found'], 404);
            }

            $academicLevel->update($academicLevelData);

            return response()->json(['message' => 'Success', $academicLevel], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $academicLevel = AcademicLevel::find($id);

            if (!$academicLevel) {
                return response()->json(['message' => 'Failed', 'Academic Level not found'], 404);
            }

            $academicLevel->delete();

            return response()->json(['message' => 'Success', 'Academic Level deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed', $e->getMessage()], 500);
        }
    }
}
