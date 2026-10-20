<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription - BMI_IMMO</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
      }

      .auth-container {
        display: flex;
        width: 100%;
        min-height: 100vh;
      }

      /* === CARROUSEL IMAGE GAUCHE === */
      .auth-image {
        flex: 0 0 40%;
        position: relative;
        overflow: hidden;
      }

      .slider {
        width: 100%;
        height: 100%;
        display: flex;
        animation: slide 20s infinite ease-in-out;
      }

      .slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        flex-shrink: 0;
        filter: brightness(0.85);
      }

      /* Overlay gradient sur les images */
      .auth-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 102, 0, 0.4) 0%, rgba(0, 0, 0, 0.3) 100%);
        z-index: 1;
        pointer-events: none;
      }

      /* Texte superposé sur le carrousel */
      .image-overlay-text {
        position: absolute;
        bottom: 40px;
        left: 40px;
        z-index: 2;
        color: white;
        max-width: 350px;
      }

      .image-overlay-text h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 12px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
      }

      .image-overlay-text p {
        font-size: 15px;
        font-weight: 300;
        line-height: 1.6;
        text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.5);
      }

      /* Animation du défilement automatique */
      @keyframes slide {
        0%, 20% { transform: translateX(0); }
        25%, 45% { transform: translateX(-100%); }
        50%, 70% { transform: translateX(-200%); }
        75%, 95% { transform: translateX(-300%); }
        100% { transform: translateX(0); }
      }

      /* RESPONSIVE */
      @media (max-width: 968px) {
        .auth-container {
          flex-direction: column;
        }
        .auth-image {
          display: none;
        }
      }

      .auth-form {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 30px 20px;
        position: relative;
        overflow-y: auto;
      }

      /* Effet de fond décoratif */
      .auth-form::before {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 102, 0, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        top: -150px;
        right: -150px;
        z-index: 0;
      }

      .form-box {
        width: 100%;
        max-width: 480px;
        text-align: center;
        background: white;
        padding: 40px 35px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.6s ease-out;
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .form-box img {
        width: 120px;
        margin-bottom: 12px;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
      }

      .form-box h4 {
        margin-bottom: 6px;
        color: #1a1a1a;
        font-size: 26px;
        font-weight: 700;
      }

      .form-box h6 {
        color: #666;
        margin-bottom: 25px;
        font-size: 14px;
        font-weight: 400;
      }

      .form-label {
        display: block;
        text-align: left;
        margin-bottom: 7px;
        color: #333;
        font-weight: 500;
        font-size: 13px;
      }

      .form-group {
        position: relative;
        margin-bottom: 18px;
      }

      .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 18px;
      }

      @media (max-width: 576px) {
        .form-row {
          grid-template-columns: 1fr;
        }
      }

      .form-control {
        height: 48px;
        border-radius: 10px;
        border: 2px solid #e8e8e8;
        padding: 0 16px;
        width: 100%;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #fafafa;
      }

      .form-control:focus {
        outline: none;
        border-color: #ff6600;
        background: white;
        box-shadow: 0 0 0 4px rgba(255, 102, 0, 0.1);
      }

      .form-control::placeholder {
        color: #aaa;
      }

      select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23999' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        padding-right: 40px;
      }

      .password-wrapper {
        position: relative;
      }

      .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
        font-size: 18px;
        transition: color 0.3s ease;
      }

      .password-toggle:hover {
        color: #ff6600;
      }

      .btn-primary {
        background: linear-gradient(135deg, #ff6600 0%, #ff8833 100%);
        border: none;
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 8px 20px rgba(255, 102, 0, 0.25);
        position: relative;
        overflow: hidden;
        margin-top: 8px;
      }

      .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
      }

      .btn-primary:hover::before {
        left: 100%;
      }

      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(255, 102, 0, 0.35);
      }

      .btn-primary:active {
        transform: translateY(0);
      }

      .auth-link {
        color: #ff6600;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
      }

      .auth-link:hover {
        color: #e65c00;
        text-decoration: underline;
      }

      .bottom-text {
        margin-top: 20px;
        color: #666;
        font-size: 13px;
        line-height: 1.8;
      }

      /* Messages d'erreur et succès */
      .alert {
        padding: 12px 16px;
        margin-bottom: 20px;
        border-radius: 10px;
        text-align: left;
        font-size: 13px;
        animation: slideDown 0.4s ease;
      }

      @keyframes slideDown {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .alert-danger {
        background-color: #ffe5e5;
        color: #cc0000;
        border: 1px solid #ffcccc;
      }

      .alert-success {
        background-color: #e5f7e5;
        color: #006600;
        border: 1px solid #b3e6b3;
      }

      .error-text {
        color: #dc3545;
        font-size: 12px;
        text-align: left;
        margin-top: 5px;
        margin-bottom: 0;
      }
    </style>
  </head>

  <body>
    <div class="auth-container">
      <!-- ✅ Carrousel d'images à gauche -->
      <div class="auth-image">
        <div class="slider">
          <img src="{{ asset('assets/images/im1.jpg') }}" alt="image 1">
          <img src="{{ asset('assets/images/im2.jpg') }}" alt="image 2">
          <img src="{{ asset('assets/images/im3.jpg') }}" alt="image 3">
          <img src="{{ asset('assets/images/im4.jpg') }}" alt="image 4">
        </div>
        <div class="image-overlay-text">
          <h2>Rejoignez BMI_IMMO</h2>
          <p>Créez votre compte et commencez à gérer vos biens immobiliers efficacement</p>
        </div>
      </div>

      <!-- Formulaire d'inscription -->
      <div class="auth-form">
        <div class="form-box">
          <img src="{{ asset('assets/images/logo.svg') }}" alt="BMI_IMMO Logo">
          <h4>Créer un compte</h4>
          <h6>Remplissez les informations ci-dessous</h6>

          <!-- Messages de succès -->
          @if(session('success'))
            <div class="alert alert-success">
              ✓ {{ session('success') }}
            </div>
          @endif

          <!-- Messages d'erreur globaux -->
          @if($errors->any())
            <div class="alert alert-danger">
              ⚠ <strong>Erreur :</strong> Veuillez corriger les erreurs ci-dessous.
            </div>
          @endif

          <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <!-- Nom complet -->
            <div class="form-group" style="text-align: left;">
              <label class="form-label">Nom complet *</label>
              <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Ex: Kolo Touré"
                value="{{ old('name') }}"
                required
              >
              @error('name')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <!-- Email et Username sur la même ligne -->
            <div class="form-row">
              <div style="text-align: left;">
                <label class="form-label">Email *</label>
                <input
                  type="email"
                  name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="exemple@bmi-immo.com"
                  value="{{ old('email') }}"
                  required
                >
                @error('email')
                  <div class="error-text">{{ $message }}</div>
                @enderror
              </div>

              <div style="text-align: left;">
                <label class="form-label">Nom d'utilisateur</label>
                <input
                  type="text"
                  name="username"
                  class="form-control @error('username') is-invalid @enderror"
                  placeholder="Ex: ktoure"
                  value="{{ old('username') }}"
                >
                @error('username')
                  <div class="error-text">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Rôle et Téléphone sur la même ligne -->
            <div class="form-row">
              <div style="text-align: left;">
                <label class="form-label">Rôle *</label>
                <select
                  name="role"
                  class="form-control @error('role') is-invalid @enderror"
                  required
                >
                  <option value="">-- Sélectionner --</option>
                  <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                  <option value="Agent" {{ old('role') == 'Agent' ? 'selected' : '' }}>Agent Immobilier</option>
                  <option value="Manager" {{ old('role') == 'Client' ? 'selected' : '' }}>Client</option>
                </select>
                @error('role')
                  <div class="error-text">{{ $message }}</div>
                @enderror
              </div>

              <div style="text-align: left;">
                <label class="form-label">Téléphone</label>
                <input
                  type="tel"
                  name="telephone"
                  class="form-control @error('telephone') is-invalid @enderror"
                  placeholder="Ex: 0123456789"
                  value="{{ old('telephone') }}"
                >
                @error('telephone')
                  <div class="error-text">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Mot de passe et confirmation sur la même ligne -->
            <div class="form-row">
              <div style="text-align: left;">
                <label class="form-label">Mot de passe *</label>
                <div class="password-wrapper">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Min. 6 caractères"
                    required
                  >
                  <i class="mdi mdi-eye password-toggle" onclick="togglePassword('password')"></i>
                </div>
                @error('password')
                  <div class="error-text">{{ $message }}</div>
                @enderror
              </div>

              <div style="text-align: left;">
                <label class="form-label">Confirmer *</label>
                <div class="password-wrapper">
                  <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Confirmer le mot de passe"
                    required
                  >
                  <i class="mdi mdi-eye password-toggle" onclick="togglePassword('password_confirmation')"></i>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Créer le compte</button>
          </form>

          <div class="bottom-text">
            Vous avez déjà un compte ?
            <a href="{{ route('authentification') }}" class="auth-link">Se connecter</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = field.nextElementSibling;

        if (field.type === 'password') {
          field.type = 'text';
          icon.classList.remove('mdi-eye');
          icon.classList.add('mdi-eye-off');
        } else {
          field.type = 'password';
          icon.classList.remove('mdi-eye-off');
          icon.classList.add('mdi-eye');
        }
      }
    </script>
  </body>
</html>
