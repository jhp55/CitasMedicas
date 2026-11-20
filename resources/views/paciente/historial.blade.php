<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historial Clínico
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg text-gray-900">Registros de atención</h3>
                    <a href="{{ route('citas.index') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-gray-700">
                        Ver mis citas
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600">
                            <tr>
                                <th class="py-3 px-4">Fecha</th>
                                <th class="py-3 px-4">Médico</th>
                                <th class="py-3 px-4">Diagnóstico / Motivo</th>
                                <th class="py-3 px-4">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($historias ?? [] as $historia)
                                <tr>
                                    <td class="py-3 px-4">{{ $historia->fecha ?? ($historia->created_at?->format('Y-m-d') ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $historia->medico->user->name ?? ($historia->medico->nombre ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $historia->diagnostico ?? ($historia->motivo ?? '-') }}</td>
                                    <td class="py-3 px-4">{{ $historia->observaciones ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 px-4 text-center text-gray-500">
                                        No hay registros en el historial clínico todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>