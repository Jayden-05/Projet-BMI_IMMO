<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthentificationController extends Controller
{
    // ========================================
    // CONNEXION
    // ========================================

    // Afficher la page de connexion
    public function authentification(Request $request)
    {
        // Rediriger vers le dashboard si déjà connecté
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Récupérer la page précédente (referer ou query param)
        $previousUrl = $request->input('redirect_to') ?? $request->header('referer');

        return view('authentification', compact('previousUrl'));
    }

    // Traiter la connexion
    public function login(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'login.required' => 'Le login est obligatoire',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('login'));
        }

        // Tentative de connexion (avec email ou username)
        $credentials = [
            'password' => $request->password
        ];

        // Essayer avec email
        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->login;
        } else {
            // Sinon utiliser comme username
            $credentials['username'] = $request->login;
        }

        // Tentative d'authentification
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Récupérer l'URL de redirection depuis le formulaire (caché)
            $redirectTo = $request->input('redirect_to');

            // Vérifier que c'est pas une page d'authentification
            $isAuthPage = $redirectTo && (
                str_contains($redirectTo, 'authentification') ||
                str_contains($redirectTo, 'login') ||
                str_contains($redirectTo, 'register')
            );

            // Pour les Admin/Agent, rediriger vers dashboard sauf s'ils viennent d'une page admin
            // Pour les Clients, utiliser redirect_to s'il existe et est valide, sinon accueil
            if ($user->role === 'Client') {
                // Si redirectTo est valide et pas une page d'auth, l'utiliser
                if ($redirectTo && !$isAuthPage) {
                    $redirectUrl = $redirectTo;
                } else {
                    $redirectUrl = route('accueil');
                }
            } else {
                // Admin/Agent vont toujours au dashboard (sauf si redirect_to est une page admin valide)
                if ($redirectTo && !$isAuthPage && (
                    str_contains($redirectTo, '/bien') ||
                    str_contains($redirectTo, '/client') ||
                    str_contains($redirectTo, '/agent') ||
                    str_contains($redirectTo, '/proprietaire') ||
                    str_contains($redirectTo, '/visite') ||
                    str_contains($redirectTo, '/transaction') ||
                    str_contains($redirectTo, '/paiement') ||
                    str_contains($redirectTo, '/contrat') ||
                    str_contains($redirectTo, '/dashboard')
                )) {
                    $redirectUrl = $redirectTo;
                } else {
                    $redirectUrl = route('dashboard');
                }
            }

            return redirect($redirectUrl)
                ->with('success', 'Connexion réussie ! Bienvenue ' . $user->name);
        }

        // Si échec
        return back()
            ->withErrors(['login' => 'Identifiants incorrects'])
            ->withInput($request->only('login'));
    }

    // ========================================
    // INSCRIPTION
    // ========================================

    // Afficher la page d'inscription
    public function register()
    {
        // Rediriger vers le dashboard si déjà connecté
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('register');
    }

    // Traiter l'inscription
    public function registerPost(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'nullable|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:Admin,Agent,Manager,Comptable',
            'telephone' => 'nullable|string|max:20',
        ], [
            'name.required' => 'Le nom complet est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être valide',
            'email.unique' => 'Cet email est déjà utilisé',
            'username.unique' => 'Ce nom d\'utilisateur est déjà pris',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères',
            'password.confirmed' => 'Les mots de passe ne correspondent pas',
            'role.required' => 'Le rôle est obligatoire',
            'role.in' => 'Le rôle sélectionné n\'est pas valide',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'telephone' => $request->telephone,
        ]);

        // Connecter automatiquement l'utilisateur après inscription
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Compte créé avec succès ! Bienvenue ' . $user->name);
    }

    // ========================================
    // DÉCONNEXION
    // ========================================

    // Déconnexion
    public function logout(Request $request)
    {
        // Récupérer le rôle avant la déconnexion
        $role = Auth::user()->role ?? null;

        // Récupérer la page précédente de manière sécurisée
        $previousUrl = $request->headers->get('referer');

        // Vérifier que le referer est bien sur notre domaine
        if ($previousUrl && parse_url($previousUrl, PHP_URL_HOST) === parse_url(config('app.url'), PHP_URL_HOST)) {
            $redirectUrl = $previousUrl;
        } else {
            // Fallback selon le rôle
            $redirectUrl = $role === 'Client' ? route('accueil') : route('authentification');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($redirectUrl)
            ->with('success', 'Vous avez été déconnecté avec succès');
    }
}
