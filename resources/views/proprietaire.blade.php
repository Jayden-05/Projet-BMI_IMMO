<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Propriétaires - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        /* HEADER */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }
        .page-header h3 { margin:0; font-weight:600; color:white; }
        .page-header .breadcrumb {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 25px;
            margin:0;
        }
        .page-header .breadcrumb-item a { color:white; text-decoration:none; font-weight:500; }
        .page-header .breadcrumb-item.active { color: rgba(255,255,255,0.9); }

        /* STAT CARDS */
        .stats-card {
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,0.08);
            margin-bottom:25px;
            text-align:center;
            transition: all 0.3s ease;
            border-left: 4px solid #667eea;
        }
        .stats-card:hover { transform:translateY(-5px); box-shadow:0 10px 30px rgba(0,0,0,0.15);}
        .stats-card .icon {
            width:60px; height:60px; border-radius:50%; display:flex; align-items:center; justify-content:center;
            margin:0 auto 15px; font-size:28px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white;
        }
        .stats-card h4 { font-size:32px; font-weight:700; margin:10px 0; color:#333; }
        .stats-card p { color:#6c757d; margin:0; font-weight:500; }

        /* RECHERCHE */
        .search-card { background:white; padding:25px; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08); margin-bottom:25px; }
        #search-proprietaire {
            border:2px solid #e0e0e0; border-radius:25px; padding:15px 25px; font-size:16px; transition: all 0.3s ease;
        }
        #search-proprietaire:focus { border-color:#667eea; box-shadow:0 0 0 0.2rem rgba(102,126,234,0.25); outline:none; }

        /* TABLE */
        .table-card { background:white; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08); overflow:hidden; }
        .table { margin-bottom:0; }
        .table thead th {
             background: #4c79ce;
            color:white; font-weight:600; text-transform:uppercase; font-size:0.85rem; letter-spacing:0.5px;
            border:none; padding:18px 15px; white-space:nowrap;
        }
        .table tbody tr { transition: all 0.3s ease; border-bottom:1px solid #f0f0f0; }
        .table tbody tr:hover { background:#f0f9ff; transform:translateY(-2px); box-shadow:0 3px 10px rgba(102,126,234,0.1); }
        .table tbody td { padding:15px; vertical-align:middle; color:#333; }

        .zone-text { background:#f8f9ff; padding:8px 12px; border-radius:8px; font-size:0.9rem; color:#666; display:inline-block; }

        /* EMPTY STATE */
        .empty-state { text-align:center; padding:60px 20px; }
        .empty-state i { font-size:80px; color:#e0e0e0; margin-bottom:20px; }

        @media(max-width:768px) { .table-responsive { font-size:0.85rem; } }
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
                <div class="page-header">
                    <div>
                        <h3 class="page-title mb-3"><i class="mdi mdi-account-tie"></i> Gestion des Propriétaires</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('proprietaire.create')}}"><i class="mdi mdi-plus-circle"></i> Ajouter un propriétaire</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des propriétaires</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- STATISTIQUES -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-account-multiple"></i></div>
                            <h4>{{ $proprietaires->count() }}</h4>
                            <p>Propriétaires enregistrés</p>
                        </div>
                    </div>
                </div>

                <!-- RECHERCHE -->
                <div class="search-card">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="mdi mdi-magnify text-primary" style="font-size:24px;"></i>
                        </span>
                        <input type="text" id="search-proprietaire" class="form-control border-0"
                               placeholder="Rechercher par nom, prénom, téléphone, email...">
                    </div>
                </div>

                <!-- TABLEAU -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="mdi mdi-account"></i> Nom</th>
                                            <th><i class="mdi mdi-account-outline"></i> Prénom</th>
                                            <th><i class="mdi mdi-phone"></i> Téléphone</th>
                                            <th><i class="mdi mdi-email"></i> E-mail</th>
                                            <th><i class="mdi mdi-map-marker"></i> Adresse</th>
                                        </tr>
                                    </thead>
                                    <tbody id="proprietaires-tbody">
                                        @forelse($proprietaires as $proprietaire)
                                        <tr>
                                            <td><strong>{{ $proprietaire->nom_proprio }}</strong></td>
                                            <td>{{ $proprietaire->prenom_proprio }}</td>
                                            <td><i class="mdi mdi-phone text-success"></i> {{ $proprietaire->tel_proprio }}</td>
                                            <td><i class="mdi mdi-email text-primary"></i> {{ $proprietaire->email_proprio }}</td>
                                            <td><i class="mdi mdi-map-marker text-danger"></i> {{ $proprietaire->adresse_proprio }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="empty-state">
                                                    <i class="mdi mdi-account-alert"></i>
                                                    <h4>Aucun propriétaire enregistré</h4>
                                                    <p>Commencez par ajouter votre premier propriétaire</p>
                                                    <a href="{{route('proprietaire.create')}}" class="btn btn-primary mt-3">
                                                        <i class="mdi mdi-plus"></i> Ajouter un propriétaire
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script>
    document.getElementById('search-proprietaire').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#proprietaires-tbody tr');
        rows.forEach(row => { row.style.display = row.textContent.toLowerCase().includes(searchValue) ? '' : 'none'; });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stats-card, .search-card, .table-card');
        cards.forEach((card,index)=>{
            setTimeout(()=>{
                card.style.opacity='0';
                card.style.transform='translateY(20px)';
                card.style.transition='all 0.5s ease';
                setTimeout(()=>{
                    card.style.opacity='1';
                    card.style.transform='translateY(0)';
                },50);
            }, index*100);
        });
    });
</script>
</body>
</html>
