<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" x-data="{ videoType: '{{ old('video_type', 'file') }}' }">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Video</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" value="{{ old('title') }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sumber Video Choice -->
                        <div class="mb-5 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Sumber Video</label>
                            <div class="flex items-center gap-6 mb-3">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="video_type" value="file" x-model="videoType" class="text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm font-medium text-gray-700">Upload File Video (MP4 / WebM)</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="video_type" value="embed" x-model="videoType" class="text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm font-medium text-gray-700">Link Embed / Iframe Video</span>
                                </label>
                            </div>

                            <!-- File Upload Input -->
                            <div x-show="videoType === 'file'" class="mt-3">
                                <label for="video_file" class="block text-xs font-medium text-gray-600 mb-1">File Video (Max: 50MB)</label>
                                <input type="file" name="video_file" id="video_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="video/*">
                                @error('video_file')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Embed Code / URL Input -->
                            <div x-show="videoType === 'embed'" x-cloak class="mt-3">
                                <label for="embed_code" class="block text-xs font-medium text-gray-600 mb-1">Link Embed Video / Kode &lt;iframe&gt;</label>
                                <textarea name="embed_code" id="embed_code" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-sm" placeholder="Paste URL video atau kode <iframe src='...'></iframe>">{{ old('embed_code') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Bisa berisi URL video (seperti YouTube, dll) atau langsung kode &lt;iframe&gt;&lt;/iframe&gt;.</p>
                                @error('embed_code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail (Opsional)</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" accept="image/*">
                            @error('thumbnail')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('videos.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="bg-[#2F7426] hover:bg-[#1a4316] text-white font-bold py-2 px-4 rounded">
                                Simpan Video
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
