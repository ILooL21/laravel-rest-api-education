<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'ilul',
            'email' => 'ilul@gmail.com',
            'password' => bcrypt('ilul'),
        ]);
        Category::create(
            [
                ['name' => 'Matematika'],
                ['name' => 'Fisika'],
                ['name' => 'Kimia'],
                ['name' => 'Biologi'],
                ['name' => 'Bahasa Indonesia'],
                ['name' => 'Bahasa Inggris'],
                ['name' => 'Pemrongan Web'],
                ['name' => 'Pemrograman Mobile'],
                ['name' => 'Pemrograman Desktop'],
                ['name' => 'Pemrograman Game'],
            ]
        );
        Lesson::create(
            [
                ['name' => 'Matematika Dasar', 'description' => 'Pelajaran Matematika Dasar', 'category_id' => 1],
                ['name' => 'Matematika Lanjutan', 'description' => 'Pelajaran Matematika Lanjutan', 'category_id' => 1],
                ['name' => 'Fisika Dasar', 'description' => 'Pelajaran Fisika Dasar', 'category_id' => 2],
                ['name' => 'Fisika Lanjutan', 'description' => 'Pelajaran Fisika Lanjutan', 'category_id' => 2],
                ['name' => 'Kimia Dasar', 'description' => 'Pelajaran Kimia Dasar', 'category_id' => 3],
                ['name' => 'Kimia Lanjutan', 'description' => 'Pelajaran Kimia Lanjutan', 'category_id' => 3],
                ['name' => 'Biologi Dasar', 'description' => 'Pelajaran Biologi Dasar', 'category_id' => 4],
                ['name' => 'Biologi Lanjutan', 'description' => 'Pelajaran Biologi Lanjutan', 'category_id' => 4],
                ['name' => 'Bahasa Indonesia Dasar', 'description' => 'Pelajaran Bahasa Indonesia Dasar', 'category_id' => 5],
                ['name' => 'Bahasa Indonesia Lanjutan', 'description' => 'Pelajaran Bahasa Indonesia Lanjutan', 'category_id' => 5],
                ['name' => 'Bahasa Inggris Dasar', 'description' => 'Pelajaran Bahasa Inggris Dasar', 'category_id' => 6],
                ['name' => 'Bahasa Inggris Lanjutan', 'description' => 'Pelajaran Bahasa Inggris Lanjutan', 'category_id' => 6],
                ['name' => 'Pemrograman Web Dasar', 'description' => 'Pelajaran Pemrograman Web Dasar', 'category_id' => 7],
                ['name' => 'Pemrograman Web Lanjutan', 'description' => 'Pelajaran Pemrograman Web Lanjutan', 'category_id' => 7],
                ['name' => 'Pemrograman Mobile Dasar', 'description' => 'Pelajaran Pemrograman Mobile Dasar', 'category_id' => 8],
                ['name' => 'Pemrograman Mobile Lanjutan', 'description' => 'Pelajaran Pemrograman Mobile Lanjutan', 'category_id' => 8],
                ['name' => 'Pemrograman Desktop Dasar', 'description' => 'Pelajaran Pemrograman Desktop Dasar', 'category_id' => 9],
                ['name' => 'Pemrograman Desktop Lanjutan', 'description' => 'Pelajaran Pemrograman Desktop Lanjutan', 'category_id' => 9],
                ['name' => 'Pemrograman Game Dasar', 'description' => 'Pelajaran Pemrograman Game Dasar', 'category_id' => 10],
                ['name' => 'Pemrograman Game Lanjutan', 'description' => 'Pelajaran Pemrograman Game Lanjutan', 'category_id' => 10],
            ]
        );
        Chapter::create([
            ['name' => 'Pengenalan Matematika', 'description' => 'Pengenalan Matematika Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Aljabar', 'description' => 'Pengenalan Aljabar Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Geometri', 'description' => 'Pengenalan Geometri Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Trigonometri', 'description' => 'Pengenalan Trigonometri Dasar', 'lesson_id' => 1, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Matematika', 'description' => 'Pengenalan Matematika Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Aljabar', 'description' => 'Pengenalan Aljabar Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Geometri', 'description' => 'Pengenalan Geometri Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Trigonometri', 'description' => 'Pengenalan Trigonometri Lanjutan', 'lesson_id' => 2, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Fisika', 'description' => 'Pengenalan Fisika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Mekanika', 'description' => 'Pengenalan Mekanika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Termodinamika', 'description' => 'Pengenalan Termodinamika Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Listrik', 'description' => 'Pengenalan Listrik Dasar', 'lesson_id' => 3, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Fisika', 'description' => 'Pengenalan Fisika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Mekanika', 'description' => 'Pengenalan Mekanika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Termodinamika', 'description' => 'Pengenalan Termodinamika Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Listrik', 'description' => 'Pengenalan Listrik Lanjutan', 'lesson_id' => 4, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Kimia', 'description' => 'Pengenalan Kimia Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Reaksi Kimia', 'description' => 'Pengenalan Reaksi Kimia Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Struktur Atom', 'description' => 'Pengenalan Struktur Atom Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tabel Periodik', 'description' => 'Pengenalan Tabel Periodik Dasar', 'lesson_id' => 5, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Kimia', 'description' => 'Pengenalan Kimia Lanjutan', 'lesson_id' => 6, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Reaksi Kimia', 'description' => 'Pengenalan Reaksi Kimia Lanjutan', 'lesson_id' => 6, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Struktur Atom', 'description' => 'Pengenalan Struktur Atom Lanjutan', 'lesson_id' => 6, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tabel Periodik', 'description' => 'Pengenalan Tabel Periodik Lanjutan', 'lesson_id' => 6, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Biologi', 'description' => 'Pengenalan Biologi Dasar', 'lesson_id' => 7, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sel', 'description' => 'Pengenalan Sel Dasar', 'lesson_id' => 7, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Genetika', 'description' => 'Pengenalan Genetika Dasar', 'lesson_id' => 7, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ekosistem', 'description' => 'Pengenalan Ekosistem Dasar', 'lesson_id' => 7, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Biologi', 'description' => 'Pengenalan Biologi Lanjutan', 'lesson_id' => 8, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sel', 'description' => 'Pengenalan Sel Lanjutan', 'lesson_id' => 8, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Genetika', 'description' => 'Pengenalan Genetika Lanjutan', 'lesson_id' => 8, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ekosistem', 'description' => 'Pengenalan Ekosistem Lanjutan', 'lesson_id' => 8, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Bahasa Indonesia', 'description' => 'Pengenalan Bahasa Indonesia Dasar', 'lesson_id' => 9, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ejaan', 'description' => 'Pengenalan Ejaan Dasar', 'lesson_id' => 9, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tata Bahasa', 'description' => 'Pengenalan Tata Bahasa Dasar', 'lesson_id' => 9, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sastra', 'description' => 'Pengenalan Sastra Dasar', 'lesson_id' => 9, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Bahasa Indonesia', 'description' => 'Pengenalan Bahasa Indonesia Lanjutan', 'lesson_id' => 10, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ejaan', 'description' => 'Pengenalan Ejaan Lanjutan', 'lesson_id' => 10, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tata Bahasa', 'description' => 'Pengenalan Tata Bahasa Lanjutan', 'lesson_id' => 10, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sastra', 'description' => 'Pengenalan Sastra Lanjutan', 'lesson_id' => 10, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pelajaran Bahasa Inggris', 'description' => 'Pelajaran Bahasa Inggris Dasar', 'lesson_id' => 11, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ejaan', 'description' => 'Pengenalan Ejaan Dasar', 'lesson_id' => 11, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tata Bahasa', 'description' => 'Pengenalan Tata Bahasa Dasar', 'lesson_id' => 11, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sastra', 'description' => 'Pengenalan Sastra Dasar', 'lesson_id' => 11, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pelajaran Bahasa Inggris', 'description' => 'Pelajaran Bahasa Inggris Lanjutan', 'lesson_id' => 12, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Ejaan', 'description' => 'Pengenalan Ejaan Lanjutan', 'lesson_id' => 12, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Tata Bahasa', 'description' => 'Pengenalan Tata Bahasa Lanjutan', 'lesson_id' => 12, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Sastra', 'description' => 'Pengenalan Sastra Lanjutan', 'lesson_id' => 12, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Pemrograman Web', 'description' => 'Pengenalan Pemrograman Web Dasar', 'lesson_id' => 13, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan HTML', 'description' => 'Pengenalan HTML Dasar', 'lesson_id' => 13, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan CSS', 'description' => 'Pengenalan CSS Dasar', 'lesson_id' => 13, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan JavaScript', 'description' => 'Pengenalan JavaScript Dasar', 'lesson_id' => 13, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan Pemrograman Web', 'description' => 'Pengenalan Pemrograman Web Lanjutan', 'lesson_id' => 14, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan HTML', 'description' => 'Pengenalan HTML Lanjutan', 'lesson_id' => 14, 'video_url' => 'dQw4w9WgXcQ'],
            ['name' => 'Pengenalan CSS', 'description' => 'Pengenalan CSS Lanjutan', 'lesson_id' => 14, 'video_url' => 'dQw4w9WgXcQ'],
        ]);
    }
}
