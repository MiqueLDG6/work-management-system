<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    // GET /api/incidents
    public function index()
    {
        return response()->json(
            Incident::with(['user', 'assignedUser'])->get()
        );
    }

    // POST /api/incidents
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'priority' => 'in:low,medium,high'
        ]);

        $incident = Incident::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'] ?? 'medium',
            'status' => 'open'
        ]);

        return response()->json($incident, 201);
    }

    // GET /api/incidents/{id}
    public function show($id)
    {
        $incident = Incident::with(['user', 'assignedUser'])->findOrFail($id);

        return response()->json($incident);
    }

    // PUT /api/incidents/{id}
    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);

        $incident->update($request->only([
            'title',
            'description',
            'status',
            'priority',
            'assigned_to',
            'closed_at'
        ]));

        return response()->json($incident);
    }

    // DELETE /api/incidents/{id}
    public function destroy(Incident $incident)
    {
        return response()->json($incident);
    }
}