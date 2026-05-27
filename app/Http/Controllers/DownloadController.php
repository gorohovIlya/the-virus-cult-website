<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            abort(404, 'Platform not found.');
        }

        $absolutePath = storage_path('app/downloads/' . $files[$platform]);

        if (!file_exists($absolutePath)) {
            abort(404, "File not found on path: " . $absolutePath);
        }

        return response()->download($absolutePath, "The_Virus_Cult_{$platform}.zip");
    }
}
