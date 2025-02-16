<?php

namespace Tests\Unit;

use App\Enums\GenderEnum;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
  use RefreshDatabase;

  #[Test]
  public function registration(): void
  {
    $newUser = User::factory()->raw([
      'gender' => GenderEnum::Male,
      'password' => '123435567',
      'password_confirmation' => '123435567'
    ]);

    $response = $this->postJson(route('registration'), $newUser);

    $response->assertOk();
    $response->assertJsonStructure([
      "user" => [
        "name",
        "gender",
        "email",
        "created_at"
      ],
      "userToken"
    ]);


    $user = User::where('name', $newUser['name']);

    $this->assertModelExists($user);
    $this->assertDatabaseHas('users', [
      'email' => $newUser['email'],
    ]);
  }
}
