<?php

namespace App\Exports;

use App\Models\ActivityLog;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Http\Request;

class LogsExport implements FromArray, WithHeadings, WithTitle
{
    protected $request;

    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    public function array(): array
    {
        $query = ActivityLog::with('user');

        // Appliquer les filtres si la requête est fournie
        if ($this->request) {
            if ($this->request->filled('user')) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->request->user . '%');
                });
            }

            if ($this->request->filled('action')) {
                $query->where('action', $this->request->action);
            }

            if ($this->request->filled('date')) {
                $query->whereDate('created_at', $this->request->date);
            }
        }

        $logs = $query->latest()->get();

        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                $log->created_at->format('d/m/Y H:i:s'),
                $log->user ? $log->user->name : 'Système',
                strtoupper($log->action),
                class_basename($log->loggable_type) ?? 'N/A',
                $log->description ?? '-',
                $log->ip_address ?? '-',
            ];
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'Date/Heure',
            'Utilisateur',
            'Action',
            'Modèle',
            'Description',
            'Adresse IP',
        ];
    }

    public function title(): string
    {
        return 'Journal d\'Activité';
    }
}
