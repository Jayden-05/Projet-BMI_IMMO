<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contrat - {{ $contrat->numero_contrat }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; color: #333; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { margin: 0; font-size: 28px; }
        .header h3 { margin: 5px 0; font-weight: normal; font-size: 18px; color: #555; }
        .section { margin-bottom: 25px; }
        .section h4 { border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-bottom: 10px; font-size: 16px; }
        .info { margin-bottom: 8px; }
        .info strong { display: inline-block; width: 150px; }
        .conditions { border: 1px solid #ffc107; background: #fff9e6; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <!-- Nom de l'entreprise -->
    <div class="header">
        <h1>{{ strtoupper(config('app.name', 'Nom de l\'Entreprise')) }}</h1>
        <h3>Contrat de {{ $contrat->type_contrat }} - {{ $contrat->numero_contrat }}</h3>
        <div>Date du contrat : {{ \Carbon\Carbon::parse($contrat->date_contrat)->format('d/m/Y') }}</div>
    </div>

    <!-- Informations générales -->
    <div class="section">
        <h4>Informations Générales</h4>
        <div class="info"><strong>Numéro :</strong> {{ $contrat->numero_contrat }}</div>
        <div class="info"><strong>Type :</strong> {{ $contrat->type_contrat }}</div>
        <div class="info"><strong>Statut :</strong> {{ $contrat->statut_contrat }}</div>
    </div>

    <!-- Client -->
    <div class="section">
        <h4>Le Locataire / Client</h4>
        <div class="info"><strong>Nom :</strong> {{ $contrat->client->nom_client ?? '-' }} {{ $contrat->client->prenom_client ?? '' }}</div>
        <div class="info"><strong>Email :</strong> {{ $contrat->client->email_client ?? '-' }}</div>
        <div class="info"><strong>Téléphone :</strong> {{ $contrat->client->tel_client ?? '-' }}</div>
    </div>

    <!-- Bien Loué -->
    <div class="section">
        <h4>Le Bien Loué</h4>
        <div class="info"><strong>Type :</strong> {{ $contrat->bien->type_bien ?? '-' }}</div>
        <div class="info"><strong>Adresse :</strong> {{ $contrat->bien->adresse_bien ?? '-' }}</div>
        <div class="info"><strong>Superficie :</strong> {{ $contrat->bien->superficie ?? '-' }} m²</div>
    </div>

    <!-- Détails financiers -->
    <div class="section">
        <h4>Détails Financiers</h4>
        <div class="info"><strong>Loyer :</strong> {{ number_format($contrat->montant_loyer, 0, ',', ' ') }} FCFA</div>
        <div class="info"><strong>Caution :</strong> {{ number_format($contrat->caution ?? 0, 0, ',', ' ') }} FCFA</div>
        <div class="info"><strong>Total :</strong> {{ number_format($contrat->montant_loyer + ($contrat->caution ?? 0), 0, ',', ' ') }} FCFA</div>
    </div>

    <!-- Conditions -->
    @if($contrat->conditions)
    <div class="section">
        <h4>Conditions du Contrat</h4>
        <div class="conditions">{{ $contrat->conditions }}</div>
    </div>
    @endif
</body>
</html>
