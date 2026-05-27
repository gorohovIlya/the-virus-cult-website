<?php

// tests/Feature/FileDownload/DownloadTest.php
namespace Tests\Feature\FileDownload;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DownloadTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_download_windows_version(): void
    {
        // Подготовка: создаем фейковый файл
        Storage::fake('local');
        
        $fileContent = 'Fake game content';
        Storage::put('downloads/TheCultofTheVirus-1.0-win.zip', $fileContent);
        
        $response = $this->get('/download/file/windows');
        
        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename=The_Virus_Cult_windows.zip');
    }
    
    public function test_download_returns_404_for_invalid_platform(): void
    {
        $response = $this->get('/download/file/android');
        
        $response->assertStatus(404);
        $response->assertSee('Платформа не найдена');
    }
    
    public function test_download_returns_404_if_file_missing(): void
    {
        Storage::fake('local');
        
        $response = $this->get('/download/file/windows');
        
        $response->assertStatus(404);
        $response->assertSee('Файл не найден');
    }
    
    public function test_all_platforms_are_accessible(): void
    {
        Storage::fake('local');
        
        $platforms = ['windows', 'linux', 'mac'];
        
        foreach ($platforms as $platform) {
            $fileName = match($platform) {
                'windows' => 'TheCultofTheVirus-1.0-win.zip',
                'linux' => 'TheCultofTheVirus-1.0-linux.tar.bz2',
                'mac' => 'TheCultofTheVirus-1.0-mac.zip',
            };
            
            Storage::put('downloads/' . $fileName, 'Fake content');
            
            $response = $this->get("/download/file/{$platform}");
            $response->assertStatus(200);
        }
    }
}