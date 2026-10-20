<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Authentification - BMI_IMMO</title>

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
        height: 100vh;
        overflow: hidden;
      }

      .auth-container {
        display: flex;
        width: 100%;
        height: 100vh;
      }

      /* === CARROUSEL IMAGE GAUCHE === */
      .auth-image {
        flex: 1;
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
        bottom: 60px;
        left: 60px;
        z-index: 2;
        color: white;
        max-width: 500px;
      }

      .image-overlay-text h2 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
      }

      .image-overlay-text p {
        font-size: 18px;
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
        padding: 40px;
        position: relative;
        overflow: hidden;
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
        max-width: 450px;
        text-align: center;
        background: white;
        padding: 50px 45px;
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
        width: 140px;
        margin-bottom: 15px;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
      }

      .form-box h4 {
        margin-bottom: 8px;
        color: #1a1a1a;
        font-size: 28px;
        font-weight: 700;
      }

      .form-box h6 {
        color: #666;
        margin-bottom: 35px;
        font-size: 15px;
        font-weight: 400;
      }

      .form-group {
        position: relative;
        margin-bottom: 20px;
      }

      .form-control {
        height: 52px;
        border-radius: 12px;
        border: 2px solid #e8e8e8;
        padding: 0 20px;
        width: 100%;
        font-size: 15px;
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

      .btn-primary {
        background: linear-gradient(135deg, #ff6600 0%, #ff8833 100%);
        border: none;
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 8px 20px rgba(255, 102, 0, 0.25);
        position: relative;
        overflow: hidden;
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
        margin-top: 30px;
        color: #666;
        font-size: 14px;
        line-height: 1.8;
      }

      /* Messages d'erreur et succès */
      .alert {
        padding: 14px 18px;
        margin-bottom: 25px;
        border-radius: 12px;
        text-align: left;
        font-size: 14px;
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
        font-size: 13px;
        text-align: left;
        margin-top: 6px;
        margin-bottom: 0;
      }

      .remember-me {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-bottom: 25px;
        margin-top: 15px;
        font-size: 14px;
        color: #555;
      }

      .remember-me input[type="checkbox"] {
        margin-right: 8px;
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #ff6600;
      }

      .remember-me label {
        cursor: pointer;
        user-select: none;
      }

      /* Divider */
      .divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
        color: #999;
        font-size: 13px;
      }

      .divider::before,
      .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e8e8e8;
      }

      .divider span {
        padding: 0 15px;
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
          <h2>Votre partenaire immobilier de confiance</h2>
          <p>Découvrez une nouvelle façon de gérer vos biens immobiliers avec BMI_IMMO</p>
        </div>
      </div>

      <!-- Formulaire -->
      <div class="auth-form">
        <div class="form-box">
          <img src="{{ asset('assets/images/logo.svg') }}" alt="BMI_IMMO Logo">
          <h4>Bon retour !</h4>
          <h6>Connectez-vous pour continuer</h6>

          <!-- Messages de succès -->
          @if(session('success'))
            <div class="alert alert-success">
              ✓ {{ session('success') }}
            </div>
          @endif

          <!-- Messages d'erreur globaux -->
          @if($errors->has('login'))
            <div class="alert alert-danger">
              ⚠ {{ $errors->first('login') }}
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Passer la page précédente pour redirection après login -->
            <input type="hidden" name="redirect_to" value="{{ $previousUrl ?? url('/') }}">

            <div class="form-group">
              <input
                type="text"
                name="login"
                class="form-control @error('login') is-invalid @enderror"
                placeholder="Adresse email"
                value="{{ old('login') }}"
                required
              >
              @error('login')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Mot de passe"
                required
              >
              @error('password')
                <div class="error-text">{{ $message }}</div>
              @enderror
            </div>

            <div class="remember-me">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
          </form>

          <div class="bottom-text">
            <a href="" class="auth-link">Mot de passe oublié ?</a>
            <div class="divider"><span>ou</span></div>
            Pas encore de compte ?
            <a href="{{route('register')}}" class="auth-link">Créer un compte</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
