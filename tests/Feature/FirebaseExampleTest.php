<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FirebaseExampleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_fetch_all_contacts()
    {
        $response = $this->get(route('fb.contacts.index'));

        dump($response->getContent());

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_create_multiple_contact()
    {
        $limit = 10;
        $contacts = $this->_factoryContacts($limit);
        $counter = 0;

        foreach ($contacts as $contact) {
            $response = $this->post(route('fb.contacts.store'), $contact);
            $response->assertStatus(Response::HTTP_OK);
            $counter++;
        }

        $this->assertCount($counter, $contacts);
    }

    public function test_create_one_contact()
    {
        $contact = $this->_factoryContacts();
        $response = $this->post(route('fb.contacts.store'), $contact);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_update_one_contact()
    {
        $key = '-MqWMcUTpY07zK7fVq0T';
        $contact = $this->_factoryContacts();
        $response = $this->put(route('fb.contacts.update', ['id' => $key]), $contact);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_delete_one_contact()
    {
        $key = '-MqWMi1jcgZ5CbWIq6Qh';
        $response = $this->delete(route('fb.contacts.destroy', ['id' => $key]));
        $response->assertStatus(Response::HTTP_OK);
    }

    private function _factoryContacts(int $limit = 1)
    {
        $contacts = [];

        for ($i = 0; $i <= $limit; $i++) {
            $contacts[] = [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'phone' => $this->faker->phoneNumber(),
                'email' => $this->faker->email(),
            ];
        }

        return $limit > 1 ? $contacts : current($contacts);
    }
}
