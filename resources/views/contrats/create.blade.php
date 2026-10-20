<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Créer un Contrat - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

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
        .page-header h3 { color: white; margin: 0; font-weight: 600; }
        .page-header .breadcrumb {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin: 0;
        }
        .page-header .breadcrumb-item a { color: white; text-decoration: none; font-weight: 500; }
        .page-header .breadcrumb-item.active { color: rgba(255,255,255,0.9); }

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
        .contrat-header h1 { font-size: 2rem; font-weight: 700; margin: 0 0 10px 0; text-transform: uppercase; }
        .contrat-header p { margin: 0; font-size: 1.1rem; opacity: 0.95; }

        /* CARDS */
        .section-card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); margin-bottom: 25px; overflow: hidden; border-left: 4px solid #667eea; transition: all 0.3s ease; }
        .section-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .section-card-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px 30px; font-weight: 600; font-size: 1.2rem; display: flex; align-items: center; gap: 10px; }
        .section-card-body { padding: 30px; background: white; }

        /* FORM GROUPS */
        .form-group { margin-bottom: 20px; }
        .form-group label { font-weight: 600; color: #333; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; }
        .form-group label i { color: #667eea; font-size: 18px; }
        .form-control, .form-select, select.form-control { border: 2px solid #e0e0e0; border-radius: 10px; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease; }
        .form-control:focus, .form-select:focus, select.form-control:focus { border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25); outline: none; }
        textarea.form-control { min-height: 120px; resize: vertical; }
        .text-danger { color: #dc3545; font-weight: 600; }

        /* INFO BOX */
        .info-box { background: linear-gradient(135deg, rgba(102,126,234,0.1) 0%, rgba(118,75,162,0.1) 100%); border-left: 4px solid #667eea; padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        .info-box i { color: #667eea; font-size: 24px; }
        .info-box strong { color: #667eea; }

        /* BUTTONS */
        .btn { padding: 12px 30px; border-radius: 10px; font-weight: 600; border: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; margin: 5px; }
        .btn-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: white; }
        .btn-success:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(17,153,142,0.4); }
        .btn-light { background: #f8f9fa; color: #333; border: 2px solid #e0e0e0; }
        .btn-light:hover { background: #e9ecef; transform: translateY(-2px); }

        /* AIDE CARD */
        .aide-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px; box-shadow: 0 8px 25px rgba(102,126,234,0.3); margin-bottom: 25px; }
        .aide-card h5 { font-weight: 700; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
        .aide-card ul { margin: 0; padding-left: 20px; }
        .aide-card li { margin: 10px 0; opacity: 0.95; }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-header { padding: 20px; }
            .contrat-header h1 { font-size: 1.5rem; }
            .section-card-body { padding: 20px; }
            .btn { padding: 10px 20px; font-size: 14px; width: 100%; margin: 5px 0; }
        }

        /* ANIMATION */
        .fade-in { animation: fadeInUp 0.6s ease-out; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
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
                            <i class="mdi mdi-file-document-outline"></i> Créer un Nouveau Contrat
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('contrats.index')}}">
                                        <i class="mdi mdi-file-document-box"></i> Liste des contrats
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Nouveau contrat</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- CONTRAT HEADER -->
                <div class="contrat-header fade-in">
                    <h1>
                        <i class="mdi mdi-file-document-edit"></i>
                        NOUVEAU CONTRAT DE LOCATION
                    </h1>
                    <p>Remplissez tous les champs pour créer un contrat conforme</p>
                </div>

                <!-- FORMULAIRE -->
                <form method="POST" action="{{route('contrats.store')}}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- SECTION 1: INFORMATIONS GÉNÉRALES -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-information"></i> Informations Générales
                                </div>
                                <div class="section-card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-file-document"></i>
                                                    Numéro de Contrat
                                                </label>
                                                <input type="text" class="form-control" id="numero_contrat_display"
                                                       value="Sera généré automatiquement" readonly
                                                       style="background-color: #f8f9fa; color: #6c757d; font-style: italic;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-format-list-bulleted"></i>
                                                    Type de Contrat <span class="text-danger">*</span>
                                                </label>
                                                <select name="type_contrat" class="form-control" required>
                                                    <option value="">Sélectionnez un type</option>
                                                    <option value="Location résidentielle">Location résidentielle</option>
                                                    <option value="Location commerciale">Location commerciale</option>
                                                    <option value="Bail professionnel">Bail professionnel</option>
                                                    <option value="Sous-location">Sous-location</option>
                                                    <option value="Location meublée">Location meublée</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar"></i>
                                                    Date du Contrat <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" name="date_contrat" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-flag"></i>
                                                    Statut du Contrat <span class="text-danger">*</span>
                                                </label>
                                                <select name="statut_contrat" class="form-control" required>
                                                    <option value="">Sélectionnez un statut</option>
                                                    <option value="Actif">Actif</option>
                                                    <option value="En attente">En attente</option>
                                                    <option value="Expiré">Expiré</option>
                                                    <option value="Résilié">Résilié</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- SECTION 2: DÉTAILS FINANCIERS -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-cash-multiple"></i> Détails Financiers
                                </div>
                                <div class="section-card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-cash"></i>
                                                    Montant du Loyer (FCFA) <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" name="montant_loyer" class="form-control"
                                                       placeholder="Ex: 150000" min="0" step="1000" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-shield"></i>
                                                    Caution / Garantie (FCFA)
                                                </label>
                                                <input type="number" name="caution" class="form-control"
                                                       placeholder="Ex: 300000" min="0" step="1000">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-box">
                                        <i class="mdi mdi-lightbulb"></i>
                                        <span>
                                            <strong>Conseil :</strong> La caution correspond généralement à 2 ou 3 mois de loyer.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- SECTION 3: PÉRIODE DU CONTRAT -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-calendar-clock"></i> Période du Contrat
                                </div>
                                <div class="section-card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar-start"></i>
                                                    Date de Début <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar-end"></i>
                                                    Date de Fin <span class="text-danger">*</span>
                                                </label>
                                                <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-box" id="duree_info" style="display:none;">
                                        <i class="mdi mdi-timer-sand"></i>
                                        <span>
                                            <strong>Durée du contrat :</strong> <span id="duree_text">-</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- SECTION 4: CONDITIONS ET CLAUSES -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-text-box-multiple"></i> Conditions & Clauses
                                </div>
                                <div class="section-card-body">
                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-file-document-edit"></i>
                                            Conditions Particulières
                                        </label>
                                        <textarea name="conditions" class="form-control" rows="6"
                                                  placeholder="Décrivez les conditions particulières du contrat (entretien, charges, règlement intérieur, etc.)"></textarea>
                                    </div>

                                    <div class="info-box">
                                        <i class="mdi mdi-alert-circle"></i>
                                        <span>
                                            <strong>À inclure :</strong> Charges incluses/exclues, entretien, règles de copropriété, travaux autorisés, etc.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLONNE DROITE -->
                        <div class="col-lg-4">
                            <!-- INFORMATIONS TRANSACTION -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-receipt"></i> Transaction
                                </div>
                                <div class="section-card-body">
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-barcode"></i>
                                            Référence Transaction
                                        </label>
                                        <input type="text" class="form-control" value="{{ $transaction->reference_transaction }}" readonly style="background-color: #f8f9fa;">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-cash"></i>
                                            Montant Transaction
                                        </label>
                                        <input type="text" class="form-control" value="{{ number_format($transaction->montant, 0, ',', ' ') }} FCFA" readonly style="background-color: #f8f9fa;">
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-home"></i>
                                            Bien concerné
                                        </label>
                                        <input type="text" class="form-control" value="{{ $transaction->bien->type_bien }} - {{ $transaction->bien->adresse_bien }}" readonly style="background-color: #f8f9fa;">
                                    </div>
                                </div>
                            </div>

                            <!-- INFORMATIONS CLIENT -->
                            <div class="section-card fade-in">
                                <div class="section-card-header">
                                    <i class="mdi mdi-account-circle"></i> Locataire / Client
                                </div>
                                <div class="section-card-body">
                                    <input type="hidden" name="client_id" value="{{ $transaction->client->id }}">

                                    <div class="aide-card" style="margin: 0;">
                                        <h5><i class="mdi mdi-account"></i> {{ $transaction->client->nom_client }} {{ $transaction->client->prenom_client }}</h5>
                                        @if($transaction->client->email_client)
                                        <p style="margin: 10px 0;"><i class="mdi mdi-email"></i> {{ $transaction->client->email_client }}</p>
                                        @endif
                                        @if($transaction->client->tel_client)
                                        <p style="margin: 10px 0;"><i class="mdi mdi-phone"></i> {{ $transaction->client->tel_client }}</p>
                                        @endif
                                        @if($transaction->client->adresse_client)
                                        <p style="margin: 10px 0;"><i class="mdi mdi-map-marker"></i> {{ $transaction->client->adresse_client }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- AIDE -->
                            <div class="aide-card fade-in">
                                <h5><i class="mdi mdi-help-circle"></i> Aide</h5>
                                <ul>
                                    <li>Tous les champs avec <span class="text-danger">*</span> sont obligatoires</li>
                                    <li>Le contrat sera automatiquement associé au client et à la transaction</li>
                                    <li>Vérifiez bien les dates avant de valider</li>
                                    <li>La caution est optionnelle mais recommandée</li>
                                </ul>
                            </div>

                            <!-- BOUTONS D'ACTION -->
                            <div class="section-card fade-in">
                                <div class="section-card-body text-center" style="display:flex; flex-direction:column; gap:10px;">
                                    <button type="submit" class="btn btn-success">
                                        <i class="mdi mdi-check-circle"></i> Créer le Contrat
                                    </button>
                                    <a href="{{route('contrats.index')}}" class="btn btn-light">
                                        <i class="mdi mdi-arrow-left"></i> Annuler
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <footer class="footer">@include('copyright')</footer>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>

<script>
    // Animation d'entrée progressive
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.section-card, .aide-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Validation et calcul de durée
        const dateDebut = document.getElementById('date_debut');
        const dateFin = document.getElementById('date_fin');
        const dureeInfo = document.getElementById('duree_info');
        const dureeText = document.getElementById('duree_text');

        function calculateDuration() {
            if (dateDebut.value && dateFin.value) {
                const start = new Date(dateDebut.value);
                const end = new Date(dateFin.value);

                if (end < start) {
                    alert('La date de fin doit être postérieure à la date de début');
                    dateFin.value = '';
                    dureeInfo.style.display = 'none';
                    return;
                }

                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                const diffMonths = Math.floor(diffDays / 30);
                const remainingDays = diffDays % 30;
                const decimalDays = (diffDays / 30).toFixed(2);

                dureeText.textContent = `${diffMonths} mois et ${remainingDays} jours (${diffDays} jours = ${decimalDays} mois)`;
                dureeInfo.style.display = 'flex';
            } else {
                dureeInfo.style.display = 'none';
            }
        }

        if (dateDebut && dateFin) {
            dateDebut.addEventListener('change', function() {
                dateFin.min = this.value;
                calculateDuration();
            });

            dateFin.addEventListener('change', calculateDuration);
        }

        // Pré-remplir la date du contrat avec la date du jour
        const dateContratInput = document.querySelector('input[name="date_contrat"]');
        if (dateContratInput) {
            const today = new Date().toISOString().split('T')[0];
            dateContratInput.value = today;
        }
    });
</script>

</body>
</html>
