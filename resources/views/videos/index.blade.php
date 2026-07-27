<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Daftar Video Edukasi</h3>
                        <a href="{{ route('videos.create') }}" class="bg-[#2F7426] hover:bg-[#1a4316] text-white font-bold py-2 px-4 rounded">Tambah Video</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Search & Sort Filter -->
                    <form method="GET" action="{{ route('videos.index') }}" class="mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto flex-1">
                            <div class="relative flex-1 max-w-md">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul video..." class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-[#2F7426] focus:border-[#2F7426]">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full sm:w-48">
                                <select name="sort" onchange="this.form.submit()" class="w-full py-2 px-3 text-sm border border-gray-300 rounded-lg focus:ring-[#2F7426] focus:border-[#2F7426] bg-white">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Urutkan: Terbaru</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Urutkan: Terlama</option>
                                    <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Judul (A-Z)</option>
                                    <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>Judul (Z-A)</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-[#2F7426] hover:bg-[#1a4316] text-white text-sm font-semibold px-4 py-2 rounded-lg transition">Cari</button>
                            @if(request('search') || request('sort'))
                                <a href="{{ route('videos.index') }}" class="inline-flex items-center text-sm text-red-600 hover:text-red-800 font-medium px-2 py-2">Reset Filter</a>
                            @endif
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thumbnail</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($videos as $index => $video)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $videos->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($video->thumbnail)
                                                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->title }}" class="h-12 w-20 object-cover rounded">
                                            @else
                                                <img src="{{ asset('images/backgroundlandingpage.jpeg') }}" alt="{{ $video->title }}" class="h-12 w-20 object-cover rounded">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $video->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('videos.edit', $video) }}" class="text-[#2F7426] hover:text-[#1a4316] mr-3">Edit</a>
                                            <form action="{{ route('videos.destroy', $video) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete(event, 'Video')" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada video.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
