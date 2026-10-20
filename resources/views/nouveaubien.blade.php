<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nouveau Bien - BMI_IMMO</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
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

        .page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.7);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            color: #333;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
            display: inline-block;
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
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }

        .form-control::placeholder {
            color: #aaa;
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

        .image-preview-main {
            position: absolute;
            bottom: 5px;
            left: 5px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-light {
            background: #f8f9fa;
            color: #6c757d;
            border: 2px solid #e0e0e0;
        }

        .btn-light:hover {
            background: #e9ecef;
            color: #495057;
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
        }

        .form-section-title i {
            font-size: 24px;
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            height: 48px;
            padding: 8px 15px;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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

        .btn-group-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e9ecef;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 25px;
            }

            .btn-group-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

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
                            <i class="mdi mdi-home-plus"></i> Ajouter un Nouveau Bien
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('bien.index')}}">
                                        <i class="mdi mdi-home-city"></i> Biens
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Ajouter un bien</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-clipboard-text"></i> Formulaire d'Enregistrement
                                </h4>

                                <form class="forms-sample" method="POST" action="{{route('bien.store')}}" enctype="multipart/form-data">
                                    @csrf

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
                                            <input type="text" class="form-control" id="type_bien" name="type_bien"
                                                   placeholder="Ex: Appartement, Villa, Studio..." required>
                                            <small class="form-hint">Spécifiez le type de bien immobilier</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="adresse_bien">
                                                <i class="mdi mdi-map-marker"></i>
                                                Adresse du bien
                                                <span class="required-asterisk">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="adresse_bien" name="adresse_bien"
                                                   placeholder="Ex: Cocody, Riviera Palmeraie" required>
                                            <small class="form-hint">Indiquez l'adresse complète</small>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="superficie">
                                                        <i class="mdi mdi-ruler-square"></i>
                                                        Superficie (m²)
                                                        <span class="required-asterisk">*</span>
                                                    </label>
                                                    <input type="number" class="form-control" id="superficie" name="superficie"
                                                           placeholder="Ex: 150" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="prix">
                                                        <i class="mdi mdi-cash"></i>
                                                        Prix (FCFA)
                                                        <span class="required-asterisk">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="prix" name="prix"
                                                           placeholder="Ex: 50000000" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="statut">
                                                <i class="mdi mdi-information-outline"></i>
                                                Statut
                                                <span class="required-asterisk">*</span>
                                            </label>
                                            <select class="form-control" id="statut" name="statut" required>
                                                <option value="">-- Sélectionner le statut --</option>
                                                <option value="Disponible">Disponible</option>
                                                <option value="Vendu">Vendu</option>
                                                <option value="En location">En location</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Section Description -->
                                    <div class="form-section">
                                        <div class="form-section-title">
                                            <i class="mdi mdi-text-box"></i>
                                            Description Détaillée
                                        </div>

                                        <div class="form-group">
                                            <label for="description">
                                                <i class="mdi mdi-text"></i>
                                                Description du bien
                                            </label>
                                            <textarea class="form-control" id="description" name="description" rows="5"
                                                      placeholder="Décrivez les caractéristiques du bien (nombre de pièces, équipements, état...)"></textarea>
                                            <small class="form-hint">Fournissez des détails qui aideront à mieux présenter le bien</small>
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
                                                Propriétaire du bien
                                                <span class="required-asterisk">*</span>
                                            </label>
                                            <select class="form-control select2" id="id_proprio" name="id_proprio" required>
                                                <option value="">-- Sélectionnez un propriétaire --</option>
                                                @foreach($proprietaires as $proprio)
                                                    <option value="{{ $proprio->id }}">
                                                        {{ $proprio->nom_proprio }} {{ $proprio->prenom_proprio }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="form-hint">Choisissez le propriétaire dans la liste</small>
                                        </div>
                                    </div>

                                    <!-- Section Images (MODIFIÉE) -->
                                    <div class="form-section">
                                        <div class="form-section-title">
                                            <i class="mdi mdi-image-multiple"></i>
                                            Images du Bien
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                <i class="mdi mdi-camera"></i>
                                                Photos du bien
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
                                                    Formats acceptés: JPG, PNG, JPEG, GIF (max 2MB par image)<br>
                                                    La première image sera l'image principale
                                                </div>
                                            </div>

                                            <div class="image-preview-container" id="image-preview"></div>
                                        </div>
                                    </div>

                                    <div class="btn-group-actions">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="mdi mdi-check-circle"></i> Enregistrer le bien
                                        </button>
                                        <a href="{{route('bien.index')}}" class="btn btn-light">
                                            <i class="mdi mdi-close-circle"></i> Annuler
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

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

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
                        ${index === 0 ? '<span class="image-preview-main"><i class="mdi mdi-star"></i> Principale</span>' : ''}
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

    // Initialiser Select2
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap',
            width: '100%'
        });
    });

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
</script>
</body>
</html>
