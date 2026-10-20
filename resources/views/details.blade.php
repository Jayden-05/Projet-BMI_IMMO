<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détails - @if ($bien) {{ $bien->type_bien }} @else Aucun bien @endif</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .page-header h3 {
            color: white;
            margin: 0;
            font-weight: 600;
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
            color: rgba(255, 255, 255, 0.9);
        }

        .bien-header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(17, 153, 142, 0.3);
        }

        .bien-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .bien-header .prix {
            font-size: 2.5rem;
            font-weight: 800;
            margin-top: 10px;
        }

        .section-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            overflow: hidden;
            border-left: 4px solid #667eea;
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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

        .badge-status {
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-block;
        }

        .badge-disponible {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .badge-vendu {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }

        .badge-location {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        /* Galerie d'images avec carrousel */
        .image-gallery {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            background: #000;
        }

        .carousel-inner {
            border-radius: 15px;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(102, 126, 234, 0.8);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
            background: rgba(102, 126, 234, 1);
        }

        .carousel-indicators {
            bottom: 20px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background: rgba(255, 255, 255, 0.5);
        }

        .carousel-indicators button.active {
            background: #fff;
        }

        /* Miniatures d'images */
        .image-thumbnails {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        .image-thumbnail {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .image-thumbnail:hover {
            transform: scale(1.05);
            border-color: #667eea;
        }

        .image-thumbnail.active {
            border-color: #667eea;
        }

        .no-images-placeholder {
            text-align: center;
            padding: 60px 20px;
            background: #f8f9ff;
            border-radius: 15px;
        }

        .no-images-placeholder i {
            font-size: 80px;
            color: #e0e0e0;
            margin-bottom: 15px;
        }

        .proprietaire-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
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

        .visite-form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            padding: 35px;
            margin-top: 30px;
            border-left: 4px solid #f093fb;
        }

        .visite-form-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .visite-form-title i {
            color: #f093fb;
            font-size: 32px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #667eea;
            font-size: 16px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 18px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        select.form-control {
            cursor: pointer;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(240, 147, 251, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .alert {
            border: none;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .no-bien-message {
            text-align: center;
            padding: 60px 20px;
        }

        .no-bien-message i {
            font-size: 80px;
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .bien-header {
                padding: 25px;
            }

            .bien-header h2 {
                font-size: 1.5rem;
            }

            .bien-header .prix {
                font-size: 1.8rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .section-card-body {
                padding: 20px;
            }

            .carousel-item img {
                height: 300px;
            }

            .image-thumbnails {
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            }
        }

        @media print {
            .no-print {
                display: none !important;
            }

            .page-header, .visite-form-card {
                display: none !important;
            }
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
                <div class="page-header no-print">
                    <div>
                        <h3 class="page-title mb-3">
                            <i class="mdi mdi-information"></i> Détails du Bien Immobilier
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('bien.index')}}">
                                        <i class="mdi mdi-home-city"></i> Liste des biens
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @if ($bien) {{ $bien->type_bien }} @else Aucun bien @endif
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                @if ($bien)
                    <!-- En-tête du bien -->
                    <div class="bien-header">
                        <h2>
                            <i class="mdi mdi-home-variant"></i>
                            {{ $bien->type_bien }}
                        </h2>
                        <p style="margin: 0; opacity: 0.95;">
                            <i class="mdi mdi-map-marker"></i>
                            {{ $bien->adresse_bien }}
                        </p>
                        <div class="prix">
                            {{ number_format($bien->prix, 0, ',', ' ') }} FCFA
                        </div>
                    </div>

                    <div class="row">
                        <!-- Informations principales -->
                        <div class="col-lg-8">
                            <!-- Galerie d'images -->
                            @if($bien->images && $bien->images->count() > 0)
                            <div class="section-card">
                                <div class="section-card-header">
                                    <i class="mdi mdi-camera"></i>
                                    Photos du Bien ({{ $bien->images->count() }} image{{ $bien->images->count() > 1 ? 's' : '' }})
                                </div>
                                <div class="section-card-body">
                                    <div class="image-gallery">
                                        <div id="bienCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                @foreach($bien->images as $index => $image)
                                                    <button type="button" data-bs-target="#bienCarousel"
                                                            data-bs-slide-to="{{ $index }}"
                                                            class="{{ $index === 0 ? 'active' : '' }}"
                                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                                            aria-label="Image {{ $index + 1 }}"></button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                @foreach($bien->images as $index => $image)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                             alt="{{ $bien->type_bien }} - Image {{ $index + 1 }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#bienCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Précédent</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#bienCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Suivant</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Miniatures -->
                                    <div class="image-thumbnails">
                                        @foreach($bien->images as $index => $image)
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="Miniature {{ $index + 1 }}"
                                                 class="image-thumbnail {{ $index === 0 ? 'active' : '' }}"
                                                 onclick="goToSlide({{ $index }})">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="section-card">
                                <div class="section-card-header">
                                    <i class="mdi mdi-image-off"></i>
                                    Photos du Bien
                                </div>
                                <div class="section-card-body">
                                    <div class="no-images-placeholder">
                                        <i class="mdi mdi-image-off"></i>
                                        <h5>Aucune image disponible</h5>
                                        <p class="text-muted">Les photos de ce bien n'ont pas encore été ajoutées</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Informations du bien -->
                            <div class="section-card">
                                <div class="section-card-header">
                                    <i class="mdi mdi-information"></i>
                                    Informations Générales
                                </div>
                                <div class="section-card-body">
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="mdi mdi-home-variant"></i>
                                                Type de bien
                                            </div>
                                            <div class="info-value">{{ $bien->type_bien }}</div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="mdi mdi-check-circle"></i>
                                                Statut
                                            </div>
                                            <div class="info-value">
                                                <span class="badge-status
                                                    @if($bien->statut == 'Disponible') badge-disponible
                                                    @elseif($bien->statut == 'Vendu') badge-vendu
                                                    @else badge-location
                                                    @endif">
                                                    {{ $bien->statut }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="mdi mdi-ruler-square"></i>
                                                Superficie
                                            </div>
                                            <div class="info-value">{{ number_format($bien->superficie, 0, ',', ' ') }} m²</div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="mdi mdi-cash-multiple"></i>
                                                Prix
                                            </div>
                                            <div class="info-value text-success" style="font-size: 1.3rem;">
                                                {{ number_format($bien->prix, 0, ',', ' ') }} FCFA
                                            </div>
                                        </div>
                                    </div>

                                    @if($bien->description)
                                    <div class="info-item mt-4">
                                        <div class="info-label">
                                            <i class="mdi mdi-text-box"></i>
                                            Description
                                        </div>
                                        <div class="info-value" style="line-height: 1.6;">
                                            {{ $bien->description }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Propriétaire -->
                        <div class="col-lg-4">
                            <div class="proprietaire-card">
                                <h5>
                                    <i class="mdi mdi-account-circle"></i>
                                    Propriétaire
                                </h5>
                                @if($bien->proprietaire)
                                    <p>
                                        <i class="mdi mdi-account"></i>
                                        <strong>{{ $bien->proprietaire->nom_proprio }} {{ $bien->proprietaire->prenom_proprio }}</strong>
                                    </p>
                                    <p>
                                        <i class="mdi mdi-phone"></i>
                                        {{ $bien->proprietaire->tel_proprio }}
                                    </p>
                                    <p>
                                        <i class="mdi mdi-email"></i>
                                        {{ $bien->proprietaire->email_proprio }}
                                    </p>
                                @else
                                    <p>Aucun propriétaire associé</p>
                                @endif
                            </div>
                        </div>
                    </div>
                     @if($bien->statut == 'Disponible')
                    <!-- Formulaire de visite -->
                    <div class="visite-form-card no-print">
                        <div class="visite-form-title">
                            <i class="mdi mdi-eye-check"></i>
                            Planifier une Visite
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="mdi mdi-check-circle"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('enregistrer.visite', $bien->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h4>
                                            <i class="mdi mdi-account"></i>
                                            Client
                                        </h4>
                                    </div>
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
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-calendar"></i>
                                            Date de visite
                                        </label>
                                        <input type="date" name="date_visite" class="form-control" required>
                                    </div>



                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-clock"></i>
                                            Heure
                                        </label>
                                        <input type="time" name="heure_visite" class="form-control" required>
                                    </div>





                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-information"></i>
                                            Statut de la visite
                                        </label>
                                        <select name="statut_visite" class="form-control" required>
                                            <option value="" disabled selected>-- Choisir le statut --</option>
                                            <option value="Prévue">Prévue</option>
                                            <option value="Effectuée">Effectuée</option>
                                            <option value="Annulée">Annulée</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-cash"></i>
                                            Montant (FCFA)
                                        </label>
                                        <input type="number" name="montant_visite" class="form-control"
                                               placeholder="Ex: 10000" required>
                                    </div>



                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-credit-card"></i>
                                            Moyen de paiement
                                        </label>
                                        <select name="moyen_paiement" class="form-control" required>
                                            <option value="" disabled selected>-- Choisir --</option>
                                            <option value="Espèces">Espèces</option>
                                            <option value="Carte bancaire">Carte bancaire</option>
                                            <option value="Virement">Virement</option>
                                            <option value="Mobile Money">Mobile Money</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-4" style="display: flex; gap: 15px;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-calendar-check"></i>
                                    Planifier la visite
                                </button>
                                <a href="{{route('bien.index')}}" class="btn btn-secondary">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Retour à la liste
                                </a>
                            </div>
                        </form>
                    </div>
                     @endif

                @else
                    <div class="section-card">
                        <div class="section-card-body">
                            <div class="no-bien-message">
                                <i class="mdi mdi-home-alert"></i>
                                <h4>Aucun bien trouvé</h4>
                                <p class="text-muted">Le bien que vous recherchez n'existe pas ou a été supprimé.</p>
                                <a href="{{route('bien.index')}}" class="btn btn-primary mt-3">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Retour à la liste
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <footer class="footer no-print">
                @include('copyright')
            </footer>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>

<script>
    // Aller à une slide spécifique du carrousel
    function goToSlide(index) {
        const carousel = new bootstrap.Carousel(document.getElementById('bienCarousel'));
        carousel.to(index);

        // Mettre à jour les miniatures actives
        document.querySelectorAll('.image-thumbnail').forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
    }

    // Mettre à jour la miniature active lors du changement de slide
    document.getElementById('bienCarousel')?.addEventListener('slide.bs.carousel', function(e) {
        document.querySelectorAll('.image-thumbnail').forEach((thumb, i) => {
            thumb.classList.toggle('active', i === e.to);
        });
    });

    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.section-card, .proprietaire-card, .visite-form-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Date minimum = aujourd'hui
    const dateInput = document.querySelector('input[name="date_visite"]');
    if (dateInput) {
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    }
</script>
</body>
</html>
