<?php

namespace App\Http\Controllers;

use App\Services\FirebaseRealtimeDatabaseService;
use Illuminate\Http\Request;

class FirebaseExampleController extends Controller
{
    /**
     * @var FirebaseRealtimeDatabaseService
     */
    private $firebase;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var string
     */
    private $document = 'contacts';

    /**
     * @param FirebaseRealtimeDatabaseService $firebase
     * @param Request $request
     */
    public function __construct(FirebaseRealtimeDatabaseService $firebase, Request $request)
    {
        $this->firebase = $firebase;
        $this->request = $request;
    }

    public function index()
    {
        $contacts = $this->firebase->fetch($this->document);

        return response($contacts);
    }

    public function create()
    {
        $data = [];

        return response()->json($data);
    }

    public function store()
    {
        $data = $this->request->all();
        $reference_key = $this->firebase->create($this->document, $data);

        return response($reference_key);
    }

    public function show(string $id)
    {
        $key = $id;
        $contact = $this->firebase->find($this->document, $key);

        return response($contact);
    }

    public function update(string $id)
    {
        $key = $id;
        $data = $this->request->all();
        $reference_key = $this->firebase->update($this->document . '/' . $key, $data);

        return response($reference_key);
    }

    public function destroy(string $id)
    {
        $key = $id;
        $reference_key = $this->firebase->delete($this->document . '/' . $key);

        return response($reference_key);
    }
}
