<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Chapter;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific user
        User::create([
            'username' => 'ilul',
            'email' => 'ilul@gmail.com',
            'password' => bcrypt('ilul'),
        ]);

        // Insert categories with timestamps
        $categories = [
            ['name' => 'Matematika', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fisika', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kimia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Biologi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Indonesia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Inggris', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Mobile', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Desktop', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Game', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Category::insert($categories);

        // Insert lessons with timestamps
        $lessons = [
            ['name' => 'Matematika Dasar', 'description' => 'Pelajaran Matematika Dasar', 'category_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Matematika Lanjutan', 'description' => 'Pelajaran Matematika Lanjutan', 'category_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fisika Dasar', 'description' => 'Pelajaran Fisika Dasar', 'category_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fisika Lanjutan', 'description' => 'Pelajaran Fisika Lanjutan', 'category_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kimia Dasar', 'description' => 'Pelajaran Kimia Dasar', 'category_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kimia Lanjutan', 'description' => 'Pelajaran Kimia Lanjutan', 'category_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Biologi Dasar', 'description' => 'Pelajaran Biologi Dasar', 'category_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Biologi Lanjutan', 'description' => 'Pelajaran Biologi Lanjutan', 'category_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Indonesia Dasar', 'description' => 'Pelajaran Bahasa Indonesia Dasar', 'category_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Indonesia Lanjutan', 'description' => 'Pelajaran Bahasa Indonesia Lanjutan', 'category_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Inggris Dasar', 'description' => 'Pelajaran Bahasa Inggris Dasar', 'category_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bahasa Inggris Lanjutan', 'description' => 'Pelajaran Bahasa Inggris Lanjutan', 'category_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Web Dasar', 'description' => 'Pelajaran Pemrograman Web Dasar', 'category_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Web Lanjutan', 'description' => 'Pelajaran Pemrograman Web Lanjutan', 'category_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Mobile Dasar', 'description' => 'Pelajaran Pemrograman Mobile Dasar', 'category_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Mobile Lanjutan', 'description' => 'Pelajaran Pemrograman Mobile Lanjutan', 'category_id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Desktop Dasar', 'description' => 'Pelajaran Pemrograman Desktop Dasar', 'category_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Desktop Lanjutan', 'description' => 'Pelajaran Pemrograman Desktop Lanjutan', 'category_id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Game Dasar', 'description' => 'Pelajaran Pemrograman Game Dasar', 'category_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pemrograman Game Lanjutan', 'description' => 'Pelajaran Pemrograman Game Lanjutan', 'category_id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Lesson::insert($lessons);

        // Insert chapters with timestamps
        $chapters = [
            ['name' => 'Pengenalan Matematika', 'description' => 'Pengenalan Matematika Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Aljabar', 'description' => 'Pengenalan Aljabar Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Geometri', 'description' => 'Pengenalan Geometri Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Trigonometri', 'description' => 'Pengenalan Trigonometri Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Matematika', 'description' => 'Pengenalan Matematika Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Aljabar', 'description' => 'Pengenalan Aljabar Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Geometri', 'description' => 'Pengenalan Geometri Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Trigonometri', 'description' => 'Pengenalan Trigonometri Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Fisika', 'description' => 'Pengenalan Fisika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Mekanika', 'description' => 'Pengenalan Mekanika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Termodinamika', 'description' => 'Pengenalan Termodinamika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Listrik', 'description' => 'Pengenalan Listrik Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Fisika', 'description' => 'Pengenalan Fisika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Mekanika', 'description' => 'Pengenalan Mekanika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Termodinamika', 'description' => 'Pengenalan Termodinamika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Listrik', 'description' => 'Pengenalan Listrik Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Kimia', 'description' => 'Pengenalan Kimia Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Reaksi Kimia', 'description' => 'Pengenalan Reaksi Kimia Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Struktur Atom', 'description' => 'Pengenalan Struktur Atom Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pengenalan Tabel Periodik', 'description' => 'Pengenalan Tabel Periodik Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Chapter::insert($chapters);
    }
}
