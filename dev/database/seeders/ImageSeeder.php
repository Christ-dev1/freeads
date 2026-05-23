<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $sourcePath = base_path('images_sources'); 
    $destPath = 'ads_photos';

    if (!\File::exists($sourcePath)) {
        $this->command->error("Le dossier source 'images_sources' n'existe pas !");
        return;
    }


    $files = \File::files($sourcePath);

    foreach ($files as $file) {
        $filename = $file->getFilename();
        $content = \File::get($file->getRealPath());


        \Storage::disk('public')->put($destPath . '/' . $filename, $content);
        $this->command->info("Copié : {$filename}");
    }
}

}
