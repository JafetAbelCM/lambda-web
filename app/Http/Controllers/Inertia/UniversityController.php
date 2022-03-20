<?php

namespace App\Http\Controllers\Inertia;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Firebase\University;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    /**
     * @var University
     */
    private $university;

    public function __construct(University $university)
    {
        $this->university = $university;
    }

    public function index()
    {
        $universities = $this->university->all();

        return Inertia::render('Universities/Index', [
            'universities' => $universities,
            'permissions' => [],
        ]);
    }

    public function create()
    {
        return Inertia::render('Universities/Create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'logo_url' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:24'],
        ])->validateWithBag('createUniversity');

        $this->university->create($input);

        return redirect()->route('universities.index');
    }

    public function show(string $id)
    {
        $university = $this->university->get($id);

        dd($university);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'logo_url' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:24'],
        ])->validateWithBag('updateUniversity');

        $this->university->update($id, $input);

        return redirect()->route('universities.index');
    }

    public function destroy(string $id)
    {
        $this->university->delete($id);

        return redirect()->route('universities.index');
    }
}
