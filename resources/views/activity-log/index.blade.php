<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journal d'Activité</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --info: #3b82f6;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-400: #9ca3af;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #1f2937;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
        }

        .page-title i {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 36px;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-card .stat-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .stat-card .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .stat-card .stat-label {
            font-size: 13px;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* CARD */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            background: white;
            overflow: hidden;
        }

        /* FILTER */
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .filter-card .filter-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-card label {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
            display: block;
        }

        .filter-card input,
        .filter-card select {
            border: 2px solid var(--gray-100);
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            width: 100%;
            transition: all 0.2s;
        }

        .filter-card input:focus,
        .filter-card select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        /* TABLE */
        .table-container {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: var(--gray-50);
        }

        .table th {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--gray-700);
            letter-spacing: 0.5px;
            padding: 16px;
            border: none;
        }

        .table td {
            font-weight: 500;
            color: var(--gray-600);
            padding: 16px;
            border-top: 1px solid var(--gray-100);
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background-color 0.2s;
        }

        .table tbody tr:hover {
            background: var(--gray-50);
        }

        /* USER */
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .user-details .user-name {
            font-weight: 700;
            color: var(--gray-900);
            font-size: 14px;
        }

        .user-details .user-role {
            font-size: 12px;
            color: var(--gray-400);
        }

        .ip-address,
        .timestamp {
            font-size: 13px;
            color: var(--gray-400);
        }

        /* BADGES */
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge i {
            font-size: 14px;
        }

        .badge-create {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
        }

        .badge-update {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            color: white;
        }

        .badge-delete {
            background: linear-gradient(135deg, #ef4444, #f87171);
            color: white;
        }

        .badge-login {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
            color: white;
        }

        .badge-logout {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
        }

        /* BUTTONS */
        .btn-main {
            background: linear-gradient(135deg, var(--primary), #818cf8);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
            color: white;
        }

        .btn-excel {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .btn-excel:hover {
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-pdf {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }

        .btn-pdf:hover {
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
        }

        .btn-reset {
            background: white;
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
        }

        .btn-reset:hover {
            background: var(--gray-50);
            border-color: var(--gray-300);
            color: var(--gray-700);
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state i {
            font-size: 64px;
            color: var(--gray-300);
            margin-bottom: 1rem;
        }

        .empty-state h4 {
            color: var(--gray-600);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--gray-400);
            font-size: 14px;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 1.5rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .filter-card {
                padding: 1.5rem;
            }

            .btn-main {
                width: 100%;
                justify-content: center;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card, .filter-card, .stat-card {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>

<body>
<div class="container-scroller">

    @include('banniere')

    <div class="container-fluid page-body-wrapper">
        @include('menu')

        <div class="container py-4">

            <!-- HEADER -->
            <div class="page-header">
                <h1 class="page-title">
                    <i class="mdi mdi-history"></i>
                    Journal d'Activité
                </h1>
            </div>

            <!-- STATISTICS (Optional) -->
            @if(isset($stats))
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon">📊</div>
                    <div class="stat-value">{{ $stats['total'] ?? 0 }}</div>
                    <div class="stat-label">Total d'activités</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value">{{ $stats['users'] ?? 0 }}</div>
                    <div class="stat-label">Utilisateurs actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div class="stat-value">{{ $stats['today'] ?? 0 }}</div>
                    <div class="stat-label">Aujourd'hui</div>
                </div>
            </div>
            @endif

            <!-- FILTRES -->
            <div class="filter-card">
                <div class="filter-title">
                    <i class="mdi mdi-filter-variant"></i>
                    Filtres de recherche
                </div>

                <form method="GET" action="{{ route('activity-log.index') }}" class="row g-3">

                    <div class="col-md-3">
                        <label for="user">Utilisateur</label>
                        <input type="text"
                               id="user"
                               name="user"
                               value="{{ request('user') }}"
                               class="form-control"
                               placeholder="Rechercher par nom">
                    </div>

                    <div class="col-md-3">
                        <label for="action">Type d'action</label>
                        <select name="action" id="action" class="form-control">
                            <option value="">Toutes les actions</option>
                            <option value="create" {{ request('action') == 'create' ? 'selected' : '' }}>
                                ✨ Création
                            </option>
                            <option value="update" {{ request('action') == 'update' ? 'selected' : '' }}>
                                ✏️ Modification
                            </option>
                            <option value="delete" {{ request('action') == 'delete' ? 'selected' : '' }}>
                                🗑️ Suppression
                            </option>
                            <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>
                                🔐 Connexion
                            </option>
                            <option value="logout" {{ request('action') == 'logout' ? 'selected' : '' }}>
                                🚪 Déconnexion
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="date">Date</label>
                        <input type="date"
                               id="date"
                               name="date"
                               value="{{ request('date') }}"
                               class="form-control"
                               max="{{ date('Y-m-d') }}">
                    </div>

                    <div class="col-md-4 d-flex gap-2 align-items-end">
                        <button type="submit" class="btn btn-main flex-grow-1">
                            <i class="mdi mdi-magnify"></i>
                            Rechercher
                        </button>

                        @if(request()->hasAny(['user', 'action', 'date']))
                        <a href="{{ route('activity-log.index') }}" class="btn btn-reset">
                            <i class="mdi mdi-refresh"></i>
                        </a>
                        @endif

                        <a href="{{ route('logs.export.excel') }}"
                           class="btn btn-main btn-excel"
                           title="Exporter en Excel">
                            <i class="mdi mdi-file-excel"></i>
                        </a>

                        <a href="{{ route('logs.export.pdf') }}"
                           class="btn btn-main btn-pdf"
                           title="Exporter en PDF">
                            <i class="mdi mdi-file-pdf"></i>
                        </a>
                    </div>

                </form>
            </div>

            <!-- TABLE -->
            <div class="card">
                <div class="card-body">

                    @if($logs->count())
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="25%">Utilisateur</th>
                                    <th width="15%">Action</th>
                                    <th width="30%">Description</th>
                                    <th width="15%">Adresse IP</th>
                                    <th width="15%">Date & Heure</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)

                                    @php
                                        $badgeConfig = match($log->action) {
                                            'create' => ['class' => 'badge-create', 'icon' => 'mdi-plus-circle'],
                                            'update' => ['class' => 'badge-update', 'icon' => 'mdi-pencil'],
                                            'delete' => ['class' => 'badge-delete', 'icon' => 'mdi-delete'],
                                            'login' => ['class' => 'badge-login', 'icon' => 'mdi-login'],
                                            'logout' => ['class' => 'badge-logout', 'icon' => 'mdi-logout'],
                                            default => ['class' => 'badge-create', 'icon' => 'mdi-information']
                                        };

                                        $userName = optional($log->user)->name ?? 'Inconnu';
                                        $userInitials = strtoupper(substr($userName, 0, 1));
                                    @endphp

                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <div class="user-avatar">
                                                    {{ $userInitials }}
                                                </div>
                                                <div class="user-details">
                                                    <div class="user-name">{{ $userName }}</div>
                                                    <div class="user-role">
                                                        {{ optional($log->user)->role ?? 'Aucun rôle' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="badge {{ $badgeConfig['class'] }}">
                                                <i class="mdi {{ $badgeConfig['icon'] }}"></i>
                                                {{ ucfirst($log->action) }}
                                            </span>
                                        </td>

                                        <td>
                                            <span title="{{ $log->description }}">
                                                {{ Str::limit($log->description ?? 'Aucune description', 50) }}
                                            </span>
                                        </td>

                                        <td class="ip-address">
                                            <i class="mdi mdi-ip"></i>
                                            {{ $log->ip_address ?? 'N/A' }}
                                        </td>

                                        <td class="timestamp">
                                            <i class="mdi mdi-clock-outline"></i>
                                            {{ $log->created_at->format('d/m/Y') }}
                                            <br>
                                            <small>{{ $log->created_at->format('H:i:s') }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3 px-3">
                            <div class="text-muted">
                                Affichage de {{ $logs->firstItem() }} à {{ $logs->lastItem() }}
                                sur {{ $logs->total() }} résultats
                            </div>
                            {{ $logs->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>

                    @else
                        <div class="empty-state">
                            <i class="mdi mdi-information-outline"></i>
                            <h4>Aucune activité trouvée</h4>
                            <p>
                                @if(request()->hasAny(['user', 'action', 'date']))
                                    Aucune activité ne correspond à vos critères de recherche.
                                    <br>
                                    <a href="{{ route('logs.index') }}" class="btn btn-main mt-3">
                                        <i class="mdi mdi-refresh"></i>
                                        Réinitialiser les filtres
                                    </a>
                                @else
                                    Aucune activité n'a encore été enregistrée dans le système.
                                @endif
                            </p>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>

<script>
    // Auto-submit form on action change (optional)
    document.getElementById('action')?.addEventListener('change', function() {
        if(confirm('Appliquer ce filtre maintenant ?')) {
            this.form.submit();
        }
    });

    // Add tooltips for long descriptions
    document.querySelectorAll('[title]').forEach(el => {
        el.style.cursor = 'help';
    });
</script>

</body>
</html>
