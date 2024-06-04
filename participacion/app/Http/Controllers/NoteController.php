<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId) {
            // Filtrar las notas por la categoría seleccionada
            $notes = Note::where('category_id', $categoryId)->with('category')->get();
        } else {
            // Obtener todas las notas
            $notes = Note::with('category')->get();
        }

        $categories = Category::all();
        return view('notes.index', compact('notes', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Note::create($request->all());
        return redirect()->route('notes.index');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $categories = Category::all();
        return view('notes.edit', compact('note', 'categories'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}
