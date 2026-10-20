<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* STAT CARDS */
        .stat-card {
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.2);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card .card-body {
            padding: 1.5rem;
        }

        .stat-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-title {
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
            margin: 8px 0;
        }

        .stat-change {
            font-size: 12px;
            color: var(--success);
            font-weight: 600;
        }

        .progress {
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        /* FINANCIAL CARDS */
        .financial-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .financial-card::after {
            content: '';
            position: absolute;
            right: -50px;
            top: -50px;
            width: 150px;
            height: 150px;
            background: rgba(99, 102, 241, 0.05);
            border-radius: 50%;
        }

        .financial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .financial-card .card-body {
            padding: 1.8rem;
            position: relative;
            z-index: 1;
        }

        .financial-title {
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .financial-amount {
            font-size: 26px;
            font-weight: 800;
            margin: 10px 0;
        }

        .financial-subtitle {
            font-size: 12px;
            color: #9ca3af;
        }

        /* CARD STYLES */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            background: white;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card-body {
            padding: 1.8rem;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* TABLE STYLES */
        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        }

        .table thead th {
            border: none;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #374151;
            padding: 1rem;
        }

        .table tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #f3f4f6;
        }

        .table tbody tr:hover {
            background-color: #fafafa;
        }

        .table tbody td {
            padding: 1rem;
            color: #4b5563;
            font-weight: 500;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .bg-success {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
        }

        .bg-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
        }

        .bg-warning {
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
            color: white;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--info) 0%, #0891b2 100%);
            color: white;
        }

        .bg-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        /* MINI STATS */
        .mini-stat {
            padding: 15px;
            border-radius: 12px;
            background: white;
            border: 2px solid #f3f4f6;
            transition: all 0.3s ease;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mini-stat:hover {
            border-color: var(--primary);
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            transform: translateX(5px);
        }

        .mini-stat-value {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        /* BREADCRUMB */
        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            color: #9ca3af;
            font-size: 13px;
            font-weight: 500;
        }

        .breadcrumb-item.active {
            color: var(--primary);
            font-weight: 600;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #9ca3af;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* FOOTER */
        .footer {
            border-top: 1px solid #e5e7eb;
            margin-top: 3rem;
            padding: 2rem;
            background: white;
        }

        /* ANIMATIONS */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card, .card, .financial-card {
            animation: slideIn 0.5s ease forwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.05s; }
        .stat-card:nth-child(2) { animation-delay: 0.1s; }
        .stat-card:nth-child(3) { animation-delay: 0.15s; }
        .stat-card:nth-child(4) { animation-delay: 0.2s; }
        .stat-card:nth-child(5) { animation-delay: 0.25s; }
        .stat-card:nth-child(6) { animation-delay: 0.3s; }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-title {
                font-size: 22px;
            }

            .stat-value {
                font-size: 24px;
            }

            .financial-amount {
                font-size: 20px;
            }

            .stat-icon {
                font-size: 28px;
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
            <div class="content-wrapper" style="padding: 2rem;">
                <!-- PAGE HEADER -->
                <div class="page-header d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="page-title mb-2">
                            <i class="mdi mdi-home"></i> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Overview</li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- 🔢 STATISTIQUES PRINCIPALES -->
                <div class="row mb-4">
                    @php
                        $stats = [
                            ['title' => 'Propriétaires', 'total' => $totalProprietaires, 'percent' => $percentProprietaires, 'color' => '#6366f1', 'icon' => '👤'],
                            ['title' => 'Clients', 'total' => $totalClients, 'percent' => $percentClients, 'color' => '#10b981', 'icon' => '🧍‍♂️'],
                            ['title' => 'Biens', 'total' => $totalBiens, 'percent' => $percentBiens, 'color' => '#f59e0b', 'icon' => '🏠'],
                            ['title' => 'Visites', 'total' => $totalVisites, 'percent' => $percentVisites, 'color' => '#ef4444', 'icon' => '👁️'],
                            ['title' => 'Agents', 'total' => $totalAgents, 'percent' => $percentAgents, 'color' => '#8b5cf6', 'icon' => '👤'],
                            ['title' => 'Transactions', 'total' => $totalTransactions, 'percent' => $percentTransactions, 'color' => '#06b6d4', 'icon' => '💰'],
                        ];
                    @endphp

                    @foreach($stats as $item)
                        <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                            <div class="stat-card">
                                <div class="card-body">
                                    <div class="stat-icon">{{ $item['icon'] }}</div>
                                    <p class="stat-title">{{ $item['title'] }}</p>
                                    <h4 class="stat-value">{{ $item['total'] }}</h4>
                                    <p class="stat-change"><i class="mdi mdi-trending-up"></i> +{{ $item['percent'] }}% cette semaine</p>
                                    <div class="progress mt-3">
                                        <div class="progress-bar" style="width: {{ $item['percent'] }}%; background: linear-gradient(90deg, {{ $item['color'] }}, {{ $item['color'] }}dd);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- 💰 RÉSUMÉ FINANCIER -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="financial-card">
                            <div class="card-body">
                                <p class="financial-title"><i class="mdi mdi-cash-multiple"></i> Total Encaissé</p>
                                <h2 class="financial-amount" style="color: var(--success);">{{ number_format($montantTotalTransactions, 0, ',', ' ') }}</h2>
                                <p class="financial-subtitle">FCFA • Depuis le début</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="financial-card">
                            <div class="card-body">
                                <p class="financial-title"><i class="mdi mdi-chart-line"></i> Cette Semaine</p>
                                <h2 class="financial-amount" style="color: var(--info);">{{ number_format($montantWeeklyTransactions, 0, ',', ' ') }}</h2>
                                <p class="financial-subtitle">FCFA • {{ $weeklyTransactions }} transaction(s)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="financial-card">
                            <div class="card-body">
                                <p class="financial-title"><i class="mdi mdi-calendar"></i> Ce Mois</p>
                                <h2 class="financial-amount" style="color: var(--warning);">{{ number_format($montantMonthlyTransactions, 0, ',', ' ') }}</h2>
                                <p class="financial-subtitle">FCFA • {{ \Carbon\Carbon::now()->format('F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 📊 STATS -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="mdi mdi-clipboard-list"></i> Statut des Visites</h5>
                                <div class="row">
                                    @foreach($visitesByStatut as $statut)
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="mini-stat">
                                                <span>{{ $statut->statut_visite }}</span>
                                                <span class="mini-stat-value">{{ $statut->total }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 🏆 TOP PERFORMERS -->
                <div class="row mb-4">
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="mdi mdi-trophy"></i> Top 5 Clients</h5>
                                @if($topClients->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Client</th>
                                                    <th class="text-end">Visites</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($topClients as $client)
                                                    <tr>
                                                        <td><i class="mdi mdi-account-circle"></i> {{ $client->nom_client }} {{ $client->prenom_client }}</td>
                                                        <td class="text-end"><span class="badge bg-primary">{{ $client->visites_count }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="empty-state"><i class="mdi mdi-inbox-multiple"></i> Aucune donnée disponible</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="mdi mdi-home-city"></i> Biens les Plus Visités</h5>
                                @if($biensPopulaires->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Bien</th>
                                                    <th class="text-end">Visites</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($biensPopulaires as $bien)
                                                    <tr>
                                                        <td><i class="mdi mdi-home"></i> {{ $bien->type_bien }} - {{ Str::limit($bien->adresse_bien, 30) }}</td>
                                                        <td class="text-end"><span class="badge bg-success">{{ $bien->visites_count }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="empty-state"><i class="mdi mdi-inbox-multiple"></i> Aucune donnée disponible</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 📅 VISITES DU JOUR -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="mdi mdi-calendar-today"></i>
                                    Visites Prévues Aujourd'hui
                                    <span class="badge bg-primary ms-2">{{ $visitesToday->count() }}</span>
                                </h5>
                                @if($visitesToday->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Client</th>
                                                    <th>Bien</th>
                                                    <th>Heure</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($visitesToday as $visite)
                                                    <tr>
                                                        <td><i class="mdi mdi-account"></i> {{ $visite->client->nom_client ?? '-' }} {{ $visite->client->prenom_client ?? '' }}</td>
                                                        <td>{{ $visite->bien->type_bien ?? '-' }}</td>
                                                        <td><i class="mdi mdi-clock"></i> <strong>{{ $visite->heure_visite }}</strong></td>
                                                        <td>
                                                            <span class="badge
                                                                @if($visite->statut_visite === 'Confirmée') bg-success
                                                                @elseif($visite->statut_visite === 'En attente') bg-warning
                                                                @else bg-secondary @endif">
                                                                {{ $visite->statut_visite }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="empty-state"><i class="mdi mdi-calendar-blank"></i> Aucune visite prévue aujourd'hui</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 💳 DERNIÈRES TRANSACTIONS -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="mdi mdi-credit-card"></i> Dernières Transactions</h5>
                                @if($dernieresTransactions->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Référence</th>
                                                    <th>Client</th>
                                                    <th>Bien</th>
                                                    <th>Montant</th>
                                                    <th>Moyen</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dernieresTransactions as $trans)
                                                    <tr>
                                                        <td><strong>{{ $trans->reference_transaction }}</strong></td>
                                                        <td>{{ $trans->client->nom_client ?? '-' }} {{ $trans->client->prenom_client ?? '' }}</td>
                                                        <td>{{ $trans->bien->type_bien ?? '-' }}</td>
                                                        <td><strong style="color: var(--success);">{{ number_format($trans->montant, 0, ',', ' ') }} FCFA</strong></td>
                                                        <td><span class="badge bg-info">{{ $trans->moyen_paiement }}</span></td>
                                                        <td>{{ \Carbon\Carbon::parse($trans->date_transaction)->format('d/m/Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="empty-state"><i class="mdi mdi-inbox-multiple"></i> Aucune transaction</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WEEK PERIOD -->
                <p class="text-center text-muted mt-4">
                    <i class="mdi mdi-calendar-range"></i>
                    Semaine du <strong>{{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }}</strong>
                    au <strong>{{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}</strong>
                </p>
            </div>

            <footer class="footer">
                @include('copyright')
            </footer>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
</body>
</html> 
