<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_register_user()
    {
        // Buat pengguna baru melalui endpoint register
        $response = $this->postJson('/api/register', [
            'username' => 'testuser',
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);

        // Verifikasi status respons adalah 201 (Created)
        $response->assertStatus(201);

        // Verifikasi pengguna baru ada di dalam database
        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'test@gmail.com'
        ]);
    }

    public function test_login_user()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);

        $token = $response['token'];

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/logout');

        $response->assertStatus(200);

        return $token;
    }

    public function test_update_user()
    {
        $token = $this->test_login_user();

        // Buat permintaan dengan token akses dalam header Authorization
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/update', [
            'username' => 'newtestuser',
            'email' => 'test@gmail.com',
            'oldpassword' => 'password'
        ]);

        // Verifikasi bahwa permintaan berhasil dengan status 200 OK
        $response->assertStatus(200);

        // Verifikasi bahwa pengguna telah diperbarui di database
        $this->assertDatabaseHas('users', [
            'username' => 'newtestuser',
            'email' => 'test@gmail.com',
        ]);
    }

    public function test_delete_user()
    {
        $user = User::where('email', 'test@gmail.com')->first();

        // Hapus pengguna tersebut dari database
        $user->delete();

        // Verifikasi pengguna sudah tidak ada di dalam database
        $this->assertDatabaseMissing('users', [
            'username' => 'testuser',
            'email' => 'test@gmail.com'
        ]);
    }
}
