<?php

namespace Tests\Feature\FileDownload;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DownloadTest extends TestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();
        // Создаем фейковый диск в оперативной памяти для изоляции тестов
        Storage::fake('local');
    }

    public function test_user_can_download_windows_version(): void
    {
        $fileContent = 'Fake game content';
        Storage::disk('local')->put('downloads/TheCultofTheVirus-1.0-win.zip', $fileContent);
        
        $response = $this->get('/download/file/windows');
        
        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename=The_Virus_Cult_windows.zip');
    }
    
    public function test_download_returns_404_for_invalid_platform(): void
    {
        // Делаем обычный запрос, Laravel сам превратит abort(404) в правильный HTTP-ответ
        $response = $this->get('/download/file/android');
        
        $response->assertStatus(404);
        // Проверяем, что в тексте ответа присутствует наше сообщение (Laravel выводит его на странице ошибки)
        $response->assertSee('Platform not found');
    }
    
    public function test_download_returns_404_if_file_missing(): void
    {
        // Диск пустой, файл для скачивания отсутствует
        $response = $this->get('/download/file/windows');
        
        $response->assertStatus(404);
        $response->assertSee('File not found');
    }
    
    public function test_all_platforms_are_accessible(): void
    {
        $platforms = ['windows', 'linux', 'mac'];
        
        foreach ($platforms as $platform) {
            $fileName = match($platform) {
                'windows' => 'TheCultofTheVirus-1.0-win.zip',
                'linux' => 'TheCultofTheVirus-1.0-linux.tar.bz2',
                'mac' => 'TheCultofTheVirus-1.0-mac.zip',
            };
            
            Storage::disk('local')->put('downloads/' . $fileName, 'Fake content');
            
            $response = $this->get("/download/file/{$platform}");
            $response->assertStatus(200);
        }
    }
}