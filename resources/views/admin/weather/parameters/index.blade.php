@extends('layouts.admin')
@section('title', 'Manajemen Parameter Peringatan Banjir')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Manajemen Parameter Peringatan Banjir</h1>
        <a href="{{ route('admin.weather.parameters.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
            <i class="fas fa-plus mr-2"></i> Tambah Parameter
        </a>
    </div>
    <div class="bg-white shadow rounded-lg p-6">
        @if($parameters->isEmpty())
            <div class="bg-blue-100 text-blue-800 p-4 rounded-md">
                Belum ada parameter peringatan banjir yang ditentukan. Silakan tambahkan parameter baru.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 font-semibold">
                        <tr>
                            <th class="px-4 py-3">Stasiun Cuaca</th>
                            <th class="px-4 py-3">Threshold Rendah (mm)</th>
                            <th class="px-4 py-3">Threshold Sedang (mm)</th>
                            <th class="px-4 py-3">Threshold Tinggi (mm)</th>
                            <th class="px-4 py-3">Threshold Sangat Tinggi (mm)</th>
                            <th class="px-4 py-3">Hari Berturut-turut</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Terakhir Diperbarui</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parameters as $parameter)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $parameter->weatherStation->name }}</td>
                                <td class="px-4 py-2">{{ $parameter->threshold_low }}</td>
                                <td class="px-4 py-2">{{ $parameter->threshold_medium }}</td>
                                <td class="px-4 py-2">{{ $parameter->threshold_high }}</td>
                                <td class="px-4 py-2">{{ $parameter->threshold_very_high }}</td>
                                <td class="px-4 py-2">{{ $parameter->consecutive_days }}</td>
                                <td class="px-4 py-2">
                                    @if($parameter->is_active)
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $parameter->updated_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.weather.parameters.edit', $parameter) }}" class="inline-flex items-center px-2 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $parameters->links() }}
            </div>
        @endif
    </div>
@endsection
