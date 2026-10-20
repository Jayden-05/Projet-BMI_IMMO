<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon Activité — BMI IMMO</title>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Outfit:wght@200;300;400;500;600&display=swap" rel="stylesheet">

<style>
:root {
    --bg: #0a0a0f;
    --bg2: #111118;
    --bg3: #16161f;
    --surface: #1c1c27;
    --copper: #c87941;
    --copper2: #e8a96e;
    --copper3: #f5c99a;
    --copper-dim: rgba(200,121,65,0.12);
    --copper-glow: rgba(200,121,65,0.06);
    --off-white: #f0ece4;
    --muted: #7a7a8a;
    --muted2: #5a5a6a;
    --border: rgba(200,121,65,0.15);
    --border2: rgba(255,255,255,0.07);
}

*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}

body{
    background:var(--bg);
    font-family:'Outfit',sans-serif;
    color:var(--off-white);
    min-height:100vh;
    display:flex;flex-direction:column;
    overflow-x:hidden;
}

::-webkit-scrollbar{width:4px;}
::-webkit-scrollbar-track{background:var(--bg);}
::-webkit-scrollbar-thumb{background:var(--copper);border-radius:2px;}

/* ── NAV ── */
nav{
    position:sticky;top:0;z-index:999;
    height:68px;display:flex;align-items:center;justify-content:space-between;
    padding:0 48px;
    background:rgba(10,10,15,0.95);
    backdrop-filter:blur(24px);
    border-bottom:1px solid var(--border);
}
.logo{height:38px;}
.nav-brand{
    position:absolute;left:50%;transform:translateX(-50%);
    font-family:'Playfair Display',serif;
    font-size:1.15rem;font-weight:700;letter-spacing:0.22em;
    text-transform:uppercase;color:var(--copper2);
}
.nav-right{display:flex;align-items:center;gap:10px;}
.nbtn{
    display:inline-flex;align-items:center;gap:6px;
    padding:8px 18px;border-radius:3px;
    font-size:0.75rem;font-weight:500;letter-spacing:0.1em;text-transform:uppercase;
    text-decoration:none;cursor:pointer;transition:all 0.25s;
    border:1px solid var(--border2);background:transparent;color:var(--muted);
}
.nbtn:hover{border-color:var(--copper);color:var(--copper2);}
.nbtn.danger{color:#f87171;border-color:rgba(248,113,113,0.2);}
.nbtn.danger:hover{background:rgba(248,113,113,0.08);border-color:#f87171;}

/* ── PAGE HEADER ── */
.page-header{
    background:var(--bg2);
    border-bottom:1px solid var(--border);
    padding:64px 48px;
    position:relative;overflow:hidden;
}

.page-header::before{
    content:'ACTIVITÉ';
    position:absolute;right:-30px;top:50%;transform:translateY(-50%);
    font-family:'Playfair Display',serif;
    font-size:12rem;font-weight:900;
    color:rgba(200,121,65,0.035);
    pointer-events:none;user-select:none;white-space:nowrap;
}

.page-header::after{
    content:'';
    position:absolute;bottom:0;left:0;right:0;height:2px;
    background:linear-gradient(to right, transparent 0%, var(--copper) 30%, var(--copper2) 60%, transparent 100%);
}

.ph-inner{
    max-width:1200px;margin:0 auto;
    display:flex;align-items:center;justify-content:space-between;
    position:relative;z-index:1;
}

.ph-left{}
.ph-eyebrow{
    font-size:0.68rem;font-weight:500;letter-spacing:0.22em;
    text-transform:uppercase;color:var(--copper);
    margin-bottom:12px;display:inline-flex;align-items:center;gap:10px;
}
.ph-eyebrow::before{content:'';display:block;width:28px;height:1px;background:var(--copper);}
.ph-title{
    font-family:'Playfair Display',serif;
    font-size:clamp(2.2rem,4vw,3.5rem);
    font-weight:900;line-height:1;color:var(--off-white);
    margin-bottom:10px;
}
.ph-title em{font-style:italic;color:var(--copper2);font-weight:400;}
.ph-sub{font-size:0.88rem;font-weight:300;color:var(--muted);}

.ph-right{text-align:right;flex-shrink:0;}
.ph-count{
    font-family:'Playfair Display',serif;
    font-size:5rem;font-weight:900;line-height:1;
    color:var(--copper);display:block;
}
.ph-count-lbl{
    font-size:0.68rem;font-weight:500;letter-spacing:0.18em;
    text-transform:uppercase;color:var(--muted);
    margin-top:6px;display:block;
}

/* ── MAIN ── */
.main{
    max-width:1200px;margin:0 auto;
    padding:60px 24px 100px;
    flex:1;width:100%;
}

/* ── TABLE CARD ── */
.t-card{
    background:var(--bg2);
    border:1px solid var(--border2);
    border-radius:3px;overflow:hidden;
    animation:fadeUp 0.6s ease both;
}
.t-card-stripe{height:2px;background:linear-gradient(to right, var(--copper), var(--copper2), var(--copper3), transparent);}

/* ── TABLE ── */
.t-wrap{overflow-x:auto;}

table{width:100%;border-collapse:collapse;}

thead tr{background:var(--bg3);border-bottom:1px solid var(--border);}

th{
    padding:20px 28px;
    font-size:0.65rem;font-weight:600;letter-spacing:0.2em;
    text-transform:uppercase;color:var(--muted);text-align:left;
    white-space:nowrap;
}
th:first-child{padding-left:40px;}
th:last-child{padding-right:40px;}

tbody tr{
    border-bottom:1px solid var(--border2);
    transition:background 0.25s;
    animation:rowIn 0.5s ease both;
}

tbody tr:nth-child(1){animation-delay:0.05s}
tbody tr:nth-child(2){animation-delay:0.10s}
tbody tr:nth-child(3){animation-delay:0.15s}
tbody tr:nth-child(4){animation-delay:0.20s}
tbody tr:nth-child(5){animation-delay:0.25s}
tbody tr:nth-child(6){animation-delay:0.30s}
tbody tr:nth-child(7){animation-delay:0.35s}
tbody tr:nth-child(8){animation-delay:0.40s}
tbody tr:nth-child(9){animation-delay:0.45s}
tbody tr:nth-child(10){animation-delay:0.50s}

tbody tr:last-child{border-bottom:none;}
tbody tr:hover{background:var(--copper-glow);}

td{
    padding:22px 28px;
    vertical-align:middle;
    color:var(--off-white);font-size:0.88rem;
}
td:first-child{padding-left:40px;}
td:last-child{padding-right:40px;}

/* Row num */
.rn{
    font-family:'Playfair Display',serif;
    font-size:1.1rem;font-weight:700;color:var(--copper);
    opacity:0.6;
}

/* Action badge */
.act-badge{
    display:inline-flex;align-items:center;gap:8px;
    padding:7px 16px;
    background:var(--surface);
    border:1px solid var(--border2);
    border-radius:2px;
    font-size:0.72rem;font-weight:600;
    letter-spacing:0.1em;text-transform:uppercase;
    color:var(--copper2);white-space:nowrap;
}
.act-badge i{font-size:0.85rem;color:var(--copper);}

/* Description */
.log-desc{
    color:var(--muted);font-size:0.87rem;
    font-weight:300;line-height:1.5;
    max-width:500px;
}

/* Timestamp */
.ts{display:flex;flex-direction:column;gap:3px;}
.ts-d{font-size:0.85rem;font-weight:500;color:var(--off-white);}
.ts-t{font-size:0.75rem;color:var(--muted);font-weight:300;font-variant-numeric:tabular-nums;}

/* ── EMPTY STATE ── */
.empty-state{padding:120px 20px;text-align:center;}

.empty-ring{
    width:100px;height:100px;border-radius:50%;
    border:1px solid var(--border);
    background:var(--copper-dim);
    display:flex;align-items:center;justify-content:center;
    margin:0 auto 28px;
    position:relative;
}
.empty-ring::before{
    content:'';position:absolute;inset:-6px;border-radius:50%;
    border:1px solid var(--border);
}
.empty-ring i{font-size:2.5rem;color:var(--copper);}

.empty-title{
    font-family:'Playfair Display',serif;
    font-size:2.2rem;font-weight:900;
    color:var(--off-white);margin-bottom:10px;
}
.empty-title em{font-style:italic;color:var(--copper2);}
.empty-sub{font-size:0.9rem;color:var(--muted);font-weight:300;}

/* ── PAGINATION ── */
.pag{
    display:flex;justify-content:center;align-items:center;
    padding:28px 40px;background:var(--bg3);
    border-top:1px solid var(--border2);
}
.pagination{display:flex;gap:6px;list-style:none;margin:0;}
.page-item .page-link{
    width:40px;height:40px;display:flex;align-items:center;justify-content:center;
    border:1px solid var(--border2);border-radius:2px;
    color:var(--muted);text-decoration:none;
    font-size:0.85rem;background:var(--bg2);
    transition:all 0.25s;
}
.page-item .page-link:hover{border-color:var(--copper);color:var(--copper2);}
.page-item.active .page-link{background:var(--copper);border-color:var(--copper);color:#fff;}
.page-item.disabled .page-link{opacity:0.25;pointer-events:none;}

/* ── FOOTER ── */
footer{
    background:var(--bg);border-top:1px solid var(--border);
    padding:56px 48px 36px;position:relative;overflow:hidden;
    margin-top:auto;
}
footer::before{
    content:'BMI';position:absolute;bottom:-50px;right:-10px;
    font-family:'Playfair Display',serif;font-size:18rem;font-weight:900;
    color:rgba(200,121,65,0.025);pointer-events:none;user-select:none;line-height:1;
}
.f-inner{
    max-width:1200px;margin:0 auto;
    display:flex;align-items:center;justify-content:space-between;gap:24px;
    position:relative;z-index:1;
}
.f-brand{
    font-family:'Playfair Display',serif;
    font-size:1.6rem;font-weight:900;color:var(--copper2);
}
.f-copy{font-size:0.78rem;color:var(--muted2);}
.f-links{display:flex;gap:24px;}
.f-link{font-size:0.75rem;color:var(--muted2);text-decoration:none;transition:color 0.25s;letter-spacing:0.05em;}
.f-link:hover{color:var(--copper);}

/* ── ANIMATIONS ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
@keyframes rowIn{from{opacity:0;transform:translateX(-10px);}to{opacity:1;transform:translateX(0);}}

/* ── RESPONSIVE ── */
@media(max-width:900px){
    nav{padding:0 20px;}
    .nav-brand{display:none;}
    .page-header{padding:48px 20px;}
    .page-header::before{display:none;}
    .ph-inner{flex-direction:column;align-items:flex-start;gap:20px;}
    .ph-right{text-align:left;}
    .main{padding:40px 16px 80px;}
    th,td{padding:14px 12px !important;}
    th:first-child,td:first-child{padding-left:20px !important;}
    th:last-child,td:last-child{padding-right:20px !important;}
    footer{padding:48px 20px 28px;}
    footer::before{display:none;}
    .f-inner{flex-direction:column;text-align:center;gap:16px;}
    .f-links{justify-content:center;flex-wrap:wrap;}
}
</style>
</head>
<body>

<!-- NAV -->
<nav>
    <a href="{{ route('accueil') }}"><img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="BMI"></a>
    <div class="nav-brand">BMI Immobilier</div>
    <div class="nav-right">
        <a href="{{ route('accueil') }}" class="nbtn"><i class="mdi mdi-arrow-left"></i> Catalogue</a>
        <form action="{{ route('logout') }}" method="POST">@csrf
            <button class="nbtn danger"><i class="mdi mdi-logout"></i> Déconnexion</button>
        </form>
    </div>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="ph-inner">
        <div class="ph-left">
            <div class="ph-eyebrow">Espace personnel</div>
            <h1 class="ph-title">Mon <em>activité</em></h1>
            <p class="ph-sub">Toutes vos actions enregistrées sur la plateforme BMI</p>
        </div>
        <div class="ph-right">
            <span class="ph-count">{{ $logs->total() }}</span>
            <span class="ph-count-lbl">Entrée{{ $logs->total() > 1 ? 's' : '' }} au total</span>
        </div>
    </div>
</div>

<!-- MAIN -->
<main class="main">
    <div class="t-card">
        <div class="t-card-stripe"></div>

        @if($logs->count() > 0)
            <div class="t-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>Date & Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $i => $log)
                        <tr>
                            <td><span class="rn">{{ str_pad($logs->firstItem() + $i, 2, '0', STR_PAD_LEFT) }}</span></td>
                            <td>
                                <span class="act-badge">
                                    <i class="mdi mdi-lightning-bolt"></i>
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td><span class="log-desc">{{ $log->description ?? '—' }}</span></td>
                            <td>
                                <div class="ts">
                                    <span class="ts-d">{{ $log->created_at->format('d/m/Y') }}</span>
                                    <span class="ts-t">{{ $log->created_at->format('H:i:s') }}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($logs->hasPages())
            <div class="pag">{{ $logs->links('pagination::bootstrap-5') }}</div>
            @endif

        @else
            <div class="empty-state">
                <div class="empty-ring"><i class="mdi mdi-history"></i></div>
                <h3 class="empty-title">Aucune <em>activité</em></h3>
                <p class="empty-sub">Vous n'avez encore aucune action enregistrée sur la plateforme.</p>
            </div>
        @endif
    </div>
</main>

<!-- FOOTER -->
<footer>
    <div class="f-inner">
        <div class="f-brand">BMI IMMO</div>
        <span class="f-copy">© {{ date('Y') }} BMI Immobilier — Tous droits réservés</span>
        <div class="f-links">
            <a href="#" class="f-link">Mentions légales</a>
            <a href="#" class="f-link">Données personnelles</a>
            <a href="#" class="f-link">Cookies</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
