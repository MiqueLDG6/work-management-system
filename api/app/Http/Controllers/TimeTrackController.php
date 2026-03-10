<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTrack;
use Illuminate\Support\Facades\Auth;

class TimeTrackController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return TimeTrack::all();
        }

        return $user->timeTracks;
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'fecha' => 'required|date',
            'entrada' => 'nullable|date_format:H:i',
            'salida' => 'nullable|date_format:H:i',
            'tipo' => 'required|string',
        ]);

        $data['user_id'] = $user->id;

        $timeTrack = TimeTrack::create($data);

        return response()->json($timeTrack, 201);
    }

    public function show($id)
    {
        $timeTrack = TimeTrack::findOrFail($id);
        $user = Auth::user();

        if ($user->role->name !== 'admin' && $timeTrack->user_id !== $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return $timeTrack;
    }

    public function update(Request $request, $id)
    {
        $timeTrack = TimeTrack::findOrFail($id);
        $user = Auth::user();

        if ($user->role->name !== 'admin' && $timeTrack->user_id !== $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $data = $request->only(['fecha', 'entrada', 'salida', 'tipo']);
        $timeTrack->update($data);

        return $timeTrack;
    }

    public function destroy($id)
    {
        $timeTrack = TimeTrack::findOrFail($id);
        $user = Auth::user();

        if ($user->role->name !== 'admin' && $timeTrack->user_id !== $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $timeTrack->delete();

        return response()->json(['message' => 'Registro eliminado']);
    }
}