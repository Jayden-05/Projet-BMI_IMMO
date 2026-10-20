<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contrats - BMI_IMMO</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* Page header - Bleu-Violet */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 8px 30px rgba(102,126,234,0.3);
        }
        .page-header h3 { margin: 0; font-weight: 600; color: white; }

        /* Stats cards */
        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .stats-card h4 { font-size: 28px; margin: 10px 0; font-weight: 700; color: #333; }
        .stats-card p { color: #6c757d; margin: 0; font-weight: 500; }

        /* Contract cards */
        .contract-card {
            border-left: 4px solid #667eea;
            border-radius: 12px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .contract-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .contract-card .badge-custom {
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 0.85rem;
        }
        .contract-card .btn-details {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 14px;
            font-weight: 600;
            transition: 0.3s;
        }
        .contract-card .btn-details:hover { opacity: 0.9; transform: translateY(-2px); }

        /* Recherche */
        #search-contrat {
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        #search-contrat:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        .empty-state i {
            font-size: 80px;
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) { .contract-card { margin-bottom: 15px; } }
    </style>
</head>

<body>
<div class="container-scroller">
    @include('banniere')
    <div class="container-fluid page-body-wrapper">
        @include('menu')

        <div class="main-panel">
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <h3 class="page-title"><i class="mdi mdi-file-document-box"></i> Liste des Contrats</h3>
                </div>

                <!-- Stats cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h4>{{ $contrats->where('statut_contrat', 'Actif')->count() }}</h4>
                            <p>Contrats Actifs</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h4>{{ $contrats->where('statut_contrat', 'Expiré')->count() }}</h4>
                            <p>Contrats Expirés</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h4>{{ $contrats->where('statut_contrat', 'Résilié')->count() }}</h4>
                            <p>Contrats Résiliés</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <h4>{{ number_format($contrats->sum('montant_loyer'), 0, ',', ' ') }} FCFA</h4>
                            <p>Montant Total</p>
                        </div>
                    </div>
                </div>

                <!-- Barre de recherche -->
                <input type="text" id="search-contrat" placeholder="Rechercher un contrat par numéro, client ou bien..." class="form-control">

                <!-- Liste des contrats -->
                <div class="row" id="contrats-container">
                    @forelse($contrats as $contrat)
                    <div class="col-md-6 col-lg-4 contrat-item">
                        <div class="card contract-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0"><i class="mdi mdi-file-document text-primary"></i> {{ $contrat->numero_contrat }}</h5>
                                    <span class="badge badge-custom
                                        @if($contrat->statut_contrat === 'Actif') bg-success
                                        @elseif($contrat->statut_contrat === 'Expiré') bg-danger
                                        @else bg-secondary @endif">
                                        {{ $contrat->statut_contrat }}
                                    </span>
                                </div>

                                <div class="mb-2"><span class="badge bg-primary">{{ $contrat->type_contrat }}</span></div>
                                <hr>
                                <p><i class="mdi mdi-account text-muted"></i> Client : {{ $contrat->client->nom_client ?? '-' }} {{ $contrat->client->prenom_client ?? '' }}</p>
                                <p><i class="mdi mdi-home text-muted"></i> Bien : {{ $contrat->bien->type_bien ?? '-' }}</p>
                                <p><i class="mdi mdi-calendar text-muted"></i> Date contrat : {{ \Carbon\Carbon::parse($contrat->date_contrat)->format('d/m/Y') }}</p>
                                <p><i class="mdi mdi-calendar-range text-muted"></i> Période : {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }} → {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</p>
                                <p><i class="mdi mdi-cash text-muted"></i> Montant : <span class="text-success fw-bold">{{ number_format($contrat->montant_loyer,0,',',' ') }} FCFA</span></p>

                                <a href="{{ route('contrats.show', $contrat->id) }}" class="btn-details btn-sm w-100 mt-2 btn"><i class="mdi mdi-eye"></i> Voir les détails</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="mdi mdi-file-document-box-outline"></i>
                            <h4>Aucun contrat enregistré</h4>
                            <p>Les contrats apparaîtront ici une fois créés.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

            </div>

            <footer class="footer">@include('copyright')</footer>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script>
    // Recherche en direct
    document.getElementById('search-contrat').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        document.querySelectorAll('.contrat-item').forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(value) ? '' : 'none';
        });
    });
</script>
</body>
</html>
