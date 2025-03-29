@extends('layouts.admin')

@section('title', 'Détails de l\'inscription')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Détails de l'inscription</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.trainings.index') }}">Formations</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.trainings.show', $registration->session->training->id) }}">{{ $registration->session->training->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.trainings.sessions.registrations.index', ['training' => $registration->session->training->id, 'session' => $registration->session->id]) }}">Inscriptions</a></li>
        <li class="breadcrumb-item active">Détails</li>
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

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    Informations du participant
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="mb-0">{{ $registration->first_name }} {{ $registration->last_name }}</h5>
                        @if($registration->user)
                            <small class="text-muted">Utilisateur inscrit : {{ $registration->user->email }}</small>
                        @endif
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Email :</strong></p>
                            <p>{{ $registration->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Téléphone :</strong></p>
                            <p>{{ $registration->phone ?? 'Non renseigné' }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <p class="mb-1"><strong>Entreprise :</strong></p>
                        <p>
                            @if($registration->is_company)
                                {{ $registration->company_name }}
                            @else
                                Inscription individuelle
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <p class="mb-1"><strong>Statut :</strong></p>
                        @if($registration->isPending())
                            <span class="badge bg-warning text-dark">En attente</span>
                        @elseif($registration->isConfirmed())
                            <span class="badge bg-success">Confirmée</span>
                        @elseif($registration->isCancelled())
                            <span class="badge bg-danger">Annulée</span>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <p class="mb-1"><strong>Date d'inscription :</strong></p>
                        <p>{{ $registration->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    @if($registration->notes)
                        <div class="mb-3">
                            <p class="mb-1"><strong>Notes :</strong></p>
                            <div class="p-3 bg-light rounded">
                                {{ $registration->notes }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-alt me-1"></i>
                    Détails de la session
                </div>
                <div class="card-body">
                    <h5 class="mb-3">{{ $registration->session->training->title }}</h5>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Dates :</strong></p>
                            <p>{{ $registration->session->start_date->format('d/m/Y') }} au {{ $registration->session->end_date->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Horaires :</strong></p>
                            <p>{{ $registration->session->start_time }} - {{ $registration->session->end_time }}</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Lieu :</strong></p>
                            <p>{{ $registration->session->location }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Places disponibles :</strong></p>
                            <p class="{{ $registration->session->available_seats <= 3 ? 'text-danger' : '' }}">
                                {{ $registration->session->available_seats }} / {{ $registration->session->max_participants }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <p class="mb-1"><strong>Adresse :</strong></p>
                        <p>{{ $registration->session->address }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <p class="mb-1"><strong>Statut de la session :</strong></p>
                        @if($registration->session->is_confirmed)
                            <span class="badge bg-success">Confirmée</span>
                        @else
                            <span class="badge bg-warning text-dark">Non confirmée</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-cogs me-1"></i>
            Actions
        </div>
        <div class="card-body">
            <div class="d-flex gap-2">
                <a href="{{ route('admin.trainings.sessions.registrations.index', ['training' => $registration->session->training->id, 'session' => $registration->session->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                </a>
                
                @if($registration->isPending())
                    <form action="{{ route('admin.trainings.sessions.registrations.confirm', ['training' => $registration->session->training->id, 'session' => $registration->session->id, 'registration' => $registration->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" {{ $registration->session->isFull() ? 'disabled' : '' }}>
                            <i class="fas fa-check me-1"></i> Confirmer l'inscription
                        </button>
                    </form>
                @endif
                
                @if(!$registration->isCancelled())
                    <form action="{{ route('admin.trainings.sessions.registrations.cancel', ['training' => $registration->session->training->id, 'session' => $registration->session->id, 'registration' => $registration->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette inscription ?')">
                            <i class="fas fa-ban me-1"></i> Annuler l'inscription
                        </button>
                    </form>
                @endif
                
                <form action="{{ route('admin.trainings.sessions.registrations.destroy', ['training' => $registration->session->training->id, 'session' => $registration->session->id, 'registration' => $registration->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ? Cette action est irréversible.')">
                        <i class="fas fa-trash me-1"></i> Supprimer l'inscription
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
