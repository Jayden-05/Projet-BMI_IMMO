<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visites - BMI_IMMO</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* === STYLE UNIFIÉ BLEU-VIOLET === */
        :root {
            --main-gradient: linear-gradient(135deg,#667eea 0%,#764ba2 100%);
            --main-color: #667eea;
        }

        .page-header {
            background: var(--main-gradient);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }

        .page-header h3 { margin: 0; font-weight: 600; }
        .page-header .breadcrumb {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin-top: 10px;
        }
        .page-header .breadcrumb-item a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        .page-header .breadcrumb-item.active { color: #eee; }
        .page-title{color: white}


        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-left: 4px solid var(--main-color);
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
            background: #28a745;
        }
        .stats-card h4 { font-size: 32px; font-weight: 700; margin: 10px 0; color: #333; }
        .stats-card p { color: #6c757d; margin: 0; font-weight: 500; }

        #search-visite {
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            padding: 15px 25px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        #search-visite:focus {
            border-color: var(--main-color);
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
        }
        .table tbody tr:hover {
            background: #f0f4ff;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(102,126,234,0.1);
        }
        .table tbody td { padding: 15px; vertical-align: middle; color: #333; }

        .badge-custom {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .badge-success { background-color: #28a745; color: #fff; }
        .badge-warning { background-color: #ffc107; color: #212529; }
        .badge-secondary { background-color: #6c757d; color: #fff; }

        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 80px; color: #e0e0e0; margin-bottom: 20px; }

        @media (max-width: 768px) { .table-responsive { font-size: 0.85rem; } }

        .btn-pay {
            background: var(--main-gradient);
            color: white;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102,126,234,0.4);
            color: white;
            text-decoration: none;
        }
        .btn-pay:focus {
            outline: 2px solid #667eea;
            outline-offset: 2px;
        }

        /* Badge styles améliorés */
        .badge-paid {
            background-color: #20c997;
            color: white;
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.85rem;
        }

        /* Amélioration responsive */
        @media (max-width: 576px) {
            .table thead {
                font-size: 0.75rem;
            }
            .table tbody td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }
            .btn-pay {
                padding: 6px 10px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
<div class="container-scroller">
    @include('banniere')
    <div class="container-fluid page-body-wrapper">
        @include('menu')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"><i class="mdi mdi-eye"></i> Gestion des Visites</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('visite.create') }}"><i class="mdi mdi-plus-circle"></i> Ajouter une visite</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Visites</li>
                        </ol>
                    </nav>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-eye"></i></div>
                            <h4>{{ $visites->count() }}</h4>
                            <p>Visites enregistrées</p>
                        </div>
                    </div>
                </div>

                <input type="text"
                       id="search-visite"
                       class="form-control"
                       placeholder="Rechercher par client, bien, date..."
                       aria-label="Rechercher les visites"
                       autocomplete="off">

                <div class="row">
                    <div class="col-12">
                        <div class="table-card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Bien</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Statut</th>
                                            <th>Montant</th>
                                            <th>Moyen de paiement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="visites-tbody">
                                        @forelse($visites as $visite)
                                        <tr>
                                            <td data-search="true">
                                                {{ $visite->client->nom_client ?? 'N/A' }}
                                                {{ $visite->client->prenom_client ?? '' }}
                                            </td>
                                            <td data-search="true">
                                                {{ $visite->bien->type_bien ?? 'N/A' }} -
                                                {{ $visite->bien->adresse_bien ?? 'N/A' }}
                                            </td>
                                            <td data-search="true">
                                                {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }}
                                            </td>
                                            <td data-search="true">{{ $visite->heure_visite }}</td>
                                            <td data-search="true">
                                                <span class="badge-custom
                                                @if($visite->statut_visite === 'Confirmée') badge-success
                                                @elseif($visite->statut_visite === 'En attente') badge-warning
                                                @else badge-secondary
                                                @endif"
                                                      role="status"
                                                      aria-label="Statut: {{ $visite->statut_visite }}">
                                                    {{ $visite->statut_visite }}
                                                </span>
                                            </td>
                                            <td data-search="true">
                                                {{ number_format($visite->montant_visite ?? 0, 0, ',', ' ') }} FCFA
                                            </td>
                                            <td data-search="true">{{ $visite->moyen_paiement ?? '-' }}</td>
                                            <td data-search="false">
                                                @if($visite->statut_visite !== 'Confirmée' && $visite->statut_visite !== 'Payée')
                                                    <a href="{{ route('transactions.create', $visite->id) }}"
                                                       class="btn-pay"
                                                       title="Enregistrer un paiement pour cette visite"
                                                       aria-label="Payer la visite de {{ $visite->client->nom_client ?? 'Client' }}">
                                                        <i class="mdi mdi-cash" aria-hidden="true"></i> Payer
                                                    </a>
                                                @else
                                                    <span class="badge-paid" role="status" aria-label="Visite payée">
                                                        ✓ Payée
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8">
                                                <div class="empty-state">
                                                    <i class="mdi mdi-alert-circle-outline" aria-hidden="true"></i>
                                                    <h4>Aucune visite enregistrée</h4>
                                                    <p>Commencez par ajouter votre première visite</p>
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
    document.getElementById('search-visite').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase().trim();
        const rows = document.querySelectorAll('#visites-tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            if (row.querySelector('.empty-state')) return; // Skip empty state row

            const searchableCells = row.querySelectorAll('[data-search="true"]');
            let matches = searchValue === '' ||
                Array.from(searchableCells).some(cell =>
                    cell.textContent.toLowerCase().includes(searchValue)
                );

            row.style.display = matches ? '' : 'none';
            if (matches) visibleCount++;
        });
    });

    // Add keyboard navigation and focus management
    document.getElementById('search-visite').addEventListener('focus', function() {
        this.setAttribute('aria-expanded', 'true');
    });

    document.getElementById('search-visite').addEventListener('blur', function() {
        this.setAttribute('aria-expanded', 'false');
    });
</script>
</body>
</html>
