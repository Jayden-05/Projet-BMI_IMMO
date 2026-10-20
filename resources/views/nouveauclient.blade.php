<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajouter un client - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        /* === COULEURS UNIFIÉES BLEU-VIOLET === */
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

        .page-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .breadcrumb {
            background: rgba(255,255,255,0.2);
            border-radius: 25px;
            padding: 10px 20px;
            margin-top: 10px;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb .active {
            color: rgba(255,255,255,0.9);
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            color: #333;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--main-color);
            display: inline-block;
            padding-bottom: 5px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--main-color);
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 30px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--main-gradient);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #6c757d;
        }

        .btn-secondary:hover {
            background: #e9ecef;
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
                <div class="page-header">
                    <h3 class="page-title">Nouveau client</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('client.index')}}">Clients</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajouter un client</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ajouter</h4>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <form class="forms-sample" action="{{ route('client.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nom_client">Nom</label>
                                        <input type="text" class="form-control" id="nom_client" name="nom_client" placeholder="Entrez le nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom_client">Prénom</label>
                                        <input type="text" class="form-control" id="prenom_client" name="prenom_client" placeholder="Entrez le prénom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel_client">Téléphone</label>
                                        <input type="text" class="form-control" id="tel_client" name="tel_client" placeholder="Numéro de téléphone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_client">Email</label>
                                        <input type="email" class="form-control" id="email_client" name="email_client" placeholder="Adresse email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="budget_client">Budget (FCFA)</label>
                                        <input type="number" class="form-control" id="budget_client" name="budget_client" placeholder="Budget" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="preferences">Préférences</label>
                                        <textarea class="form-control" id="preferences" name="preferences" rows="4" placeholder="Préférences du client"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                                        <a href="{{route('client.index')}}" class="btn btn-secondary">Annuler</a>
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

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<script src="{{asset('assets/js/jquery.cookie.js')}}"></script>
</body>
</html>
