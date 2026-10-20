<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catalogue — BMI IMMO</title>
<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Outfit:wght@200;300;400;500;600&display=swap" rel="stylesheet">

<style>
:root {
    --bg: #0a0a0f;
    --bg2: #111118;
    --bg3: #16161f;
    --surface: #1c1c27;
    --surface2: #22222f;
    --copper: #c87941;
    --copper2: #e8a96e;
    --copper3: #f5c99a;
    --copper-dim: rgba(200,121,65,0.18);
    --copper-glow: rgba(200,121,65,0.08);
    --white: #ffffff;
    --off-white: #f0ece4;
    --muted: #7a7a8a;
    --muted2: #5a5a6a;
    --border: rgba(200,121,65,0.15);
    --border2: rgba(255,255,255,0.07);
}

*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior: smooth; }

body {
    background: var(--bg);
    font-family: 'Outfit', sans-serif;
    color: var(--off-white);
    overflow-x: hidden;
}

::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb { background: var(--copper); border-radius: 2px; }

/* ── NAV ── */
nav {
    position: fixed;
    inset: 0 0 auto 0;
    z-index: 999;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 48px;
    background: rgba(10,10,15,0.85);
    backdrop-filter: blur(24px);
    border-bottom: 1px solid var(--border);
    transition: background 0.4s;
}

.logo { height: 38px; }

.logo:hover {
    filter: brightness(3.2) drop-shadow(0 0 4px rgb(255, 255, 255));
}

.nav-center {
    position: absolute;
    left: 50%; transform: translateX(-50%);
    font-family: 'Playfair Display', serif;
    font-size: 1.15rem;
    font-weight: 700;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--copper2);
}

.nav-right { display:flex; align-items:center; gap:10px; }

.nbtn {
    display: inline-flex; align-items: center; gap:6px;
    padding: 8px 18px;
    border-radius: 3px;
    font-size: 0.75rem; font-weight:500;
    letter-spacing: 0.1em; text-transform:uppercase;
    text-decoration: none; cursor:pointer;
    transition: all 0.25s;
    border: 1px solid var(--border2);
    background: transparent; color: var(--muted);
}
.nbtn:hover { border-color: var(--copper); color: var(--copper2); }
.nbtn.nbtn-copper { background: var(--copper); border-color: var(--copper); color: #fff; }
.nbtn.nbtn-copper:hover { background: var(--copper2); color: #fff; transform: translateY(-1px); }

.user-pill { display:flex; align-items:center; gap:10px; }
.user-av {
    width: 34px; height: 34px; border-radius:50%;
    background: var(--copper-dim);
    border: 1.5px solid var(--copper);
    display:flex; align-items:center; justify-content:center;
    font-weight:600; font-size:0.8rem; color: var(--copper2);
}
.user-info { line-height:1.25; }
.user-info strong { font-size:0.84rem; color: var(--off-white); font-weight:500; display:block; }
.user-info small { font-size:0.7rem; color: var(--muted); }

/* ── HERO ── */
.hero {
    height: 100vh; min-height: 700px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-top: 68px;
    position: relative;
    overflow: hidden;
}

.hero-left {
    display: flex; flex-direction: column;
    justify-content: center;
    padding: 80px 60px 80px 80px;
    position: relative; z-index:2;
}

.hero-tag {
    display: inline-flex; align-items:center; gap:10px;
    font-size:0.7rem; font-weight:500; letter-spacing:0.22em; text-transform:uppercase;
    color: var(--copper);
    margin-bottom: 28px;
}
.hero-tag::before { content:''; display:block; width:32px; height:1px; background:var(--copper); }

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3.2rem, 5.5vw, 6rem);
    font-weight: 900;
    line-height: 0.95;
    margin-bottom: 28px;
    letter-spacing: -0.02em;
}

.hero-title .line1 { display:block; color: var(--off-white); }
.hero-title .line2 { display:block; color: transparent; -webkit-text-stroke: 1px var(--copper); }
.hero-title .line3 { display:block; color: var(--copper2); font-style:italic; font-weight:400; font-size:0.6em; margin-top:8px; letter-spacing:0; }

.hero-sub {
    font-size: 0.95rem; font-weight:300; line-height:1.75;
    color: var(--muted); max-width:420px;
    margin-bottom: 48px;
}

.hero-actions { display:flex; align-items:center; gap:20px; }

.btn-hero {
    display:inline-flex; align-items:center; gap:8px;
    padding: 16px 40px;
    background: linear-gradient(135deg, var(--copper), var(--copper2));
    color: #fff; font-size:0.85rem; font-weight:700;
    letter-spacing:0.14em; text-transform:uppercase;
    text-decoration:none; border-radius:4px;
    transition: all 0.3s;
    border: none;
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.btn-hero:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 40px rgba(200,121,65,0.5);
    background: linear-gradient(135deg, var(--copper2), var(--copper3));
}

.btn-hero-ghost {
    display:inline-flex; align-items:center; gap:8px;
    padding: 15px 32px;
    background: transparent;
    color: var(--muted); font-size:0.8rem; font-weight:500;
    letter-spacing:0.1em; text-transform:uppercase;
    text-decoration:none; border:1px solid var(--border2);
    border-radius:3px; transition: all 0.3s;
}
.btn-hero-ghost:hover { border-color:var(--copper); color:var(--copper2); }

.hero-right {
    position: relative;
    overflow:hidden;
}

.hero-right::before {
    content:'';
    position:absolute; inset:0;
    background: linear-gradient(to right, var(--bg) 0%, transparent 30%),
                linear-gradient(to top, var(--bg) 0%, transparent 30%);
    z-index:2; pointer-events:none;
}

.hero-img {
    width:100%; height:100%;
    object-fit:cover;
    opacity:0.6;
}

.hero-counter-band {
    position:absolute; bottom:0; left:0; right:0; z-index:3;
    background: var(--bg2);
    border-top: 1px solid var(--border);
}

/* ── STATS ── */
.stats-strip {
    background: var(--bg2);
    border-bottom: 1px solid var(--border);
}

.stats-inner {
    max-width:1400px; margin:0 auto;
    display:grid; grid-template-columns: repeat(4,1fr);
}

.stat {
    padding: 32px 40px;
    text-align:center;
    border-right: 1px solid var(--border2);
    position:relative;
    transition: background 0.3s;
}
.stat:last-child { border-right:none; }
.stat:hover { background: var(--copper-glow); }

.stat-n {
    font-family:'Playfair Display', serif;
    font-size:3rem; font-weight:900; line-height:1;
    color: var(--copper2); display:block;
}
.stat-l {
    font-size:0.68rem; font-weight:500; letter-spacing:0.18em;
    text-transform:uppercase; color: var(--muted); margin-top:8px; display:block;
}

/* ── OFFCANVAS ── */
.offcanvas {
    width:400px !important;
    background: var(--bg3) !important;
    border-right: 1px solid var(--border) !important;
}

.offcanvas-header {
    padding: 32px !important;
    border-bottom: 1px solid var(--border2) !important;
}

.oc-title {
    font-family:'Playfair Display', serif;
    font-size:1.8rem; font-weight:700;
    color: var(--off-white);
    display:flex; align-items:center; gap:12px;
}
.oc-title i { color:var(--copper); font-size:1.5rem; }

.offcanvas-body { padding: 32px !important; }

.fg { margin-bottom:26px; }

.fg label {
    display:block;
    font-size:0.68rem; font-weight:500; letter-spacing:0.18em;
    text-transform:uppercase; color:var(--copper);
    margin-bottom:10px;
}

.fc {
    width:100%; padding:14px 16px;
    background: var(--surface); border: 1px solid var(--border2);
    border-radius:4px; color: var(--off-white);
    font-family:'Outfit', sans-serif; font-size:0.9rem;
    outline:none; appearance:none;
    transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
}
.fc:focus {
    border-color:var(--copper);
    background:var(--surface2);
    box-shadow: 0 0 0 3px rgba(200,121,65,0.1);
}
.fc::placeholder { color:var(--muted2); }
.fc option { background:var(--bg3); color:var(--off-white); }

.rr { display:grid; grid-template-columns:1fr 1fr; gap:10px; }

.btn-filter-apply {
    width:100%; padding:15px;
    background: linear-gradient(135deg, var(--copper), var(--copper2));
    color:#fff; border:none;
    border-radius:4px; font-family:'Outfit', sans-serif;
    font-size:0.8rem; font-weight:700; letter-spacing:0.14em;
    text-transform:uppercase; cursor:pointer;
    transition:all 0.3s; display:flex; align-items:center;
    justify-content:center; gap:8px; margin-top:32px;
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.btn-filter-apply:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(200,121,65,0.5);
    background: linear-gradient(135deg, var(--copper2), var(--copper3));
}

/* ── MAIN ── */
.main {
    max-width:1400px; margin:0 auto;
    padding: 80px 40px 100px;
}

.section-header {
    display:flex; align-items:flex-end;
    justify-content:space-between;
    margin-bottom:56px;
    padding-bottom:40px;
    border-bottom:1px solid var(--border2);
}

.sh-left {}
.sh-tag { font-size:0.68rem; font-weight:500; letter-spacing:0.22em; text-transform:uppercase; color:var(--copper); margin-bottom:12px; }
.sh-title {
    font-family:'Playfair Display', serif;
    font-size:clamp(2rem,3.5vw,3.2rem);
    font-weight:700; line-height:1.1; color:var(--off-white);
}
.sh-title em { font-style:italic; color:var(--copper2); font-weight:400; }

.sh-right { font-size:0.82rem; color:var(--muted); }

/* ── GRID ── */
.grid {
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(320px,1fr));
    gap:24px;
}

.card {
    background: var(--bg2);
    border: 1px solid var(--border2);
    overflow:hidden;
    transition: all 0.5s cubic-bezier(0.23,1,0.32,1);
    display:flex; flex-direction:column;
    opacity:0;
    animation: cardIn 0.6s ease forwards;
    border-radius: 6px;
    position: relative;
}

.card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, var(--copper), var(--copper2), transparent);
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 3;
}

.card:nth-child(1){ animation-delay:.06s }
.card:nth-child(2){ animation-delay:.12s }
.card:nth-child(3){ animation-delay:.18s }
.card:nth-child(4){ animation-delay:.24s }
.card:nth-child(5){ animation-delay:.30s }
.card:nth-child(6){ animation-delay:.36s }
.card:nth-child(7){ animation-delay:.42s }
.card:nth-child(8){ animation-delay:.48s }
.card:nth-child(9){ animation-delay:.54s }

.card:hover {
    border-color: rgba(200,121,65,0.4);
    transform: translateY(-12px);
    z-index: 2;
    box-shadow: 0 32px 80px rgba(0,0,0,0.6), 0 0 32px rgba(200,121,65,0.15);
}

.card:hover::before { opacity: 1; }

.card-img-wrap {
    position:relative; height:280px; overflow:hidden;
    background:var(--bg3);
}
.card-img {
    width:100%; height:100%; object-fit:cover;
    transition: transform 0.8s cubic-bezier(0.23,1,0.32,1);
    filter:brightness(0.7) saturate(0.8);
}
.card:hover .card-img { transform:scale(1.1); filter:brightness(0.85) saturate(1); }

.card-img-overlay {
    position:absolute; inset:0;
    background: linear-gradient(to top, rgba(10,10,15,0.92) 0%, rgba(10,10,15,0.4) 50%, transparent 100%);
}

/* Status dot */
.card-status {
    position:absolute; top:16px; right:16px;
    display:flex; align-items:center; gap:8px;
    padding: 8px 14px; border-radius:4px;
    background: rgba(10,10,15,0.85);
    backdrop-filter:blur(8px);
    border: 1px solid rgba(255,255,255,0.12);
    font-size:0.7rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase;
    color: var(--off-white);
}

.sdot { width:6px; height:6px; border-radius:50%; flex-shrink:0; }
.sdot-disponible { background:#4ade80; box-shadow:0 0 6px #4ade80; }
.sdot-loue { background:#fb923c; box-shadow:0 0 6px #fb923c; }
.sdot-vendu { background:#f87171; box-shadow:0 0 6px #f87171; }

/* Fav */
.fav-btn {
    position:absolute; top:16px; left:16px;
    width:44px; height:44px; border-radius:50%;
    background: rgba(10,10,15,0.8); backdrop-filter:blur(10px);
    border: 1.5px solid rgba(200,121,65,0.3);
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; color: rgba(255,255,255,0.6); font-size:1.1rem;
    transition:all 0.3s;
}
.fav-btn:hover { background:#e11d48; border-color:#e11d48; color:#fff; transform: scale(1.1); }

/* Price on image */
.img-price {
    position:absolute; bottom:28px; left:28px;
    font-family:'Playfair Display', serif;
    font-size:1.8rem; font-weight:900; color:#fff;
    text-shadow: 0 4px 16px rgba(0,0,0,0.6);
    letter-spacing: -0.5px;
}
.img-price-unit { font-family:'Outfit', sans-serif; font-size:0.8rem; font-weight:600; color:var(--copper2); letter-spacing:0.1em; display: block; margin-top: 2px; }

/* Card body */
.card-body {
    padding:28px;
    display:flex; flex-direction:column; gap:18px;
    flex:1;
}

.card-type {
    font-family:'Playfair Display', serif;
    font-size:1.5rem; font-weight:700;
    color: var(--off-white); line-height:1.2;
    letter-spacing: -0.5px;
}

.card-loc {
    display:flex; align-items:center; gap:8px;
    font-size:0.85rem; color:var(--muted); font-weight:300;
}
.card-loc i { color:var(--copper); font-size:1rem; }

.card-sep { height:1px; background:var(--border2); margin:4px 0; }

.card-feats { display:flex; gap:24px; }
.feat { display:flex; align-items:center; gap:8px; font-size:0.85rem; color:var(--muted); font-weight:300; }
.feat i { color:var(--copper2); font-size:1.1rem; }

.card-cta {
    display:flex; align-items:center; justify-content:center; gap:8px;
    width:100%; padding:14px 20px;
    background: rgba(200,121,65,0.1); color:var(--copper2);
    font-family:'Outfit', sans-serif; font-size:0.8rem;
    font-weight:600; letter-spacing:0.12em; text-transform:uppercase;
    text-decoration:none; border:1px solid rgba(200,121,65,0.25);
    border-radius:4px; transition:all 0.3s; margin-top:auto;
}
.card-cta:hover { background:var(--copper); color:#fff; border-color:var(--copper); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(200,121,65,0.3); }

/* ── EMPTY ── */
.empty {
    grid-column:1/-1;
    text-align:center; padding:100px 20px;
}
.empty i { font-size:4rem; color:var(--muted2); display:block; margin-bottom:20px; }
.empty h3 { font-family:'Playfair Display', serif; font-size:2.2rem; font-weight:700; color:var(--off-white); margin-bottom:10px; }
.empty p { color:var(--muted); font-weight:300; }

/* ── PAGINATION ── */
.pag-wrap {
    display:flex; justify-content:center;
    margin-top:80px; padding-top:60px;
    border-top:1px solid var(--border2);
}
.pagination { display:flex; gap:8px; list-style:none; }
.page-item .page-link {
    width:44px; height:44px; display:flex; align-items:center; justify-content:center;
    border:1px solid var(--border2); border-radius:4px;
    color:var(--muted); text-decoration:none;
    font-size:0.85rem; background:var(--bg2);
    transition:all 0.3s;
    font-weight: 600;
}
.page-item .page-link:hover {
    border-color:var(--copper);
    color:var(--copper2);
    background: rgba(200,121,65,0.08);
}
.page-item.active .page-link {
    background: linear-gradient(135deg, var(--copper), var(--copper2));
    border-color:var(--copper);
    color:#fff;
}

/* ── FOOTER ── */
footer {
    background: var(--bg);
    border-top:1px solid var(--border);
    padding:80px 40px 40px;
    position:relative; overflow:hidden;
}

footer::before {
    content:'BMI';
    position:absolute; bottom:-60px; right:-20px;
    font-family:'Playfair Display', serif;
    font-size:22rem; font-weight:900;
    color:rgba(200,121,65,0.03);
    pointer-events:none; user-select:none; line-height:1;
}

.footer-inner { max-width:1400px; margin:0 auto; }

.footer-top {
    display:grid; grid-template-columns:1.6fr 1fr 1fr;
    gap:64px; margin-bottom:64px;
    padding-bottom:64px; border-bottom:1px solid var(--border2);
}

.f-brand {
    font-family:'Playfair Display', serif;
    font-size:2.2rem; font-weight:900; color:var(--copper2);
    margin-bottom:14px;
}

.f-tagline { font-size:0.9rem; font-weight:300; color:var(--muted); line-height:1.8; margin-bottom:28px; }

.f-socials { display:flex; gap:10px; margin-bottom:32px; }

.f-soc {
    width:44px; height:44px; border-radius:50%;
    border:1px solid var(--border);
    display:flex; align-items:center; justify-content:center;
    color:var(--copper); font-size:1.1rem; text-decoration:none;
    transition:all 0.3s;
}
.f-soc:hover {
    background:var(--copper);
    border-color:var(--copper);
    color:#fff;
    transform:translateY(-4px);
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}

.f-rating {
    display:inline-block;
    border:1px solid var(--border);
    border-radius:4px; padding:18px 24px;
    background:var(--copper-glow);
}
.f-rating .r-label { font-size:0.65rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--muted); margin-bottom:6px; display:block; }
.f-rating .r-score { font-family:'Playfair Display', serif; font-size:2.8rem; font-weight:900; color:var(--copper2); line-height:1; }
.f-rating .r-sub { font-size:0.78rem; color:var(--muted); }

.f-col-title { font-size:0.65rem; font-weight:600; letter-spacing:0.22em; text-transform:uppercase; color:var(--copper); margin-bottom:24px; }

.f-links { display:flex; flex-direction:column; gap:12px; }
.f-link { color:var(--muted); text-decoration:none; font-size:0.88rem; font-weight:300; transition:color 0.25s; }
.f-link:hover { color:var(--off-white); }

.f-cta {}
.f-cta-label { font-size:0.68rem; color:var(--muted); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:16px; display:block; }

.f-cta-btn {
    display:inline-flex; align-items:center; gap:8px;
    padding:14px 32px; background: linear-gradient(135deg, var(--copper), var(--copper2));
    color:#fff; font-size:0.8rem; font-weight:700;
    letter-spacing:0.12em; text-transform:uppercase;
    text-decoration:none; border-radius:4px; transition:all 0.3s;
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.f-cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(200,121,65,0.5);
    background: linear-gradient(135deg, var(--copper2), var(--copper3));
}

.footer-bottom {
    display:flex; align-items:center; justify-content:space-between;
    font-size:0.75rem; color:var(--muted2);
}
.footer-bottom a { color:var(--muted2); text-decoration:none; transition:color 0.25s; }
.footer-bottom a:hover { color:var(--copper); }
.f-legal { display:flex; gap:28px; }

/* ── ANIMATIONS ── */
@keyframes cardIn {
    from { opacity:0; transform:translateY(24px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── RESPONSIVE ── */
@media(max-width:1100px) {
    .hero { grid-template-columns:1fr; height:auto; }
    .hero-right { display:none; }
    .hero-left { padding:100px 40px 60px; }
    .stats-inner { grid-template-columns:repeat(2,1fr); }
    .grid { grid-template-columns:1fr; }
    .footer-top { grid-template-columns:1fr; gap:40px; }
    .footer-bottom { flex-direction:column; gap:16px; }
}

@media(max-width:768px) {
    nav { padding:0 20px; }
    .nav-center { display:none; }
    .main { padding:60px 20px 80px; }
    .section-header { flex-direction:column; align-items:flex-start; gap:12px; }
    footer { padding:60px 20px 32px; }
    footer::before { display:none; }
}
</style>
</head>
<body>

<nav id="nav">
    <a href="{{ route('accueil') }}" class="brand"><img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="BMI"></a>
    <div class="nav-right">
        <button class="nbtn" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
            <i class="mdi mdi-tune-variant"></i> Filtrer
        </button>
        @auth
            <div class="user-pill">
                <div class="user-av">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
                <div class="user-info">
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>{{ auth()->user()->role }}</small>
                </div>
                <a href="{{ route('mon-activite.index') }}" class="nbtn" title="Mon activité"><i class="mdi mdi-history"></i></a>
                <form action="{{ route('logout') }}" method="POST">@csrf
                    <button class="nbtn"><i class="mdi mdi-logout"></i></button>
                </form>
            </div>
        @else
            <a href="{{ route('authentification') }}" class="nbtn nbtn-copper"><i class="mdi mdi-login"></i> Connexion</a>
        @endauth
    </div>
</nav>

<!-- HERO -->
<section class="hero" id="top">
    <div class="hero-left">
        <div class="hero-tag">Catalogue exclusif</div>
        <h1 class="hero-title">
            <span class="line1">L'immobilier</span>
            <span class="line2">de prestige</span>
            <span class="line3"> En Côte d'Ivoire</span>
        </h1>
        <p class="hero-sub">Des propriétés d'exception sélectionnées pour des acquéreurs exigeants. Chaque bien est une opportunité unique.</p>
        <div class="hero-actions">
            <a href="#catalogue" class="btn-hero"><i class="mdi mdi-arrow-down"></i> Explorer</a>
            <button class="btn-hero-ghost" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas">
                <i class="mdi mdi-tune-variant"></i> Filtrer
            </button>
        </div>
    </div>
    <div class="hero-right">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1400&q=80" class="hero-img" alt="">
    </div>
</section>

<!-- STATS -->
<div class="stats-strip">
    <div class="stats-inner">
        <div class="stat"><span class="stat-n">{{ $biens->total() }}</span><span class="stat-l">Biens en catalogue</span></div>
        <div class="stat"><span class="stat-n">{{ $types->count() }}</span><span class="stat-l">Types de biens</span></div>
        <div class="stat"><span class="stat-n">9.4</span><span class="stat-l">Note satisfaction</span></div>
        <div class="stat"><span class="stat-n">+10</span><span class="stat-l">Ans d'expertise</span></div>
    </div>
</div>

<!-- OFFCANVAS -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas">
    <div class="offcanvas-header">
        <div class="oc-title"><i class="mdi mdi-tune-variant"></i> Filtres</div>
        <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <form method="GET" action="{{ route('accueil') }}">
            <div class="fg">
                <label>Type de bien</label>
                <select class="fc" name="type_bien">
                    <option value="">Tous les types</option>
                    @foreach($types as $t)
                        <option value="{{ $t->type_bien }}" {{ request('type_bien')==$t->type_bien?'selected':'' }}>{{ $t->type_bien }}</option>
                    @endforeach
                </select>
            </div>
            <div class="fg">
                <label>Statut</label>
                <select class="fc" name="statut">
                    <option value="">Tous</option>
                    @foreach($statuts as $s)
                        <option value="{{ $s->statut }}" {{ request('statut')==$s->statut?'selected':'' }}>{{ ucfirst($s->statut) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="fg">
                <label>Prix (FCFA)</label>
                <div class="rr">
                    <input class="fc" type="number" name="prix_min" placeholder="Min" value="{{ request('prix_min') }}">
                    <input class="fc" type="number" name="prix_max" placeholder="Max" value="{{ request('prix_max') }}">
                </div>
            </div>
            <div class="fg">
                <label>Superficie (m²)</label>
                <div class="rr">
                    <input class="fc" type="number" name="superficie_min" placeholder="Min" value="{{ request('superficie_min') }}">
                    <input class="fc" type="number" name="superficie_max" placeholder="Max" value="{{ request('superficie_max') }}">
                </div>
            </div>
            <div class="fg">
                <label>Localisation</label>
                <input class="fc" type="text" name="adresse" placeholder="Ex: Cocody, Plateau..." value="{{ request('adresse') }}">
            </div>
            <button type="submit" class="btn-filter-apply"><i class="mdi mdi-check"></i> Appliquer</button>
        </form>
    </div>
</div>

<!-- CATALOGUE -->
<main class="main" id="catalogue">
    <div class="section-header">
        <div class="sh-left">
            <div class="sh-tag">Sélection BMI</div>
            <h2 class="sh-title">Nos <em>propriétés</em></h2>
        </div>
        <div class="sh-right">{{ $biens->total() }} bien{{ $biens->total()>1?'s':'' }} trouvé{{ $biens->total()>1?'s':'' }}</div>
    </div>

    <div class="grid">
        @if($biens->count() > 0)
            @foreach($biens as $bien)
            <article class="card">
                <div class="card-img-wrap">
                    <img class="card-img"
                         src="{{ $bien->mainImage ? asset('storage/'.$bien->mainImage->image_path) : '/default.jpg' }}"
                         alt="{{ $bien->type_bien }}" loading="lazy">
                    <div class="card-img-overlay"></div>
                    <button class="fav-btn"><i class="mdi mdi-heart-outline"></i></button>
                    <div class="card-status">
                        <span class="sdot sdot-{{ strtolower($bien->statut ?? 'disponible') }}"></span>
                        {{ ucfirst($bien->statut ?? 'Disponible') }}
                    </div>
                    <div class="img-price">
                        {{ number_format($bien->prix,0,',',' ') }}
                        <span class="img-price-unit">FCFA</span>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="card-type">{{ $bien->type_bien }}</div>
                        <div class="card-loc"><i class="mdi mdi-map-marker"></i> {{ $bien->adresse_bien }}</div>
                    </div>
                    <div class="card-sep"></div>
                    <div class="card-feats">
                        @if(isset($bien->superficie))<div class="feat"><i class="mdi mdi-ruler-square"></i> {{ $bien->superficie }} m²</div>@endif
                        @if(isset($bien->nb_chambres))<div class="feat"><i class="mdi mdi-bed-outline"></i> {{ $bien->nb_chambres }} ch.</div>@endif
                        @if(isset($bien->nb_salles_bain))<div class="feat"><i class="mdi mdi-shower"></i> {{ $bien->nb_salles_bain }} sdb</div>@endif
                    </div>
                    <a href="{{ route('bien_details', $bien->id) }}" class="card-cta">
                        <i class="mdi mdi-arrow-right"></i> Voir ce bien
                    </a>
                </div>
            </article>
            @endforeach
        @else
            <div class="empty">
                <i class="mdi mdi-home-search"></i>
                <h3>Aucun bien trouvé</h3>
                <p>Modifiez vos critères de recherche</p>
            </div>
        @endif
    </div>

    @if($biens->hasPages())
    <div class="pag-wrap">{{ $biens->links() }}</div>
    @endif
</main>

<footer>
    <div class="footer-inner">
        <div class="footer-top">
            <div>
                <div class="f-brand">BMI IMMO</div>
                <p class="f-tagline">Votre partenaire de confiance pour tous vos projets immobiliers en Côte d'Ivoire. Excellence, intégrité et résultats depuis plus de 10 ans.</p>
                <div class="f-socials">
                    <a href="#" class="f-soc"><i class="mdi mdi-facebook"></i></a>
                    <a href="#" class="f-soc"><i class="mdi mdi-instagram"></i></a>
                    <a href="#" class="f-soc"><i class="mdi mdi-youtube"></i></a>
                </div>
                <div class="f-rating">
                    <span class="r-label">Satisfaction clients</span>
                    <div><span class="r-score">9,4</span><span class="r-sub"> / 10</span></div>
                </div>
            </div>
            <div>
                <div class="f-col-title">Liens utiles</div>
                <div class="f-links">
                    <a href="#" class="f-link">Offres d'emploi</a>
                    <a href="#" class="f-link">Devenir franchisé</a>
                    <a href="#" class="f-link">Entreprise & commerce</a>
                    <a href="#" class="f-link">Fine Homes & Estates</a>
                    <a href="#" class="f-link">À propos</a>
                    <a href="#" class="f-link">International</a>
                    <a href="#" class="f-link">Nous contacter</a>
                </div>
            </div>
            <div class="f-cta">
                <span class="f-cta-label">Votre espace</span>
                <a href="{{ route('authentification') }}" class="f-cta-btn"><i class="mdi mdi-account-circle-outline"></i> Mon compte</a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} BMI Immobilier — Tous droits réservés</span>
            <div class="f-legal">
                <a href="#">Mentions légales</a>
                <a href="#">Données personnelles</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
window.addEventListener('scroll', () => {
    document.getElementById('nav').style.background =
        window.scrollY > 50 ? 'rgba(10,10,15,0.97)' : 'rgba(10,10,15,0.85)';
});

document.querySelectorAll('.fav-btn').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        const ic = btn.querySelector('i');
        const on = ic.classList.contains('mdi-heart');
        ic.classList.toggle('mdi-heart', !on);
        ic.classList.toggle('mdi-heart-outline', on);
        btn.style.background = on ? '' : '#e11d48';
        btn.style.borderColor = on ? '' : '#e11d48';
        btn.style.color = on ? '' : '#fff';
    });
});

document.querySelector('.btn-hero')?.addEventListener('click', e => {
    e.preventDefault();
    document.getElementById('catalogue')?.scrollIntoView({ behavior:'smooth' });
});
</script>
</body>
</html>
