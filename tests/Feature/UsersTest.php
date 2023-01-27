<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * @group users
 * @group ci
 * */
class UsersTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testUsersIndex(): void
    {
        User::factory(1)->create();
        $response = $this->get(route('users.index'));
        $response->assertStatus(200)
            ->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'email',

                ],
            ],
        ]);
    }

    public function testUsersShow(): void
    {
        $user = User::factory(1)->create()->first();

        /** @phpstan-ignore-line */
        $response = $this->get(route('users.show', [$user->getKey()]));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'id',
                ],
            ]);
    }

    public function testUserStore(): void
    {
        User::factory(1)->create();
        $response = $this->post(route('users.store'), [
            'name' => 'Name',
            'email' => 'email@email.ru',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        $response->assertStatus(201);
    }
}
