<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paiement de la Visite - BMI_IMMO</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* PAGE HEADER - Gradient violet (comme la page agent) */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
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

        /* PAYMENT HEADER - Violet uniforme */
        .payment-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
            text-align: center;
        }
        .payment-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 10px 0;
            text-transform: uppercase;
        }
        .payment-header .amount {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 15px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* SECTION CARDS */
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
            background: white;
        }

        /* INFO GRID */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
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

        /* FORM GROUPS */
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-group label i {
            color: #667eea;
            font-size: 18px;
        }
        .form-control, .form-select, select.form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus, select.form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        .text-danger {
            color: #dc3545;
            font-weight: 600;
        }

        /* MONTANT CARD */
        .montant-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(102,126,234,0.3);
            text-align: center;
            margin-bottom: 25px;
        }
        .montant-card h3 {
            font-weight: 700;
            margin: 0 0 10px 0;
            opacity: 0.95;
        }
        .montant-card .amount {
            font-size: 3rem;
            font-weight: 800;
            margin: 10px 0;
        }
        .montant-card .label {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        /* BUTTONS */
        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            margin: 5px;
        }
        .btn-success {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.1rem;
            padding: 15px 40px;
        }
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
        }
        .btn-light {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e0e0e0;
        }
        .btn-light:hover {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        /* INFO BOX */
        .info-box {
            background: linear-gradient(135deg, rgba(102,126,234,0.1) 0%, rgba(118,75,162,0.1) 100%);
            border-left: 4px solid #667eea;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-box i {
            color: #667eea;
            font-size: 24px;
        }
        .info-box strong {
            color: #667eea;
        }

        /* AIDE CARD */
        .aide-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(102,126,234,0.3);
            margin-bottom: 25px;
        }
        .aide-card h5 {
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .aide-card ul {
            margin: 0;
            padding-left: 20px;
        }
        .aide-card li {
            margin: 10px 0;
            opacity: 0.95;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-header { padding: 20px; }
            .payment-header h1 { font-size: 1.5rem; }
            .payment-header .amount { font-size: 2rem; }
            .section-card-body { padding: 20px; }
            .btn { padding: 10px 20px; font-size: 14px; width: 100%; margin: 5px 0; }
            .montant-card .amount { font-size: 2rem; }
        }

        /* ANIMATION */
        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
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

                <!-- PAGE HEADER -->
                <div class="page-header fade-in">
                    <div>
                        <h3 class="page-title mb-3">
                            <i class="mdi mdi-cash-multiple"></i> Paiement de la Visite
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('visite.index') }}">
                                        <i class="mdi mdi-calendar-check"></i> Liste des visites
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Paiement</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- PAYMENT HEADER -->
                <div class="payment-header fade-in">
                    <h1><i class="mdi mdi-cash-register"></i> PAIEMENT DE VISITE</h1>
                    <p style="opacity: 0.95; margin: 0;">Confirmez le paiement de la visite en renseignant le moyen de paiement</p>
                </div>

                <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf
                    <input type="hidden" name="visite_id" value="{{ $visite->id }}">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- DÉTAILS DE LA VISITE -->
                            <div class="section-card fade-in">
                                <div class="section-card-header"><i class="mdi mdi-information"></i> Détails de la Visite</div>
                                <div class="section-card-body">
                                    <div class="info-grid">
                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-account"></i> Client</div>
                                        <div class="info-value">{{ $visite->client->nom_client }} {{ $visite->client->prenom_client }}</div></div>

                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-home"></i> Bien</div>
                                        <div class="info-value">{{ $visite->bien->type_bien }}</div></div>

                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-map-marker"></i> Adresse</div>
                                        <div class="info-value">{{ $visite->bien->adresse_bien }}</div></div>

                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-calendar"></i> Date de visite</div>
                                        <div class="info-value">{{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }}</div></div>

                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-clock"></i> Heure</div>
                                        <div class="info-value">{{ $visite->heure_visite }}</div></div>

                                        <div class="info-item"><div class="info-label"><i class="mdi mdi-flag"></i> Statut</div>
                                        <div class="info-value">
                                            <span style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 5px 15px; border-radius: 15px; font-size: 0.9rem;">
                                                {{ $visite->statut ?? 'Programmée' }}
                                            </span>
                                        </div></div>
                                    </div>
                                </div>
                            </div>

                            <!-- INFORMATIONS DE PAIEMENT -->
                            <div class="section-card fade-in">
                                <div class="section-card-header"><i class="mdi mdi-credit-card"></i> Informations de Paiement</div>
                                <div class="section-card-body">
                                    <div class="form-group">
                                        <label><i class="mdi mdi-cash"></i> Moyen de paiement <span class="text-danger">*</span></label>
                                        <select name="moyen_paiement" class="form-control" required>
                                            <option value="">Sélectionnez un moyen de paiement</option>
                                            <option value="Espèces">💵 Espèces</option>
                                            <option value="Carte bancaire">💳 Carte bancaire</option>
                                            <option value="Virement">🏦 Virement bancaire</option>
                                            <option value="Mobile Money">📱 Mobile Money</option>
                                            <option value="Chèque">📄 Chèque</option>
                                        </select>
                                    </div>
                                    <div class="info-box">
                                        <i class="mdi mdi-information"></i>
                                        <span><strong>Important :</strong> Une transaction sera automatiquement créée après confirmation du paiement.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLONNE DROITE -->
                        <div class="col-lg-4">
                            <div class="montant-card fade-in">
                                <h3><i class="mdi mdi-cash-multiple"></i> MONTANT À PAYER</h3>
                                <div class="amount">{{ number_format($visite->montant_visite, 0, ',', ' ') }}</div>
                                <div class="label">Francs CFA (FCFA)</div>
                            </div>

                            <div class="aide-card fade-in">
                                <h5><i class="mdi mdi-account-circle"></i> Informations Client</h5>
                                @if($visite->client->email_client)
                                    <p style="margin: 10px 0;"><i class="mdi mdi-email"></i> {{ $visite->client->email_client }}</p>
                                @endif
                                @if($visite->client->tel_client)
                                    <p style="margin: 10px 0;"><i class="mdi mdi-phone"></i> {{ $visite->client->tel_client }}</p>
                                @endif
                                @if($visite->client->adresse_client)
                                    <p style="margin: 10px 0;"><i class="mdi mdi-map-marker"></i> {{ $visite->client->adresse_client }}</p>
                                @endif
                            </div>

                            <div class="section-card fade-in">
                                <div class="section-card-header"><i class="mdi mdi-help-circle"></i> Aide</div>
                                <div class="section-card-body">
                                    <ul style="padding-left: 20px; margin: 0;">
                                        <li style="margin: 10px 0;">Le moyen de paiement est obligatoire</li>
                                        <li style="margin: 10px 0;">Vérifiez les informations avant de confirmer</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="section-card fade-in">
                                <div class="section-card-body text-center" style="display:flex; flex-direction:column; gap:10px;">
                                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check-circle"></i> Confirmer le Paiement</button>
                                    <a href="{{ route('visite.index') }}" class="btn btn-light"><i class="mdi mdi-arrow-left"></i> Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.section-card, .montant-card, .aide-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        const form = document.querySelector('form');
        const moyenPaiement = document.querySelector('select[name="moyen_paiement"]');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!moyenPaiement.value) {
                    e.preventDefault();
                    alert('Veuillez sélectionner un moyen de paiement');
                    moyenPaiement.focus();
                    return false;
                }
            });
        }
    });
</script>

</body>
</html>
