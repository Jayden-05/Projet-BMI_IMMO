<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Transactions - BMI_IMMO</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* ========== STYLE UNIFIÉ BMI_IMMO ========== */

        /* Page Header - Dégradé bleu-violet */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }
        .page-header h3 { margin: 0; font-weight: 600; color: #fff }
        .page-header .breadcrumb {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin: 0;
        }
        .page-header .breadcrumb-item a { color: #fff; text-decoration: none; font-weight: 500; }
        .page-header .breadcrumb-item.active { color: #eee; }

        /* Stats cards */
        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border-left: 4px solid #667eea;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .stats-card .icon {
            width: 60px; height: 60px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
            background: #1ed159;
            color: white;
        }
        .stats-card h4 { font-size: 32px; font-weight: 700; margin: 10px 0; color: #333; }
        .stats-card p { color: #6c757d; margin: 0; font-weight: 500; }

        /* Search Card */
        .search-card, .table-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }
        #search-transaction {
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            padding: 15px 25px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        #search-transaction:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }

        /* Table */
        .table thead th {
            background: #4c79ce;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border: none;
            padding: 18px 15px;
            white-space: nowrap;
        }
        .table tbody tr { transition: all 0.3s ease; border-bottom: 1px solid #f0f0f0; }
        .table tbody tr:hover {
            background: #f2f4ff;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(102,126,234,0.2);
        }
        .table tbody td { padding: 15px; vertical-align: middle; color: #333; }

        /* Badges */
        .badge-success { background-color: #28a745; color: #fff; }
        .badge-warning { background-color: #ffc107; color: #212529; }
        .badge-danger { background-color: #dc3545; color: #fff; }
        .badge-info { background-color: #667eea; color: #fff; }

        /* Buttons */
        .btn-primary-gradient {
            background: linear-gradient(135deg, #66ea6d 0%, #29a039 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgb(255, 255, 255);
        }

        /* Empty state */
        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 80px; color: #e0e0e0; margin-bottom: 20px; }

        @media (max-width: 768px) {
            .table-responsive { font-size: 0.85rem; }
            .btn-sm { padding: 6px 10px; font-size: 0.75rem; }
            .stats-card { margin-bottom: 15px; }
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

                <!-- Page header -->
                <div class="page-header">
                    <div>
                        <h3 class="page-title mb-3"><i class="mdi mdi-cash-multiple"></i> Gestion des Transactions</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Liste des transactions</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-cash-multiple"></i></div>
                            <h4>{{ $transactions->count() }}</h4>
                            <p>Transactions enregistrées</p>
                        </div>
                    </div>
                </div>

                <!-- Barre de recherche -->
                <div class="search-card">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="mdi mdi-magnify text-primary" style="font-size: 24px;"></i>
                        </span>
                        <input type="text" id="search-transaction" class="form-control border-0"
                               placeholder="Rechercher par référence, client, bien, date...">
                    </div>
                </div>

                <!-- Tableau des transactions -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Client</th>
                                            <th>Bien</th>
                                            <th>Montant (FCFA)</th>
                                            <th>Moyen de paiement</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactions-tbody">
                                        @forelse($transactions as $transaction)
                                        <tr>
                                            <td><strong>{{ $transaction->reference_transaction }}</strong></td>
                                            <td>{{ $transaction->client->nom_client ?? '-' }} {{ $transaction->client->prenom_client ?? '' }}</td>
                                            <td>{{ $transaction->bien->type_bien ?? '-' }} - {{ $transaction->bien->adresse_bien ?? '' }}</td>
                                            <td><strong>{{ number_format($transaction->montant,0,',',' ') }}</strong></td>
                                            <td><span class="badge badge-info">{{ $transaction->moyen_paiement }}</span></td>
                                            <td>{{ \Carbon\Carbon::parse($transaction->date_transaction)->format('d/m/Y') }}</td>
                                            <td><span class="badge badge-success">{{ $transaction->statut_transaction }}</span></td>
                                            <td>{{ $transaction->note ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('paiements.create', $transaction->id) }}" class="btn btn-sm btn-primary-gradient">
                                                    <i class="mdi mdi-cash-multiple"></i> Louer
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9">
                                                <div class="empty-state">
                                                    <i class="mdi mdi-alert-circle-outline"></i>
                                                    <h4>Aucune transaction enregistrée</h4>
                                                    <p>Commencez par créer votre première transaction</p>
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
    // Recherche en temps réel
    document.getElementById('search-transaction').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#transactions-tbody tr');
        rows.forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(searchValue) ? '' : 'none';
        });
    });
</script>
</body>
</html>
