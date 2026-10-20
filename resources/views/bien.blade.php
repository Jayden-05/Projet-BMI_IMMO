<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des Biens - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        /* ========== STYLE UNIFIÉ BLEU-VIOLET BMI_IMMO ========== */

        /* Page Header - Gradient bleu-violet */
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
            color: white;
        }

        .page-header .breadcrumb {
            background: rgba(255, 255, 255, 0.2);
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

        .page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,0.9);
        }

        /* Search Card */
        .search-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        #search-bien {
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            padding: 15px 25px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        #search-bien:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .table thead th {
            background: #4c79ce;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border: none;
            padding: 18px 15px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f0f0f0;
        }

        .table tbody tr:hover {
            background: #f0f9ff;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(102,126,234,0.1);
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            color: #333;
        }

        /* Image miniature dans le tableau */
        .bien-image-thumb {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .bien-image-thumb:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .no-image-placeholder {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e0e0e0 0%, #f0f0f0 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 24px;
        }

        /* Badges de statut */
        .badge-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        .badge-disponible {
            background: linear-gradient(135deg, #3dac42 0%, #7dd1a7 100%);
            color: white;
        }

        .badge-loue {
            background: linear-gradient(135deg, #a64ac9 0%, #a15ecf 100%);
            color: white;
        }

        .badge-indisponible {
            background: linear-gradient(135deg, #e01f1f 0%, #cf1e12 100%);
            color: white;
        }

        /* Boutons d'action */
        .btn-sm {
            padding: 8px 15px;
            font-size: 0.85rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            margin: 2px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #a64ac9 0%, #a15ecf 100%);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(166,74,201,0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #810b0b 0%, #a01919 100%);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(250,112,154,0.4);
        }

        /* Stats Cards */
        .stats-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .stats-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stats-card h4 {
            font-size: 32px;
            font-weight: 700;
            margin: 10px 0;
            color: #333;
        }

        .stats-card p {
            color: #6c757d;
            margin: 0;
            font-weight: 500;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 80px;
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
        }

        .btn-action-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        /* Modal pour afficher l'image en grand */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            align-items: center;
            justify-content: center;
        }

        .image-modal.active {
            display: flex;
        }

        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .image-modal-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-modal-close:hover {
            transform: scale(1.2);
        }

        @media(max-width:768px) {
            .table-responsive { font-size:0.85rem; }
            .btn-sm { padding:6px 10px; font-size:0.75rem; }
            .stats-card { margin-bottom:15px; }
            .bien-image-thumb { width: 50px; height: 50px; }
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
                <!-- En-tête de page -->
                <div class="page-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="page-title mb-3">
                                <i class="mdi mdi-home-city"></i> Gestion des Biens Immobiliers
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('bien.create')}}">
                                            <i class="mdi mdi-plus-circle"></i> Ajouter un bien
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Liste des biens</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-home-city"></i></div>
                            <h4>{{ $biens->count() }}</h4>
                            <p>Total des biens</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-check-circle"></i></div>
                            <h4>{{ $biens->where('statut', 'Disponible')->count() }}</h4>
                            <p>Biens disponibles</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="icon"><i class="mdi mdi-key-variant"></i></div>
                            <h4>{{ $biens->where('statut', 'En location')->count() }}</h4>
                            <p>Biens loués</p>
                        </div>
                    </div>
                </div>

                <!-- Barre de recherche -->
                <div class="search-card">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="mdi mdi-magnify text-primary" style="font-size: 24px;"></i>
                        </span>
                        <input type="text" id="search-bien" class="form-control border-0"
                               placeholder="Rechercher par type, adresse, prix, statut...">
                    </div>
                </div>

                <!-- Tableau des biens -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i class="mdi mdi-image"></i> Image</th>
                                            <th><i class="mdi mdi-home-variant"></i> Type de bien</th>
                                            <th><i class="mdi mdi-map-marker"></i> Adresse</th>
                                            <th><i class="mdi mdi-ruler-square"></i> Superficie</th>
                                            <th><i class="mdi mdi-cash"></i> Prix</th>
                                            <th><i class="mdi mdi-information"></i> Statut</th>
                                            <th><i class="mdi mdi-text"></i> Description</th>
                                            <th><i class="mdi mdi-account"></i> Propriétaire</th>
                                            <th><i class="mdi mdi-cog"></i> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="biens-tbody">
                                        @forelse($biens as $bien)
                                        <tr>
                                            <td>
                                                @if($bien->mainImage)
                                                    <img src="{{ asset('storage/' . $bien->mainImage->image_path) }}"
                                                         alt="{{ $bien->type_bien }}"
                                                         class="bien-image-thumb"
                                                         onclick="showImageModal('{{ asset('storage/' . $bien->mainImage->image_path) }}')">
                                                @else
                                                    <div class="no-image-placeholder">
                                                        <i class="mdi mdi-image-off"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td><strong>{{ $bien->type_bien }}</strong></td>
                                            <td><i class="mdi mdi-map-marker text-danger"></i> {{ $bien->adresse_bien }}</td>
                                            <td>{{ number_format($bien->superficie,0,',',' ') }} m²</td>
                                            <td><strong class="text-success">{{ number_format($bien->prix,0,',',' ') }} FCFA</strong></td>
                                            <td>
                                                <span class="badge-status
                                                    @if($bien->statut === 'Disponible') badge-disponible
                                                    @elseif($bien->statut === 'Loué') badge-loue
                                                    @else badge-indisponible
                                                    @endif">
                                                    {{ $bien->statut }}
                                                </span>
                                            </td>
                                            <td><small>{{ Str::limit($bien->description,50) }}</small></td>
                                            <td><i class="mdi mdi-account-circle text-primary"></i> {{ $bien->proprietaire->nom_proprio ?? 'Non' }} {{ $bien->proprietaire->prenom_proprio ?? 'attribué' }}</td>
                                            <td>
                                                <div class="btn-action-group">
                                                    <a href="{{route('details',['id'=>$bien->id])}}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i> Détails</a>
                                                    <a href="{{ route('bien.edit',$bien->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i> Modifier</a>
                                                    <form action="{{ route('bien.destroy',$bien->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">
                                                            <i class="mdi mdi-delete"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9">
                                                <div class="empty-state">
                                                    <i class="mdi mdi-home-alert"></i>
                                                    <h4>Aucun bien enregistré</h4>
                                                    <p>Commencez par ajouter votre premier bien immobilier</p>
                                                    <a href="{{route('bien.create')}}" class="btn btn-primary mt-3"><i class="mdi mdi-plus"></i> Ajouter un bien</a>
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

<!-- Modal pour afficher l'image en grand -->
<div class="image-modal" id="imageModal" onclick="closeImageModal()">
    <span class="image-modal-close">&times;</span>
    <img id="modalImage" src="" alt="Image du bien">
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>

<script>
    // Recherche dans le tableau
    document.getElementById('search-bien').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#biens-tbody tr');
        rows.forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(searchValue) ? '' : 'none';
        });
    });

    // Afficher l'image en grand
    function showImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.add('active');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.remove('active');
    }

    // Fermer avec la touche Échap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });

    // Animation d'entrée
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
