<?php
/**
 * Vue pour l'export Excel des logs d'activité
 */
?>

<table>
    <thead>
        <tr>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Date/Heure</th>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Utilisateur</th>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Action</th>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Modèle</th>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Description</th>
            <th style="background-color: #2c3e50; color: white; font-weight: bold;">Adresse IP</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                <td>{{ $log->user ? $log->user->name : 'Système' }}</td>
                <td>{{ strtoupper($log->action) }}</td>
                <td>{{ class_basename($log->loggable_type) ?? 'N/A' }}</td>
                <td>{{ $log->description ?? '-' }}</td>
                <td>{{ $log->ip_address ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #999;">Aucun enregistrement</td>
            </tr>
        @endforelse
    </tbody>
</table>
