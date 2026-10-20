<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Nouvelle visite - BMI_IMMO</title>
<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
<style>
:root {
    --main-gradient: linear-gradient(135deg,#667eea 0%,#764ba2 100%);
    --main-color: #667eea;
}
.page-header {
    background: var(--main-gradient);
    color: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(102,126,234,0.3);
}
.page-header h3 { margin:0; font-weight:600; }
.page-header .breadcrumb {
    background: rgba(255,255,255,0.2);
    padding:10px 20px;
    border-radius:25px;
    margin:0;
}
.page-header .breadcrumb-item a { color:white; text-decoration:none; font-weight:500; }
.page-header .breadcrumb-item.active { color:#eee; }

.card { border:none; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08); overflow:hidden; }
.card-body { padding:40px; }
.card-title { font-weight:600; font-size:1.5rem; margin-bottom:30px; padding-bottom:5px; border-bottom:3px solid var(--main-color); color:#333; }

.form-group label { font-weight:600; color:#555; }
.form-control { border-radius:10px; padding:12px 20px; font-size:15px; border:2px solid #e0e0e0; transition: all 0.3s ease; }
.form-control:focus { border-color: var(--main-color); box-shadow:0 0 0 0.2rem rgba(102,126,234,0.25); outline:none; }

.btn { border-radius:10px; font-weight:600; font-size:15px; padding:12px 30px; border:none; transition:all 0.3s ease; }
.btn-primary { background: var(--main-gradient); color:white; }
.btn-primary:hover { transform:translateY(-2px); box-shadow:0 8px 20px rgba(102,126,234,0.4); }
.btn-secondary { background:#f8f9fa; color:#6c757d; }
.btn-secondary:hover { background:#e9ecef; color:#495057; }

.form-section { background:#f8f9ff; padding:25px; border-radius:10px; margin-bottom:25px; border-left:4px solid var(--main-color); }
.form-section-title { font-weight:600; color: var(--main-color); margin-bottom:20px; display:flex; align-items:center; gap:10px; }
.form-section-title i { font-size:24px; }
.required-asterisk { color:#dc3545; margin-left:3px; }

@media (max-width:768px) { .card-body{padding:25px;} .btn{width:100%; margin-bottom:10px;} }
</style>
</head>
<body>
<div class="container-scroller">
@include('banniere')
<div class="container-fluid page-body-wrapper">
@include('menu')
<div class="main-panel">
<div class="content-wrapper">

<div class="page-header">
<h3 class="page-title">Nouvelle visite</h3>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('visite.index')}}">Visites</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouvelle visite</li>
</ol>
</nav>
</div>

<div class="row">
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title"><i class="mdi mdi-plus-circle-outline"></i> Ajouter une visite</h4>

@if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
@if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

<form class="forms-sample" method="POST" action="{{ route('visite.store') }}">
@csrf

<div class="form-section">
<div class="form-section-title"><i class="mdi mdi-account-multiple"></i> Informations sur la visite</div>

<div class="form-group">
<label for="client_id">Client concerné <span class="required-asterisk">*</span></label>
<select class="form-control select2" id="client_id" name="client_id" required>
<option value="" disabled selected>Choisir un client</option>
@foreach($clients as $client)
<option value="{{ $client->id }}">{{ $client->nom_client }} {{ $client->prenom_client }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label for="bien_id">Bien concerné <span class="required-asterisk">*</span></label>
<select class="form-control select2" id="bien_id" name="bien_id" required>
<option value="" disabled selected>Choisir un bien</option>
@foreach($biens as $bien)
<option value="{{ $bien->id }}">{{ $bien->type_bien }} - {{ $bien->adresse_bien }}</option>
@endforeach
</select>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="date_visite">Date de visite <span class="required-asterisk">*</span></label>
<input type="date" class="form-control" id="date_visite" name="date_visite" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="heure_visite">Heure de visite <span class="required-asterisk">*</span></label>
<input type="time" class="form-control" id="heure_visite" name="heure_visite" required>
</div>
</div>
</div>

<div class="form-group">
<label for="statut_visite">Statut de visite <span class="required-asterisk">*</span></label>
<select class="form-control" id="statut_visite" name="statut_visite" required>
<option value="" disabled selected>Statut</option>
<option value="Planifiée">Planifiée</option>
<option value="Confirmée">Confirmée</option>
<option value="Annulée">Annulée</option>
</select>
</div>

<div class="form-group">
<label for="montant_visite">Montant (FCFA)</label>
<input type="number" class="form-control" id="montant_visite" name="montant_visite" step="100" min="0">
</div>

<div class="form-group">
<label for="moyen_paiement">Moyen de paiement</label>
<select class="form-control" id="moyen_paiement" name="moyen_paiement">
<option value="" disabled selected>Choisir un moyen de paiement</option>
<option value="Espèces">Espèces</option>
</select>
</div>
</div>

<div class="d-flex justify-content-end mt-4">
<button type="submit" class="btn btn-primary me-2"><i class="mdi mdi-check-circle"></i> Ajouter la visite</button>
<a href="{{ route('visite.index') }}" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Retour</a>
</div>
</form>

</div>
</div>
</div>
</div>

</div>
<footer class="footer">@include('copyright')</footer>
</div>
</div>
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script>$(document).ready(function(){$('.select2').select2({theme:'bootstrap',width:'100%'});});</script>
</body>
</html>
