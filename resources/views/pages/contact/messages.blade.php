@extends('layouts.app')

@section('title', 'Messages de contact')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Messages de contact" />
    <!-- page title end -->

    <!-- messages list start -->
    <div class="pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h3 class="text-xl font-semibold text-gray-800">Liste des messages</h3>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                            @endif

                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white ">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Nom</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Email</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Sujet</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Statut</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Date</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @forelse ($messages as $message)
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-3 px-4 text-sm">{{ $message->name }}</td>
                                                <td class="py-3 px-4 text-sm">{{ $message->email }}</td>
                                                <td class="py-3 px-4 text-sm">{{ $message->subject }}</td>
                                                <td class="py-3 px-4 text-sm">
                                                    @if($message->status === 'unread')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Non lu</span>
                                                    @elseif($message->status === 'read')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Lu</span>
                                                    @else
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Répondu</span>
                                                    @endif
                                                </td>
                                                <td class="py-3 px-4 text-sm">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                                <td class="py-3 px-4 text-sm">
                                                    <a href="{{ route('contact.show', $message) }}" class="text-blue-600 hover:text-blue-800 mr-2">
                                                        <i class="fas fa-eye"></i> Voir
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="py-4 px-4 text-center text-gray-500">Aucun message trouvé</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                {{ $messages->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- messages list end -->
@endsection
