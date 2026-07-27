<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        switch ($request->get('sort')) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $videos = $query->paginate(10)->withQueryString();

        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_type' => 'required|in:file,embed',
            'video_file' => 'nullable|required_if:video_type,file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,video/webm|max:51200',
            'embed_code' => 'nullable|required_if:video_type,embed|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'duration' => '',
        ];

        if ($request->video_type === 'file' && $request->hasFile('video_file')) {
            $data['video_path'] = $request->file('video_file')->store('videos', 'public');
        } elseif ($request->video_type === 'embed') {
            $data['video_path'] = trim($request->embed_code);
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Video::create($data);

        return redirect()->route('videos.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_type' => 'nullable|in:file,embed',
            'video_file' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,video/webm|max:51200',
            'embed_code' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
        ];

        if ($request->video_type === 'file' && $request->hasFile('video_file')) {
            if ($video->video_path && !\Illuminate\Support\Str::startsWith($video->video_path, ['http://', 'https://', '<iframe'])) {
                Storage::disk('public')->delete($video->video_path);
            }
            $data['video_path'] = $request->file('video_file')->store('videos', 'public');
        } elseif ($request->video_type === 'embed' && !empty($request->embed_code)) {
            if ($video->video_path && !\Illuminate\Support\Str::startsWith($video->video_path, ['http://', 'https://', '<iframe'])) {
                Storage::disk('public')->delete($video->video_path);
            }
            $data['video_path'] = trim($request->embed_code);
        }

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $video->update($data);

        return redirect()->route('videos.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy(Video $video)
    {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        if ($video->video_path && !\Illuminate\Support\Str::startsWith($video->video_path, ['http://', 'https://', '<iframe'])) {
            Storage::disk('public')->delete($video->video_path);
        }
        
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus.');
    }
}
