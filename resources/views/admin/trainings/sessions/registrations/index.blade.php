@extends('layouts.admin')

@section('title', 'Gestion des inscriptions')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestion des inscriptions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.trainings.index') }}">Formations</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.trainings.show', $session->training->id) }}">{{ $session->training->title }}</a></li>
        <li class="breadcrumb-item active">Inscriptions pour la session du {{ $session->start_date->format('d/m/Y') }}</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Détails de la session
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Formation :</strong> {{ $session->training->title }}</p>
                    <p><strong>Dates :</strong> {{ $session->start_date->format('d/m/Y') }} au {{ $session->end_date->format('d/m/Y') }}</p>
                    <p><strong>Horaires :</strong> {{ $session->start_time }} - {{ $session->end_time }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Lieu :</strong> {{ $session->location }}</p>
                    <p><strong>Adresse :</strong> {{ $session->address }}</p>
                    <p>
                        <strong>Places :</strong> 
                        <span class="{{ $session->available_seats <= 3 ? 'text-danger' : '' }}">
                            {{ $session->available_seats }} disponibles / {{ $session->max_participants }} au total
                        </span>
                    </p>
                </div>
            </div>
            <div class="mt-3">
                <form action="{{ route('admin.trainings.sessions.registrations.update-seats', ['training' => $session->training->id, 'session' => $session->id]) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-sync-alt me-1"></i> Mettre à jour les places disponibles
                    </button>
                </form>
                <a href="{{ route('admin.trainings.sessions.edit', ['training' => $session->training->id, 'session' => $session->id]) }}" class="btn btn-outline-secondary btn-sm ms-2">
                    <i class="fas fa-edit me-1"></i> Modifier la session
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-users me-1"></i>
            Liste des inscriptions
        </div>
        <div class="card-body">
            @if($registrations->isEmpty())
                <div class="alert alert-info">
                    Aucune inscription pour cette session.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="registrationsTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Entreprise</th>
                                <th>Statut</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                                    <td>{{ $registration->email }}</td>
                                    <td>{{ $registration->phone ?? '-' }}</td>
                                    <td>{{ $registration->is_company ? $registration->company_name : 'Non' }}</td>
                                    <td>
                                        @if($registration->isPending())
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @elseif($registration->isConfirmed())
                                            <span class="badge bg-success">Confirmée</span>
                                        @elseif($registration->isCancelled())
                                            <span class="badge bg-danger">Annulée</span>
                                        @endif
                                    </td>
                                    <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.trainings.sessions.registrations.show', ['training' => $session->training->id, 'session' => $session->id, 'registration' => $registration->id]) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                            @if($registration->isPending())
                                                <form action="{{ route('admin.trainings.sessions.registrations.confirm', ['training' => $session->training->id, 'session' => $session->id, 'registration' => $registration->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success" {{ $session->isFull() ? 'disabled' : '' }}>
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            @if(!$registration->isCancelled())
                                                <form action="{{ route('admin.trainings.sessions.registrations.cancel', ['training' => $session->training->id, 'session' => $session->id, 'registration' => $registration->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-warning" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette inscription ?')">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.trainings.sessions.registrations.destroy', ['training' => $session->training->id, 'session' => $session->id, 'registration' => $registration->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ? Cette action est irréversible.')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialiser le DataTable
        $('#registrationsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
            },
            order: [[5, 'desc']] // Trier par date d'inscription (décroissant)
        });
    });
</script>
@endsection
