<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'thumbnail',
        'video_path',
    ];

    public function getIsEmbedAttribute(): bool
    {
        if (empty($this->video_path)) {
            return false;
        }
        return \Illuminate\Support\Str::startsWith(trim($this->video_path), ['http://', 'https://', '<iframe']);
    }

    public function getEmbedHtmlAttribute(): string
    {
        $path = trim($this->video_path ?? '');

        if (empty($path)) {
            return '<div class="p-4 text-center text-white">Video tidak ditemukan.</div>';
        }

        if (str_contains($path, '<iframe')) {
            $html = $path;
            if (preg_match('/width=["\'][^"\']*["\']/', $html)) {
                $html = preg_replace('/width=["\'][^"\']*["\']/', 'width="100%"', $html);
            } else {
                $html = str_replace('<iframe', '<iframe width="100%"', $html);
            }

            if (preg_match('/style=["\']([^"\']*)["\']/', $html, $m)) {
                $existingStyle = rtrim($m[1], ';');
                $newStyle = $existingStyle . '; width: 100%; aspect-ratio: 16/9; min-height: 360px; border-radius: 12px; display: block;';
                $html = preg_replace('/style=["\'][^"\']*["\']/', 'style="' . $newStyle . '"', $html);
            } else {
                $html = str_replace('<iframe', '<iframe style="width: 100%; aspect-ratio: 16/9; min-height: 360px; border-radius: 12px; border: none; display: block;"', $html);
            }

            return $html;
        }

        if (str_contains($path, 'youtube.com') || str_contains($path, 'youtu.be')) {
            $youtubeId = '';
            if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $path, $matches)) {
                $youtubeId = $matches[1];
            }
            if ($youtubeId) {
                return '<iframe src="https://www.youtube.com/embed/' . $youtubeId . '?autoplay=1" width="100%" style="width: 100%; aspect-ratio: 16/9; min-height: 360px; border-radius: 12px; border: none; display: block;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen></iframe>';
            }
        }

        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return '<iframe src="' . htmlspecialchars($path, ENT_QUOTES) . '" width="100%" style="width: 100%; aspect-ratio: 16/9; min-height: 360px; border-radius: 12px; border: none; display: block;" frameborder="0" allow="encrypted-media; fullscreen; autoplay; microphone; camera" allowfullscreen></iframe>';
        }

        $fileUrl = asset('storage/' . $path);
        return '<video controls autoplay width="100%" style="width: 100%; aspect-ratio: 16/9; max-height: 500px; border-radius: 12px; display: block;"><source src="' . $fileUrl . '">Browser Anda tidak mendukung tag video.</video>';
    }
}
