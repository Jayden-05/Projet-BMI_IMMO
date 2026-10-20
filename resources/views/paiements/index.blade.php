<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paiements - BMI_IMMO</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* Page header */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }
        .page-header h3 { margin: 0; font-weight: 600; color: #fff; }
        .page-header .breadcrumb {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin-top: 10px;
        }
        .page-header .breadcrumb-item a { color: #fff; text-decoration: none; font-weight: 500; }
        .page-header .breadcrumb-item.active { color: rgba(255,255,255,0.9); }

        /* Stats card */
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
        .stats-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
        .stats-card .icon {
            font-size: 28px;
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            background: #1ed159;
        }
        .stats-card h4 { font-size: 32px; font-weight: 700; margin: 10px 0; color: #333; }
        .stats-card p { color: #6c757d; margin: 0; font-weight: 500; }

        #search-paiement {
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            padding: 15px 25px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        #search-paiement:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .table thead th {
            background: #4c79ce;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            padding: 18px 15px;
        }
        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f0f0f0;
        }
        .table tbody tr:hover {
            background: #f0f9ff;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(102,126,234,0.1);
        }
        .table tbody td { padding: 15px; vertical-align: middle; color: #333; }

        .badge-paiement {
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            color: white;
            display: inline-block;
        }
        .badge-paye { background: #28a745; }
        .badge-en-retard { background: #dc3545; }
        .badge-partiel { background: #ffc107; }
        .badge-especes { background: #20c997; }
        .badge-carte { background: #0d6efd; }
        .badge-mobile { background: #6f42c1; }

        .btn-create {
            background: linear-gradient(135deg, #0b6629 0%, #0b6629 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 14px;
            transition: 0.3s;
        }
        .btn-create:hover { opacity: 0.9; color: #fff; transform: translateY(-2px); }

        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 80px; color: #e0e0e0; margin-bottom: 20px; }

        @media (max-width:768px){ .table-responsive{ font-size:0.85rem; } }
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
                    <h3 class="page-title"><i class="mdi mdi-cash-multiple"></i> Gestion des Paiements</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Paiements</li>
                        </ol>
                    </nav>
                </div>

                <!-- Stats -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-cash"></i></div>
                            <h4>{{ $paiements->count() }}</h4>
                            <p>Total paiements</p>
                        </div>
                    </div>
                </div>

                <!-- Recherche -->
                <input type="text" id="search-paiement" class="form-control" placeholder="Rechercher par client, bien, type...">

                <!-- Tableau -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Bien</th>
                                            <th>Type pièce</th>
                                            <th>Numéro pièce</th>
                                            <th>Date émission</th>
                                            <th>Montant Loyer</th>
                                            <th>Type</th>
                                            <th>Période</th>
                                            <th>Moyen</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="paiements-tbody">
                                        @forelse($paiements as $paiement)
                                        <tr>
                                            <td>{{ $paiement->client->nom_client ?? '-' }} {{ $paiement->client->prenom_client ?? '' }}</td>

                                            <td>{{ $paiement->bien->type_bien ?? '-' }}</td>

                                            <!-- Type de pièce (depuis la relation client/pieces) -->
                                            <td>
                                                @if($paiement->client && $paiement->client->pieces && $paiement->client->pieces->first())
                                                    {{ $paiement->client->pieces->first()->typepiece ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <!-- Numéro de pièce (depuis la relation client/pieces) -->
                                            <td>
                                                @if($paiement->client && $paiement->client->pieces && $paiement->client->pieces->first())
                                                    {{ $paiement->client->pieces->first()->numpiece ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <!-- Date d'émission -->
                                            <td>
                                                @if($paiement->client && $paiement->client->pieces && $paiement->client->pieces->first())
                                                    {{ $paiement->client->pieces->first()->dateemission ? \Carbon\Carbon::parse($paiement->client->pieces->first()->dateemission)->format('d/m/Y') : '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td><strong>{{ number_format($paiement->montant_loyer,0,',',' ') }} FCFA</strong></td>

                                            <td>{{ $paiement->type_paiement }}</td>

                                            <td>{{ \Carbon\Carbon::parse($paiement->date_debut)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($paiement->date_fin)->format('d/m/Y') }}</td>

                                            <!-- Moyen de paiement -->
                                            <td>
                                                <span class="badge-paiement
                                                    @if($paiement->moyen_paiement === 'Espèces') badge-especes
                                                    @elseif(strpos($paiement->moyen_paiement, 'Carte') !== false) badge-carte
                                                    @elseif(strpos($paiement->moyen_paiement, 'Mobile') !== false) badge-mobile
                                                    @else badge-paiement @endif"
                                                    style="@if(strpos($paiement->moyen_paiement, 'Chèque') !== false) background: #fd7e14; @elseif(strpos($paiement->moyen_paiement, 'Virement') !== false) background: #17a2b8; @endif">
                                                    {{ $paiement->moyen_paiement }}
                                                </span>
                                            </td>

                                            <!-- Statut de paiement -->
                                            <td>
                                                <span class="badge-paiement
                                                    @if($paiement->statut_paiement === 'Payé') badge-paye
                                                    @elseif($paiement->statut_paiement === 'En retard') badge-en-retard
                                                    @else badge-partiel @endif">
                                                    {{ $paiement->statut_paiement }}
                                                </span>
                                            </td>

                                            <td>
                                                @php
                                                    $contrat = null;
                                                    // Chercher le contrat via la transaction
                                                    if($paiement->transaction && $paiement->transaction->contrat) {
                                                        $contrat = $paiement->transaction->contrat;
                                                    }
                                                @endphp

                                                @if($contrat)
                                                    <a href="{{ route('contrats.show', $contrat->id) }}" class="btn-create btn-sm btn">
                                                        <i class="mdi mdi-file-document"></i> Voir contrat
                                                    </a>
                                                @else
                                                    <a href="{{ route('paiements.createMissingContract', $paiement->id) }}" class="btn-create btn-sm btn" style="background: linear-gradient(135deg, #fbbf24 0%, #f97316 100%);">
                                                        <i class="mdi mdi-plus-circle"></i> Créer contrat
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="11">
                                                <div class="empty-state">
                                                    <i class="mdi mdi-alert-circle-outline"></i>
                                                    <h4>Aucun paiement enregistré</h4>
                                                    <p>Commencez par ajouter un paiement</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                @include('copyright')
            </footer>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script>
    // Recherche en direct
    document.getElementById('search-paiement').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        document.querySelectorAll('#paiements-tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(searchValue) ? '' : 'none';
        });
    });
</script>
</body>
</html>
