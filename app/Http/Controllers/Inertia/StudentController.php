<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Repositories\Firebase\Student;
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
     * @var string
     */
    private $document = 'students';

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Show the students list.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $students = $this->student->all();

        return Inertia::render('Students/Index', [
            'students' => $students,
            'permissions' => [],
        ]);
    }

    public function create()
    {
        return Inertia::render('Students/Create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date', 'max:24'],
            'dni' => ['required', 'string', 'max:24'],
            'email' => ['required', 'email', 'max:24'],
            'phone' => ['required', 'string', 'max:24'],
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

    }

    public function destroy(string $key)
    {

    }
}
