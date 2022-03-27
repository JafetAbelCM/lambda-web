<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Repositories\Firebase\Student;
use App\Repositories\Firebase\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * @var Student
     */
    private $student;

    /**
     * @var University
     */
    private $university;

    /**
     * @param Student $student
     */
    public function __construct(Student $student, University $university)
    {
        $this->student = $student;
        $this->university = $university;
    }

    /**
     * Show the students list.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $owner = auth()->user()->id;
        $students = $this->student->filtered('owner', $owner);

        return Inertia::render('Students/Index', [
            'students' => $students,
            'permissions' => [],
        ]);
    }

    public function create()
    {
        $universities = $this->university->all();

        return Inertia::render('Students/Create', [
            'universities' => $universities,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:24'],
            'dni' => ['required', 'string', 'max:24'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:24'],
            'university' => ['nullable', 'string'],
            'owner' => ['required', 'numeric'],
        ])->validateWithBag('createStudent');

        $this->student->create($input);

        return redirect()->route('students.index');
    }

    public function show(string $key)
    {
        $student = $this->student->get($key);

        dd($student);
    }

    public function update(Request $request, string $key)
    {
        $input = $request->all();

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:24'],
            'dni' => ['required', 'string', 'max:24'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:24'],
            'university' => ['nullable', 'string'],
            'owner' => ['required', 'numeric'],
        ])->validateWithBag('updateStudent');

        $this->student->update($key, $input);

        return redirect()->route('students.index');
    }

    public function destroy(string $key)
    {

    }
}
