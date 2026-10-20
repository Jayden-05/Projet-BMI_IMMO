<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier Bien - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        /* ========== STYLE UNIFIÉ BLEU-VIOLET BMI_IMMO ========== */

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

        .page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,0.9);
        }

        /* Edit Card */
        .edit-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .edit-card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
            border-bottom: none;
        }

        .edit-card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .edit-card-header i {
            font-size: 28px;
        }

        .edit-card-body {
            padding: 40px;
            background: white;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
        }

        .form-group label i {
            color: #667eea;
            font-size: 18px;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
            outline: none;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23667eea' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }

        .required-asterisk {
            color: #dc3545;
            margin-left: 3px;
        }

        .form-hint {
            font-size: 13px;
            color: #6c757d;
            margin-top: 5px;
            display: block;
        }

        .current-value-badge {
            display: inline-block;
            background: #f8f9ff;
            color: #667eea;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }

        /* Styles pour les images */
        .existing-images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .existing-image-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .existing-image-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .existing-image-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }

        .existing-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .existing-image-item:hover .existing-image-overlay {
            opacity: 1;
        }

        .delete-image-checkbox {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        .image-main-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .file-upload-wrapper {
            position: relative;
            border: 3px dashed #e0e0e0;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9ff;
            cursor: pointer;
        }

        .file-upload-wrapper:hover {
            border-color: #667eea;
            background: #f0f3ff;
        }

        .file-upload-wrapper.dragover {
            border-color: #667eea;
            background: #e8ebff;
            transform: scale(1.02);
        }

        .file-upload-default {
            display: none;
        }

        .file-upload-icon {
            font-size: 48px;
            color: #667eea;
            margin-bottom: 15px;
        }

        .file-upload-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .file-upload-hint {
            font-size: 13px;
            color: #999;
        }

        .image-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .image-preview-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-preview-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .image-preview-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }

        .image-preview-remove {
            position: absolute;
            top: 5px;
            right: 5px;
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .image-preview-remove:hover {
            transform: scale(1.1);
            box-shadow: 0 3px 10px rgba(250, 112, 154, 0.5);
        }

        .no-images-message {
            text-align: center;
            padding: 40px 20px;
            background: #f8f9ff;
            border-radius: 10px;
            color: #999;
        }

        .no-images-message i {
            font-size: 60px;
            margin-bottom: 15px;
            color: #ddd;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-success {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(250, 112, 154, 0.4);
        }

        .btn-group-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e9ecef;
        }

        .info-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-banner i {
            font-size: 32px;
        }

        .info-banner-content h5 {
            margin: 0 0 5px 0;
            font-weight: 600;
        }

        .info-banner-content p {
            margin: 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .form-section {
            background: #f8f9ff;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
        }

        .form-section-title {
            font-weight: 600;
            color: #667eea;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
        }

        .form-section-title i {
            font-size: 24px;
        }

        @media (max-width: 768px) {
            .edit-card-body {
                padding: 25px;
            }

            .btn-group-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .existing-images-grid,
            .image-preview-container {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
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
                <div class="page-header">
                    <div>
                        <h3 class="page-title mb-3">
                            <i class="mdi mdi-pencil"></i> Modifier un Bien Immobilier
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('bien.index')}}">
                                        <i class="mdi mdi-home-city"></i> Biens
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Modifier un bien</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="container mt-4">
                    <div class="info-banner">
                        <i class="mdi mdi-information"></i>
                        <div class="info-banner-content">
                            <h5>Modification en cours</h5>
                            <p>Vous êtes en train de modifier les informations du bien : <strong>{{ $bien->type_bien }}</strong></p>
                        </div>
                    </div>

                    <div class="edit-card">
                        <div class="edit-card-header">
                            <h2>
                                <i class="mdi mdi-clipboard-text"></i>
                                Formulaire de Modification
                            </h2>
                        </div>

                        <div class="edit-card-body">
                            <form action="{{ route('bien.update', $bien->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Section Informations Générales -->
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-information"></i>
                                        Informations Générales
                                    </div>

                                    <div class="form-group">
                                        <label for="type_bien">
                                            <i class="mdi mdi-home-variant"></i>
                                            Type de bien
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input type="text" name="type_bien" id="type_bien" class="form-control"
                                               value="{{ $bien->type_bien }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="adresse_bien">
                                            <i class="mdi mdi-map-marker"></i>
                                            Adresse
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <input type="text" name="adresse_bien" id="adresse_bien" class="form-control"
                                               value="{{ $bien->adresse_bien }}" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="superficie">
                                                    <i class="mdi mdi-ruler-square"></i>
                                                    Superficie (m²)
                                                </label>
                                                <input type="text" name="superficie" id="superficie" class="form-control"
                                                       value="{{ $bien->superficie }}">
                                                <small class="form-hint">Surface actuelle : {{ $bien->superficie }} m²</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="prix">
                                                    <i class="mdi mdi-cash"></i>
                                                    Prix (FCFA)
                                                </label>
                                                <input type="number" name="prix" id="prix" class="form-control"
                                                       value="{{ $bien->prix }}">
                                                <small class="form-hint">Prix actuel : {{ number_format($bien->prix, 0, ',', ' ') }} FCFA</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="statut">
                                            <i class="mdi mdi-information-outline"></i>
                                            Statut
                                            <span class="current-value-badge">Actuel : {{ $bien->statut }}</span>
                                        </label>
                                        <select name="statut" id="statut" class="form-control">
                                            <option value="Disponible" {{ $bien->statut == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                            <option value="Vendu" {{ $bien->statut == 'Vendu' ? 'selected' : '' }}>Vendu</option>
                                            <option value="En location" {{ $bien->statut == 'En location' ? 'selected' : '' }}>En location</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Section Description -->
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-text-box"></i>
                                        Description
                                    </div>

                                    <div class="form-group">
                                        <label for="description">
                                            <i class="mdi mdi-text"></i>
                                            Description du bien
                                        </label>
                                        <textarea name="description" id="description" class="form-control" rows="5">{{ $bien->description }}</textarea>
                                        <small class="form-hint">Modifiez la description pour mieux présenter le bien</small>
                                    </div>
                                </div>

                                <!-- Section Propriétaire -->
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-account"></i>
                                        Propriétaire
                                    </div>

                                    <div class="form-group">
                                        <label for="id_proprio">
                                            <i class="mdi mdi-account-circle"></i>
                                            Propriétaire
                                            <span class="required-asterisk">*</span>
                                        </label>
                                        <select name="id_proprio" id="id_proprio" class="form-control" required>
                                            <option value="">-- Sélectionner un propriétaire --</option>
                                            @foreach($proprietaires as $proprio)
                                                <option value="{{ $proprio->id }}"
                                                    {{ $bien->id_proprio == $proprio->id ? 'selected' : '' }}>
                                                    {{ $proprio->nom_proprio }} {{ $proprio->prenom_proprio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-hint">Propriétaire actuel :
                                            {{ $bien->proprietaire->nom_proprio ?? '' }}
                                            {{ $bien->proprietaire->prenom_proprio ?? '' }}
                                        </small>
                                    </div>
                                </div>

                                <!-- Section Images Existantes -->
                                @if($bien->images && $bien->images->count() > 0)
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-image-multiple"></i>
                                        Images Existantes ({{ $bien->images->count() }})
                                    </div>

                                    <p class="text-muted mb-3">
                                        <i class="mdi mdi-information"></i>
                                        Cochez les images que vous souhaitez supprimer
                                    </p>

                                    <div class="existing-images-grid">
                                        @foreach($bien->images as $image)
                                        <div class="existing-image-item">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                 alt="Image du bien">

                                            @if($image->is_main)
                                            <span class="image-main-badge">
                                                <i class="mdi mdi-star"></i> Principale
                                            </span>
                                            @endif

                                            <div class="existing-image-overlay">
                                                <label style="cursor: pointer; margin: 0;">
                                                    <input type="checkbox"
                                                           name="delete_images[]"
                                                           value="{{ $image->id }}"
                                                           class="delete-image-checkbox">
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <small class="form-hint mt-2 d-block">
                                        <i class="mdi mdi-alert-circle"></i>
                                        Les images cochées seront supprimées lors de l'enregistrement
                                    </small>
                                </div>
                                @else
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-image-off"></i>
                                        Images Existantes
                                    </div>
                                    <div class="no-images-message">
                                        <i class="mdi mdi-image-off"></i>
                                        <p>Aucune image disponible pour ce bien</p>
                                    </div>
                                </div>
                                @endif

                                <!-- Section Ajouter de Nouvelles Images -->
                                <div class="form-section">
                                    <div class="form-section-title">
                                        <i class="mdi mdi-image-plus"></i>
                                        Ajouter de Nouvelles Images
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="mdi mdi-camera"></i>
                                            Nouvelles photos du bien
                                        </label>
                                        <input type="file" name="images[]" class="file-upload-default"
                                               id="images-input" multiple accept="image/*">

                                        <div class="file-upload-wrapper" id="file-upload-area">
                                            <div class="file-upload-icon">
                                                <i class="mdi mdi-cloud-upload"></i>
                                            </div>
                                            <div class="file-upload-text">
                                                <strong>Cliquez pour choisir</strong> ou glissez-déposez vos images ici
                                            </div>
                                            <div class="file-upload-hint">
                                                Formats acceptés: JPG, PNG, JPEG, GIF (max 2MB par image)
                                            </div>
                                        </div>

                                        <div class="image-preview-container" id="image-preview"></div>
                                    </div>
                                </div>

                                <div class="btn-group-actions">
                                    <button type="submit" class="btn btn-success">
                                        <i class="mdi mdi-check-circle"></i>
                                        Enregistrer les modifications
                                    </button>
                                    <a href="{{ route('bien.index') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-close-circle"></i>
                                        Annuler
                                    </a>
                                </div>
                            </form>
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

<script>
    // Gestion de l'upload multiple d'images avec prévisualisation
    (function(){
        const fileInput = document.getElementById('images-input');
        const uploadArea = document.getElementById('file-upload-area');
        const previewContainer = document.getElementById('image-preview');
        let selectedFiles = [];

        // Clic sur la zone de drop
        uploadArea.addEventListener('click', function(e) {
            if (e.target.closest('.image-preview-remove')) return;
            fileInput.click();
        });

        // Sélection de fichiers
        fileInput.addEventListener('change', function(e) {
            handleFiles(this.files);
        });

        // Drag & Drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        function handleFiles(files) {
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            Array.from(files).forEach(file => {
                if (!validTypes.includes(file.type)) {
                    alert(file.name + ' n\'est pas une image valide');
                    return;
                }
                if (file.size > maxSize) {
                    alert(file.name + ' est trop volumineux (max 2MB)');
                    return;
                }

                selectedFiles.push(file);
            });

            updatePreview();
            updateFileInput();
        }

        function updatePreview() {
            previewContainer.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'image-preview-item';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="${file.name}">
                        <button type="button" class="image-preview-remove" data-index="${index}">
                            <i class="mdi mdi-close"></i>
                        </button>
                    `;
                    previewContainer.appendChild(div);
                };

                reader.readAsDataURL(file);
            });

            // Gérer la suppression
            setTimeout(() => {
                document.querySelectorAll('.image-preview-remove').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const index = parseInt(this.getAttribute('data-index'));
                        selectedFiles.splice(index, 1);
                        updatePreview();
                        updateFileInput();
                    });
                });
            }, 100);
        }

        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }
    })();

    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.form-section');
        sections.forEach((section, index) => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';

            setTimeout(() => {
                section.style.transition = 'all 0.5s ease';
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Format du prix en temps réel
    const prixInput = document.getElementById('prix');
    if (prixInput) {
        prixInput.addEventListener('blur', function() {
            const value = parseInt(this.value);
            if (!isNaN(value)) {
                const formatted = value.toLocaleString('fr-FR');
                this.nextElementSibling.textContent = `Prix actuel : ${formatted} FCFA`;
            }
        });
    }

    // Compteur d'images à supprimer
    const deleteCheckboxes = document.querySelectorAll('.delete-image-checkbox');
    deleteCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedCount = document.querySelectorAll('.delete-image-checkbox:checked').length;
            if (checkedCount > 0) {
                if (!document.getElementById('delete-warning')) {
                    const warning = document.createElement('div');
                    warning.id = 'delete-warning';
                    warning.className = 'alert alert-warning mt-3';
                    warning.style.cssText = 'background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; border: none; border-radius: 10px; padding: 15px; display: flex; align-items: center; gap: 10px;';
                    warning.innerHTML = `
                        <i class="mdi mdi-alert"></i>
                        <span><strong>${checkedCount}</strong> image(s) sera/seront supprimée(s) lors de l'enregistrement</span>
                    `;
                    document.querySelector('.existing-images-grid').after(warning);
                }
            } else {
                const warning = document.getElementById('delete-warning');
                if (warning) warning.remove();
            }
        });
    });
    </script>
    </body>
</html>
