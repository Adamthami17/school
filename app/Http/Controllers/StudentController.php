<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    // Liste des étudiants
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('create');
    }

    // Enregistrement en base de données
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|numeric',
            'section' => 'required',
            'image'   => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;

        Student::create($validateData);

        return redirect('/students')->with('success', 'Étudiant ajouté avec succès.');
    }

    // Détails d'un étudiant
    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    // Formulaire de modification
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    // Mise à jour en base de données
    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|numeric',
            'section' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            // supprimer l'ancienne image
            File::delete(public_path('image/' . $student->image));

            $image = $request->file('image');
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move('image/', $profileImage);
            $validateData['image'] = $profileImage;
        } else {
            unset($validateData['image']);
        }

        $student->update($validateData);

        return redirect('/students')->with('success', 'Étudiant modifié avec succès.');
    }

    // Suppression
    public function destroy(Student $student)
    {
        File::delete(public_path('image/' . $student->image));
        $student->delete();

        return redirect('/students')->with('success', 'Étudiant supprimé avec succès.');
    }
}
