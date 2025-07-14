<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult; // Import Model yang baru kita buat
use Illuminate\Support\Facades\Log; // Opsional: untuk logging

class QuizController extends Controller
{
    public function saveData(Request $request)
    {
        try {
            // Validasi data yang masuk (opsional tapi sangat direkomendasikan)
            $validatedData = $request->validate([
                'timestamp' => 'required|date',
                'answers' => 'required|array',
                'score' => 'required|integer',
            ]);

            // Buat entri baru di database
            $quizResult = QuizResult::create([
                'timestamp' => $validatedData['timestamp'],
                'answers' => json_encode($validatedData['answers']), // Simpan sebagai JSON string
                'score' => $validatedData['score'],
            ]);

            // Opsional: Log sukses
            Log::info('Quiz data saved successfully:', ['id' => $quizResult->id]);

            return response()->json(['message' => 'Data berhasil disimpan ke server.', 'data' => $quizResult], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani error validasi
            Log::error('Validation error when saving quiz data:', ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Tangani error lainnya
            Log::error('Error saving quiz data:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.', 'error' => $e->getMessage()], 500);
        }
    }
}