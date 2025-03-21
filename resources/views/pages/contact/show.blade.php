@extends('layouts.app')

@section('title', 'Détail du message')

@section('content')
    <!-- page title start -->
    <x-breadcrumb title="Détail du message" />
    <!-- page title end -->

    <!-- message detail start -->
    <div class="pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-white  p-6 rounded-lg shadow-md relative dark:bg-[#150443]">
                        <div class="card-header py-3 flex justify-between items-center">
                            <h3 class="text-xl font-semibold dark:text-white">Message de {{ $contact->name }}</h3>
                            <a href="{{ route('contact.messages') }}" class="btn btn-border-base">
                                <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="bg-gray-50 p-4 rounded-lg mb-4 dark:bg-[#050231]">
                                <div class="flex justify-between items-center mb-3">
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-white">
                                            <strong>De :</strong> {{ $contact->name }} ({{ $contact->email }})
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-white">
                                            <strong>Sujet :</strong> {{ $contact->subject }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-white">
                                            <strong>Date :</strong> {{ $contact->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>
                                    <div>
                                        @if($contact->status === 'unread')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Non lu</span>
                                        @elseif($contact->status === 'read')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Lu</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Répondu</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 pt-3 dark:border-gray-700">
                                    <p class="text-gray-800 whitespace-pre-line dark:text-white">{{ $contact->message }}</p>
                                </div>
                            </div>

                            <div class="mt-6">
                                @if($contact->status !== 'replied')
                                    <form action="{{ route('contact.mark-as-replied', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-base dark:text-white">
                                            <i class="fas fa-check mr-2"></i> Marquer comme répondu
                                        </button>
                                    </form>
                                @endif
                                
                                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-border-base ml-2 dark:text-white">
                                    <i class="fas fa-reply mr-2"></i> Répondre par email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- message detail end -->
@endsection
