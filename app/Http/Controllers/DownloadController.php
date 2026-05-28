<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController
{
    public function downloadGame(string $platform)
    {
        $files = [
            'windows' => 'TheCultofTheVirus-1.0-win.zip',
            'linux'   => 'TheCultofTheVirus-1.0-linux.tar.bz2',
            'mac'     => 'TheCultofTheVirus-1.0-mac.zip'
        ];

        if (!array_key_exists($platform, $files)) {
            abort(404, 'Platform not found');
        }

        $relativePath = 'downloads/' . $files[$platform];

        // Проверяем существование файла через фасад (работает и в тестах, и в веб)
        if (!Storage::disk('local')->exists($relativePath)) {
            abort(404, 'File not found');
        }

        // Получаем правильный абсолютный путь (в тестах он будет вести в виртуальное хранилище)
        $absolutePath = Storage::disk('local')->path($relativePath);

        return response()->download($absolutePath, "The_Virus_Cult_{$platform}.zip");
    }
}