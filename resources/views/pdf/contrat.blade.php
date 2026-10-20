<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contrat #{{ $contrat->id_contrat }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 40px;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        td, th {
            border: 1px solid #000;
            padding: 8px;
        }
        .section-title {
            background: #f5f5f5;
            padding: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Contrat Immobilier</h1>
    <h2>Numéro : {{ $contrat->id_contrat }}</h2>

    <p><strong>Date du contrat :</strong> {{ \Carbon\Carbon::parse($contrat->date_contrat)->format('d/m/Y') }}</p>
    <p><strong>Type de contrat :</strong> {{ $contrat->type_contrat }}</p>

    <hr>

    <h3 class="section-title">Informations du Client</h3>
    <p><strong>Nom :</strong> {{ $contrat->client->nom_client }} {{ $contrat->client->prenom_client }}</p>
    <p><strong>Téléphone :</strong> {{ $contrat->client->tel_client }}</p>
    <p><strong>Email :</strong> {{ $contrat->client->email_client ?? 'Non renseigné' }}</p>

    <h3 class="section-title">Informations du Bien</h3>
    <p><strong>Type :</strong> {{ $contrat->bien->type_bien }}</p>
    <p><strong>Adresse :</strong> {{ $contrat->bien->adresse_bien }}</p>
    <p><strong>Prix :</strong> {{ number_format($contrat->bien->prix, 0, ',', ' ') }} FCFA</p>

    <h3 class="section-title">Agent Immobilier</h3>
    <p><strong>Nom de l’agent :</strong> {{ $contrat->agent->nom_agent ?? 'Non spécifié' }}</p>

    <hr>

    <p style="margin-top: 40px;">Signature du client : ______________________</p>
    <p>Signature de l’agent : ______________________</p>

</body>
</html>
