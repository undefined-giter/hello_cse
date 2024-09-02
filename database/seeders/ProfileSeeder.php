<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = collect();

        for ($i = 1; $i <= 38; $i++) {
            $images->push("$i.jpg");
        }

        $images = $images->shuffle();

        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            if (rand(1, 6) == 1) {
                $selectedImage = 'default_user_img.png';
            } elseif ($images->isNotEmpty()) {
                $selectedImage = $images->pop();
            } else {
                $selectedImage = 'default_user_img.png';
            }

            $profile->update([
                'image' => 'profiles/' . $selectedImage,
            ]);
        }
    }
}
