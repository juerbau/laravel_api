<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Todo; // Annahme: Sie haben ein Todo-Model

class TodoController extends Controller
{
/**
* Alle Todos des authentifizierten Benutzers abrufen (READ)
*/
public function index(Request $request)
{
// Beispiel: Nur die Todos des aktuell eingeloggten Benutzers zurückgeben
$todos = $request->user()->todos()->latest()->get();

return response()->json($todos);
}

/**
* Ein neues Todo speichern (CREATE)
*/
public function store(Request $request)
{
    $task = $request->input('task', 'Unbenannte Aufgabe');

    return response()->json([
        'message' => 'Aufgabe erfolgreich erstellt.',
        'task' => $task,
        'user_id' => $request->user()->id,
    ], 201);
}



/**
* Ein spezifisches Todo aktualisieren (UPDATE)
*/
public function update(Request $request, int $id) // Oder $id durch das Model ersetzen: Todo $todo
{
// 1. Validierung
$validatedData = $request->validate([
'task' => 'sometimes|required|string|max:255',
'is_completed' => 'sometimes|boolean',
]);

// 2. Todo suchen und sicherstellen, dass es dem User gehört
$todo = $request->user()->todos()->findOrFail($id);

// 3. Aktualisierung
$todo->update($validatedData);

return response()->json([
'message' => 'Aufgabe erfolgreich aktualisiert.',
'todo' => $todo,
]);
}

/**
* Ein spezifisches Todo löschen (DELETE)
*/
public function destroy(Request $request, int $id)
{
$todo = $request->user()->todos()->findOrFail($id);

$todo->delete();

return response()->json(['message' => 'Aufgabe erfolgreich gelöscht.'], 204); // 204: No Content
}
}
