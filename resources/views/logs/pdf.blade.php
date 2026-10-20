<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Journal d'Activité</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 5px 0;
            color: #2c3e50;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            color: #666;
            font-size: 11px;
        }

        .info-section {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-left: 3px solid #3498db;
        }

        .info-section p {
            margin: 3px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #2c3e50;
            color: white;
        }

        table th {
            padding: 10px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            border: 1px solid #ddd;
        }

        table td {
            padding: 8px 10px;
            border: 1px solid #ddd;
            font-size: 10px;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .action-badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
        }

        .action-create {
            background-color: #d4edda;
            color: #155724;
        }

        .action-update {
            background-color: #cce5ff;
            color: #004085;
        }

        .action-delete {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-view {
            background-color: #e7e7ff;
            color: #4d00b3;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px;
            color: #666;
        }

        .empty-message {
            text-align: center;
            padding: 20px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header">
        <h1>📋 Journal d'Activité</h1>
        <p>Rapport généré le {{ \Carbon\Carbon::now()->format('d/m/Y à H:i:s') }}</p>
    </div>

    <!-- Informations générales -->
    <div class="info-section">
        <p><strong>Total des enregistrements:</strong> {{ $logs->count() }}</p>
        <p><strong>Période:</strong>
            @if($logs->count() > 0)
                du {{ $logs->last()->created_at->format('d/m/Y') }} au {{ $logs->first()->created_at->format('d/m/Y') }}
            @else
                Aucun enregistrement
            @endif
        </p>
    </div>

    <!-- Tableau des logs -->
    @if($logs->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">Date/Heure</th>
                    <th style="width: 15%;">Utilisateur</th>
                    <th style="width: 15%;">Action</th>
                    <th style="width: 20%;">Modèle</th>
                    <th style="width: 40%;">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $log->user ? $log->user->name : 'Système' }}</td>
                        <td>
                            <span class="action-badge action-{{ strtolower($log->action) }}">
                                {{ strtoupper($log->action) }}
                            </span>
                        </td>
                        <td>{{ class_basename($log->loggable_type) ?? 'N/A' }}</td>
                        <td>{{ $log->description ?? 'Aucune description' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-message">
            Aucun enregistrement d'activité à afficher
        </div>
    @endif

    <!-- Pied de page -->
    <div class="footer">
        <p>Document généré automatiquement par le système de gestion BMI Immobilier</p>
        <p>{{ config('app.name') }} - Tous droits réservés</p>
    </div>
</body>
</html>
