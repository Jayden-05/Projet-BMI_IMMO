<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Détails du contrat - {{ $contrat->numero_contrat }}</title>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

<style>
/* PAGE HEADER (comme Détails du Bien) */
.page-header {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(17,153,142,0.3);
}
.page-header h3 {
    color: white;
    margin: 0;
    font-weight: 600;
}
.page-header .breadcrumb {
    background: rgba(255,255,255,0.2);
    padding: 10px 20px;
    border-radius: 25px;
    margin: 0;
}
.page-header .breadcrumb-item a {
    color: white;
    text-decoration: none;
    font-weight: 500;
}
.page-header .breadcrumb-item.active {
    color: rgba(255,255,255,0.9);
}

/* CONTRAT HEADER (Titre principal) */
.contrat-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(102,126,234,0.3);
    text-align: center;
}
.contrat-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 10px 0;
    text-transform: uppercase;
}
.contrat-header h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 10px 0;
}
.contrat-header .badge {
    font-size: 1.2rem;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 25px;
    background: rgba(255,255,255,0.2);
    color: white;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

/* CARDS */
.section-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    overflow: hidden;
    border-left: 4px solid #667eea;
    transition: all 0.3s ease;
}
.section-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
.section-card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px 30px;
    font-weight: 600;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    gap: 10px;
}
.section-card-body {
    padding: 30px;
}

/* GRILLE D'INFO */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}
.info-item {
    background: #f8f9ff;
    padding: 20px;
    border-radius: 12px;
    border-left: 4px solid #667eea;
    transition: all 0.3s ease;
}
.info-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.info-label {
    font-size: 0.85rem;
    color: #6c757d;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.info-label i {
    color: #667eea;
    font-size: 18px;
}
.info-value {
    font-size: 1.1rem;
    color: #333;
    font-weight: 500;
}

/* BADGES STATUT */
.badge-status {
    padding: 10px 20px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 1rem;
    display: inline-block;
}
.badge-actif { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: white; }
.badge-expire { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; }
.badge-autre { background: #6c757d; color: white; }

/* BOX CONDITIONS */
.conditions-box {
    background: #fff9e6;
    border: 2px solid #ffd700;
    border-radius: 12px;
    padding: 20px;
    white-space: pre-line;
}

/* PROPRIETAIRE / CLIENT */
.proprietaire-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(102,126,234,0.3);
}
.proprietaire-card h5 {
    font-weight: 700;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.proprietaire-card p {
    margin: 10px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    opacity: 0.95;
}

/* BOUTONS */
.btn {
    padding: 12px 30px;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}
.btn-primary { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; }
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(240,147,251,0.4); }
.btn-secondary { background: #6c757d; color: white; }
.btn-secondary:hover { background: #5a6268; transform: translateY(-2px); }

/* ALERT */
.alert-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: white; }

@media (max-width: 768px) {
    .info-grid { grid-template-columns: 1fr; }
    .section-card-body { padding: 20px; }
}

@media print {
    .no-print { display: none !important; }
    .page-header, .contrat-header { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
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

                <!-- HEADER PAGE -->
                <div class="page-header no-print">
                    <div>
                        <h3 class="page-title mb-3">
                            <i class="mdi mdi-file-document"></i> Détails du Contrat
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('contrats.index') }}">
                                        <i class="mdi mdi-file-document-box"></i> Liste des contrats
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $contrat->numero_contrat }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success no-print">
                    <i class="mdi mdi-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <!-- EN-TÊTE DU CONTRAT -->
                <div class="contrat-header">
                    <h1>
                        <i class="mdi mdi-file-document"></i>
                        CONTRAT DE {{ strtoupper($contrat->type_contrat) }}
                    </h1>
                    <h3>{{ $contrat->numero_contrat }}</h3>
                    <span class="badge">
                        <i class="mdi mdi-calendar"></i>
                        Date du contrat : {{ \Carbon\Carbon::parse($contrat->date_contrat)->format('d/m/Y') }}
                    </span>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <!-- INFORMATIONS GENERALES -->
                        <div class="section-card">
                            <div class="section-card-header">
                                <i class="mdi mdi-information"></i> Informations Générales
                            </div>
                            <div class="section-card-body">
                                <div class="info-grid">
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-file-document"></i> Numéro de Contrat</div>
                                        <div class="info-value">{{ $contrat->numero_contrat }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-format-list-bulleted"></i> Type de Contrat</div>
                                        <div class="info-value">
                                            <span class="badge-status badge-actif">{{ $contrat->type_contrat }}</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-flag"></i> Statut</div>
                                        <div class="info-value">
                                            <span class="badge-status
                                                @if($contrat->statut_contrat === 'Actif') badge-actif
                                                @elseif($contrat->statut_contrat === 'Expiré') badge-expire
                                                @else badge-autre @endif">
                                                {{ $contrat->statut_contrat }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DÉTAILS FINANCIERS -->
                        <div class="section-card">
                            <div class="section-card-header"><i class="mdi mdi-cash-multiple"></i> Détails Financiers</div>
                            <div class="section-card-body">
                                <div class="info-grid">
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-cash"></i> Montant du Loyer</div>
                                        <div class="info-value text-success" style="font-size:1.3rem;">
                                            {{ number_format($contrat->montant_loyer,0,',',' ') }} FCFA
                                        </div>
                                    </div>
                                    @if($contrat->caution)
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-shield"></i> Caution / Garantie</div>
                                        <div class="info-value text-warning" style="font-size:1.3rem;">
                                            {{ number_format($contrat->caution,0,',',' ') }} FCFA
                                        </div>
                                    </div>
                                    @endif
                                    <div class="info-item">
                                        <div class="info-label"><i class="mdi mdi-calculator"></i> Total</div>
                                        <div class="info-value text-info" style="font-size:1.3rem;">
                                            {{ number_format($contrat->montant_loyer + ($contrat->caution ?? 0),0,',',' ') }} FCFA
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PÉRIODE DU CONTRAT -->
                        <div class="section-card">
                            <div class="section-card-header"><i class="mdi mdi-calendar-clock"></i> Période du Contrat</div>
                            <div class="section-card-body">
                                <div class="info-grid">
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-calendar-start"></i> Début</div><div class="info-value">{{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }}</div></div>
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-calendar-end"></i> Fin</div><div class="info-value">{{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</div></div>
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-timer-sand"></i> Durée</div><div class="info-value">
                                        @php
                                            $debut = \Carbon\Carbon::parse($contrat->date_debut);
                                            $fin = \Carbon\Carbon::parse($contrat->date_fin);
                                            $jours = $debut->diffInDays($fin);
                                        @endphp
                                        {{ $jours }} jours
                                    </div></div>
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-clock-alert"></i> Jours Restants</div><div class="info-value">
                                        @php $joursRestants = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($contrat->date_fin), false); @endphp
                                        @if($joursRestants>0)<span class="text-success">{{ $joursRestants }} jours</span>@else <span class="text-danger">Expiré</span> @endif
                                    </div></div>
                                </div>
                            </div>
                        </div>

                        <!-- CONDITIONS -->
                        @if($contrat->conditions)
                        <div class="section-card">
                            <div class="section-card-header"><i class="mdi mdi-text-box-multiple"></i> Conditions & Clauses</div>
                            <div class="section-card-body">
                                <div class="conditions-box">{{ $contrat->conditions }}</div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- PARTIES CONTRACTANTES -->
                    <div class="col-lg-4">
                        <!-- CLIENT -->
                        <div class="proprietaire-card">
                            <h5><i class="mdi mdi-account-circle"></i> Locataire / Client</h5>
                            <p><i class="mdi mdi-account"></i> {{ $contrat->client->nom_client ?? '-' }} {{ $contrat->client->prenom_client ?? '' }}</p>
                            @if($contrat->client->email_client)<p><i class="mdi mdi-email"></i> {{ $contrat->client->email_client }}</p>@endif
                            @if($contrat->client->tel_client)<p><i class="mdi mdi-phone"></i> {{ $contrat->client->tel_client }}</p>@endif
                        </div>

                        <!-- TRANSACTION -->
                        <div class="section-card mt-3">
                            <div class="section-card-header"><i class="mdi mdi-receipt"></i> Transaction</div>
                            <div class="section-card-body">
                                <div class="info-grid">
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-barcode"></i> Réf. Transaction</div><div class="info-value">{{ $contrat->transaction->reference_transaction ?? '-' }}</div></div>
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-calendar"></i> Créé le</div><div class="info-value">{{ \Carbon\Carbon::parse($contrat->created_at)->format('d/m/Y à H:i') }}</div></div>
                                    <div class="info-item"><div class="info-label"><i class="mdi mdi-pencil"></i> Dernière Modif.</div><div class="info-value">{{ \Carbon\Carbon::parse($contrat->updated_at)->format('d/m/Y à H:i') }}</div></div>
                                </div>
                            </div>
                        </div>

                        <!-- BOUTONS -->
                        <div class="section-card mt-3 no-print">
                            <div class="section-card-body text-center" style="display:flex; flex-direction:column; gap:10px;">
                                <a href="{{ route('contrats.pdf', $contrat->id) }}" class="btn btn-primary"><i class="mdi mdi-download"></i> Télécharger (PDF)</a>
                                <a href="{{ route('contrats.index') }}" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Retour à la liste</a>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary"><i class="mdi mdi-home"></i> Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer no-print">@include('copyright')</footer>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const cards = document.querySelectorAll('.section-card, .proprietaire-card');
    cards.forEach((card,index)=>{
        card.style.opacity='0';
        card.style.transform='translateY(20px)';
        setTimeout(()=>{
            card.style.transition='all 0.6s ease-out';
            card.style.opacity='1';
            card.style.transform='translateY(0)';
        }, index*100);
    });
});
</script>

</body>
</html>
