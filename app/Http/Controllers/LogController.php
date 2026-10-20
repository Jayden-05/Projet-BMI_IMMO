<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LogsExport;

class LogController extends Controller
{
    /**
     * Affichage + filtres
     */
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user . '%');
            });
        }

        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->latest()->paginate(15);

        return view('activity-logs.index', compact('logs'));
    }

    /**
     * Export Excel
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new LogsExport($request),
            'journal_activite.xlsx'
        );
    }

    /**
     * Export PDF
     */
    public function exportPdf(Request $request)
    {
        $logs = ActivityLog::with('user')->latest()->get();

        $pdf = Pdf::loadView('logs.pdf', compact('logs'));

        return $pdf->download('journal_activite.pdf');
    }
}
