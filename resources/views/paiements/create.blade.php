<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enregistrer un paiement de location - BMI_IMMO</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
        /* HEADER GRADIENT VIOLET */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }
        .page-header h3 {
            margin: 0;
            font-weight: 600;
        }
        .breadcrumb {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin-top: 10px;
        }
        .breadcrumb a {
            color: white;
            text-decoration: none;
        }
        .breadcrumb-item.active {
            color: rgba(255,255,255,0.9);
        }

        /* CARDS STYLE */
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border-left: 4px solid #667eea;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #667eea;
        }

        /* Section divider */
        .section-divider {
            border-top: 3px solid #667eea;
            margin: 30px 0 25px;
            position: relative;
        }
        .section-divider::after {
            content: attr(data-title);
            position: absolute;
            top: -12px;
            left: 20px;
            background: white;
            padding: 0 15px;
            color: #667eea;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* FORM CONTROLS */
        .form-group label {
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
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
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
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
        }
        .btn-success {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.1rem;
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

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .page-header { padding: 20px; }
            .btn { width: 100%; margin: 5px 0; }
        }

        /* FADE IN */
        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Info box */
        .info-box {
            background: #f0f9ff;
            border-left: 4px solid #0284c7;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-box strong {
            color: #0284c7;
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

                <!-- HEADER -->
                <div class="page-header fade-in no-print">
                    <div>
                        <h3 class="page-title mb-3">
                            <i class="mdi mdi-cash-multiple"></i> Enregistrer un Paiement de Location
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('transactions.index') }}">
                                        <i class="mdi mdi-receipt"></i> Liste des transactions
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Réf : {{ $transaction->reference_transaction ?? 'Inconnue' }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- CARD FORM -->
                <div class="row fade-in">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-information-outline"></i> Informations de la transaction
                                </h4>

                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-md-6"><strong>Référence :</strong> {{ $transaction->reference_transaction }}</div>
                                        <div class="col-md-6"><strong>Montant total :</strong> {{ number_format($transaction->montant, 0, ',', ' ') }} FCFA</div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><strong>Client :</strong> {{ $transaction->client->nom_client }} {{ $transaction->client->prenom_client }}</div>
                                        <div class="col-md-6"><strong>Bien :</strong> {{ $transaction->bien->type_bien }} - {{ $transaction->bien->adresse_bien }}</div>
                                    </div>
                                </div>

                                <!-- FORMULAIRE -->
                                <form method="POST" action="{{ route('paiements.store') }}">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">

                                    <!-- SECTION PIÈCE D'IDENTITÉ -->
                                    <div class="section-divider" data-title="📋 Pièce d'identité du client"></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-card-account-details"></i>
                                                    Type de pièce <span class="text-danger">*</span>
                                                </label>
                                                <select name="typepiece" class="form-control @error('typepiece') is-invalid @enderror" required>
                                                    <option value="">Sélectionnez le type</option>
                                                    <option value="CNI" {{ old('typepiece') == 'CNI' ? 'selected' : '' }}>CNI (Carte Nationale d'Identité)</option>
                                                    <option value="Passeport" {{ old('typepiece') == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                                    <option value="Permis de conduire" {{ old('typepiece') == 'Permis de conduire' ? 'selected' : '' }}>Permis de conduire</option>
                                                    <option value="Carte consulaire" {{ old('typepiece') == 'Carte consulaire' ? 'selected' : '' }}>Carte consulaire</option>
                                                    <option value="Attestation identite" {{ old('typepiece') == "Attestation identite" ? 'selected' : '' }}>Attestation d'identité</option>
                                                </select>
                                                @error('typepiece')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-numeric"></i>
                                                    Numéro de la pièce <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                       name="numpiece"
                                                       class="form-control @error('numpiece') is-invalid @enderror"
                                                       value="{{ old('numpiece') }}"
                                                       placeholder="Ex: CI-123456789"
                                                       required>
                                                @error('numpiece')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar"></i>
                                                    Date d'émission <span class="text-danger">*</span>
                                                </label>
                                                <input type="date"
                                                       name="dateemission"
                                                       class="form-control @error('dateemission') is-invalid @enderror"
                                                       value="{{ old('dateemission') }}"
                                                       max="{{ date('Y-m-d') }}"
                                                       required>
                                                @error('dateemission')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SECTION PAIEMENT -->
                                    <div class="section-divider" data-title="💰 Informations de paiement"></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-cash"></i>
                                                    Montant du loyer (FCFA) <span class="text-danger">*</span>
                                                </label>
                                                <input type="number"
                                                       name="montant_loyer"
                                                       class="form-control @error('montant_loyer') is-invalid @enderror"
                                                       value="{{ old('montant_loyer') }}"
                                                       placeholder="150000"
                                                       required>
                                                @error('montant_loyer')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar-clock"></i>
                                                    Type de paiement <span class="text-danger">*</span>
                                                </label>
                                                <select name="type_paiement" class="form-control @error('type_paiement') is-invalid @enderror" required>
                                                    <option value="">Sélectionnez</option>
                                                    <option value="Mensuel" {{ old('type_paiement') == 'Mensuel' ? 'selected' : '' }}>Mensuel</option>
                                                    <option value="Trimestriel" {{ old('type_paiement') == 'Trimestriel' ? 'selected' : '' }}>Trimestriel</option>
                                                    <option value="Semestriel" {{ old('type_paiement') == 'Semestriel' ? 'selected' : '' }}>Semestriel</option>
                                                    <option value="Annuel" {{ old('type_paiement') == 'Annuel' ? 'selected' : '' }}>Annuel</option>
                                                </select>
                                                @error('type_paiement')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar-start"></i>
                                                    Date de début <span class="text-danger">*</span>
                                                </label>
                                                <input type="date"
                                                       name="date_debut"
                                                       class="form-control @error('date_debut') is-invalid @enderror"
                                                       value="{{ old('date_debut') }}"
                                                       required>
                                                @error('date_debut')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-calendar-end"></i>
                                                    Date de fin <span class="text-danger">*</span>
                                                </label>
                                                <input type="date"
                                                       name="date_fin"
                                                       class="form-control @error('date_fin') is-invalid @enderror"
                                                       value="{{ old('date_fin') }}"
                                                       required>
                                                @error('date_fin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-credit-card"></i>
                                            Moyen de paiement <span class="text-danger">*</span>
                                        </label>
                                        <select name="moyen_paiement" class="form-control @error('moyen_paiement') is-invalid @enderror" required>
                                            <option value="">Sélectionnez</option>
                                            <option value="Espèces" {{ old('moyen_paiement') == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                                            <option value="Carte bancaire" {{ old('moyen_paiement') == 'Carte bancaire' ? 'selected' : '' }}>Carte bancaire</option>
                                            <option value="Virement" {{ old('moyen_paiement') == 'Virement' ? 'selected' : '' }}>Virement</option>
                                            <option value="Mobile Money" {{ old('moyen_paiement') == 'Mobile Money' ? 'selected' : '' }}>Mobile Money</option>
                                            <option value="Chèque" {{ old('moyen_paiement') == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                                        </select>
                                        @error('moyen_paiement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-note-text"></i>
                                            Note (optionnel)
                                        </label>
                                        <textarea name="note"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Ajouter une remarque...">{{ old('note') }}</textarea>
                                    </div>

                                    <!-- SECTION CONTRAT (pour créer automatiquement le contrat) -->
                                    <div class="section-divider" data-title="📋 Informations du contrat (Auto-généré)"></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-format-list-bulleted"></i>
                                                    Type de Contrat <span class="text-danger">*</span>
                                                </label>
                                                <select name="type_contrat" class="form-control @error('type_contrat') is-invalid @enderror" required>
                                                    <option value="">Sélectionnez un type</option>
                                                    <option value="Location résidentielle" {{ old('type_contrat') == 'Location résidentielle' ? 'selected' : '' }}>Location résidentielle</option>
                                                    <option value="Location commerciale" {{ old('type_contrat') == 'Location commerciale' ? 'selected' : '' }}>Location commerciale</option>
                                                    <option value="Bail professionnel" {{ old('type_contrat') == 'Bail professionnel' ? 'selected' : '' }}>Bail professionnel</option>
                                                    <option value="Sous-location" {{ old('type_contrat') == 'Sous-location' ? 'selected' : '' }}>Sous-location</option>
                                                    <option value="Location meublée" {{ old('type_contrat') == 'Location meublée' ? 'selected' : '' }}>Location meublée</option>
                                                </select>
                                                @error('type_contrat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>
                                                    <i class="mdi mdi-shield"></i>
                                                    Caution / Garantie (FCFA) - Optionnel
                                                </label>
                                                <input type="number"
                                                       name="caution"
                                                       class="form-control"
                                                       value="{{ old('caution') }}"
                                                       placeholder="Ex: 300000"
                                                       min="0"
                                                       step="1000">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-file-document-edit"></i>
                                            Conditions Particulières
                                        </label>
                                        <textarea name="conditions"
                                                  class="form-control"
                                                  rows="4"
                                                  placeholder="Décrivez les conditions particulières du contrat...">{{ old('conditions') }}</textarea>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4 flex-wrap">
                                        <button type="submit" class="btn btn-success">
                                            <i class="mdi mdi-cash"></i> Enregistrer le paiement et générer le contrat
                                        </button>
                                        <a href="{{ route('transactions.index') }}" class="btn btn-light">
                                            <i class="mdi mdi-arrow-left"></i> Annuler
                                        </a>
                                    </div>
                                </form>

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
</body>
</html>
