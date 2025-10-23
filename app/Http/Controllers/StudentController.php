<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\UpdateRequest;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = User::query()
            ->paginate(21);

        return view('student.index', compact('students'));
    }

    public function show(User $student): View
    {
        return view('student.show', compact('student'));
    }

    public function edit(): View
    {
        $student = auth()->user();

        return view('student.edit', compact('student'));
    }
    
    public function update(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        StudentService::update(auth()->user(), $data);

        return redirect()->route('students.dashboard');
    }

    public function dashboard(): View
    {
        $student = auth()->user();
        
        return view('student.dashboard', compact('student'));
    }
}
