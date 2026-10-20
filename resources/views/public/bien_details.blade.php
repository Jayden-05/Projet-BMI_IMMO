<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $bien->type_bien }} — BMI IMMO</title>
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
    --copper-dim: rgba(200,121,65,0.15);
    --copper-glow: rgba(200,121,65,0.07);
    --white: #ffffff;
    --off-white: #f0ece4;
    --muted: #7a7a8a;
    --muted2: #5a5a6a;
    --border: rgba(200,121,65,0.15);
    --border2: rgba(255,255,255,0.07);
    --success: #4ade80;
    --warn: #fb923c;
    --danger: #f87171;
}

*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}

body {
    background:var(--bg);
    font-family:'Outfit',sans-serif;
    color:var(--off-white);
    min-height:100vh;
    display:flex; flex-direction:column;
    overflow-x:hidden;
}

::-webkit-scrollbar{width:4px;}
::-webkit-scrollbar-track{background:var(--bg);}
::-webkit-scrollbar-thumb{background:var(--copper);border-radius:2px;}

/* ── NAV ── */
nav {
    position:fixed; inset:0 0 auto 0; z-index:999;
    height:68px; display:flex; align-items:center; justify-content:space-between;
    padding:0 48px;
    background:rgba(10,10,15,0.88);
    backdrop-filter:blur(24px);
    border-bottom:1px solid var(--border);
}

.logo{height:38px;}
.logo:hover{filter:brightness(1.2) drop-shadow(0 0 4px rgba(200,121,65,0.5));}
.nav-brand {
    position:absolute; left:50%; transform:translateX(-50%);
    font-family:'Playfair Display',serif;
    font-size:1.15rem; font-weight:700; letter-spacing:0.22em;
    text-transform:uppercase; color:var(--copper2);
}
.nav-right{display:flex;align-items:center;gap:10px;}

.nbtn {
    display:inline-flex;align-items:center;gap:6px;
    padding:8px 18px; border-radius:3px;
    font-size:0.75rem;font-weight:500;letter-spacing:0.1em;text-transform:uppercase;
    text-decoration:none;cursor:pointer;transition:all 0.25s;
    border:1px solid var(--border2);background:transparent;color:var(--muted);
}
.nbtn:hover{border-color:var(--copper);color:var(--copper2);}
.nbtn.copper{background:var(--copper);border-color:var(--copper);color:#fff;}
.nbtn.copper:hover{background:var(--copper2);color:#fff;}

.user-pill{display:flex;align-items:center;gap:10px;}
.user-av{
    width:34px;height:34px;border-radius:50%;
    background:var(--copper-dim);border:1.5px solid var(--copper);
    display:flex;align-items:center;justify-content:center;
    font-weight:600;font-size:0.8rem;color:var(--copper2);
}

/* ── CINEMATIC GALLERY ── */
.gallery {
    margin-top:68px;
    position:relative;
    height:92vh; min-height:600px;
    overflow:hidden;
    background:var(--bg3);
}

.carousel,.carousel-inner,.carousel-item{height:100%;}

.carousel-item img {
    width:100%; height:100%;
    object-fit:cover;
    filter:brightness(0.55) saturate(0.9);
    transition:transform 0.8s ease;
}

.carousel-item.active img { transform:scale(1.02); }

/* Gradient overlays */
.gallery-overlay {
    position:absolute;inset:0;z-index:5;pointer-events:none;
    background:
        linear-gradient(to right, rgba(10,10,15,0.7) 0%, transparent 45%),
        linear-gradient(to top, rgba(10,10,15,1) 0%, rgba(10,10,15,0.4) 30%, transparent 60%);
}

/* Nav Carousel */
.cctrl {
    position:absolute; z-index:20;
    top:50%; transform:translateY(-50%);
    width:56px; height:56px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,0.15);
    border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer; transition:all 0.3s;
    color:var(--off-white); font-size:1.4rem;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
}
.cctrl:hover{
    background:var(--copper);
    border-color:var(--copper);
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 12px 32px rgba(200,121,65,0.4);
}
.cctrl-prev{left:32px;}
.cctrl-next{right:32px;}
.cctrl span{display:none;}

/* Breadcrumb */
.g-breadcrumb {
    position:absolute; top:20px; left:48px; z-index:10;
    display:flex;align-items:center;gap:8px;
    font-size:0.7rem;font-weight:500;letter-spacing:0.14em;text-transform:uppercase;
    color:rgba(255,255,255,0.4);
}
.g-breadcrumb a{color:rgba(255,255,255,0.4);text-decoration:none;transition:color 0.2s;}
.g-breadcrumb a:hover{color:var(--copper);}
.g-breadcrumb i{font-size:0.6rem;}

/* Main info on image */
.gallery-info {
    position:absolute; bottom:0; left:0; z-index:10;
    padding:0 60px 56px;
    width:60%;
}

.g-tag {
    font-size:0.68rem;font-weight:500;letter-spacing:0.22em;text-transform:uppercase;
    color:var(--copper); margin-bottom:12px;
    display:inline-flex;align-items:center;gap:10px;
}
.g-tag::before{content:'';display:block;width:24px;height:1px;background:var(--copper);}

.g-title {
    font-family:'Playfair Display',serif;
    font-size:clamp(2.5rem,5vw,5rem);
    font-weight:900; line-height:0.95;
    color:var(--white); margin-bottom:18px;
    text-shadow:0 4px 20px rgba(0,0,0,0.4);
}

.g-loc {
    display:flex;align-items:center;gap:8px;
    font-size:0.95rem;color:rgba(255,255,255,0.55);font-weight:300;
}
.g-loc i{color:var(--copper);}

/* Price panel on image */
.gallery-price {
    position:absolute; bottom:56px; right:60px; z-index:10;
    text-align:right;
}

.g-status {
    display:inline-flex;align-items:center;gap:7px;
    padding:6px 14px; margin-bottom:12px;
    background:rgba(10,10,15,0.6); backdrop-filter:blur(8px);
    border:1px solid rgba(255,255,255,0.12); border-radius:2px;
    font-size:0.68rem;font-weight:600;letter-spacing:0.12em;text-transform:uppercase;
    color:var(--off-white);
}
.sdot{width:6px;height:6px;border-radius:50%;flex-shrink:0;}
.sdot-Disponible,.sdot-disponible{background:var(--success);box-shadow:0 0 6px var(--success);}
.sdot-Loue,.sdot-loue,.sdot-Loué,.sdot-loué{background:var(--warn);box-shadow:0 0 6px var(--warn);}
.sdot-Vendu,.sdot-vendu{background:var(--danger);box-shadow:0 0 6px var(--danger);}

.g-price {
    font-family:'Playfair Display',serif;
    font-size:clamp(2rem,4vw,4rem);
    font-weight:900; color:var(--white); line-height:1;
}
.g-price-unit {
    font-family:'Outfit',sans-serif;
    font-size:0.78rem;font-weight:500;letter-spacing:0.14em;
    text-transform:uppercase;color:var(--copper2);display:block;margin-top:6px;
}

/* Thumbnails */
.thumbs {
    background:var(--bg2);
    border-bottom:1px solid var(--border);
    padding:18px 48px;
    display:flex;gap:12px;overflow-x:auto;
}
.thumbs::-webkit-scrollbar{height:4px;}
.thumbs::-webkit-scrollbar-thumb{background:var(--copper); border-radius: 2px;}

.thumb {
    width:100px;height:70px;object-fit:cover;
    border-radius:4px;cursor:pointer;
    opacity:0.4; border:2.5px solid transparent;
    flex-shrink:0; transition:all 0.3s;
}
.thumb:hover{opacity:0.7; border-color: rgba(200,121,65,0.4);}
.thumb.active{
    opacity:1;
    border-color:var(--copper);
    box-shadow: 0 4px 16px rgba(200,121,65,0.3);
}

/* ── PAGE BODY ── */
.page-body {
    max-width:1400px;margin:0 auto;
    padding:64px 48px 100px;
    flex:1; width:100%;
}

.content-layout {
    display:grid;
    grid-template-columns:1fr 400px;
    gap:48px;
    align-items:start;
}

/* ── CARD ── */
.c-card {
    background:var(--bg2);
    border:1px solid var(--border2);
    border-radius:6px;
    overflow:hidden;
    margin-bottom:32px;
    animation:fadeUp 0.6s ease both;
    transition: all 0.3s;
}
.c-card:nth-child(2){animation-delay:0.12s;}
.c-card:nth-child(3){animation-delay:0.24s;}
.c-card:hover { border-color: rgba(200,121,65,0.3); box-shadow: 0 8px 32px rgba(0,0,0,0.4); }

.c-card-top { height:3px; background:linear-gradient(to right, var(--copper), var(--copper2), var(--copper3), transparent); }

.c-card-head {
    padding:32px 36px 28px;
    border-bottom:1px solid var(--border2);
    display:flex;align-items:center;gap:16px;
}
.c-card-head i{color:var(--copper);font-size:1.6rem;}
.c-card-head h3{
    font-family:'Playfair Display',serif;
    font-size:1.6rem;font-weight:700;color:var(--off-white);
    letter-spacing: -0.5px;
}

.c-card-body{padding:32px 36px;}

/* Details grid */
.details-grid {
    display:grid;grid-template-columns:repeat(2,1fr);gap:12px;
    margin-bottom:28px;
}

.d-item {
    padding:22px 24px;
    background:var(--bg3);
    border:1px solid var(--border2);
    border-radius:4px;
    border-left:3px solid var(--copper);
    transition:all 0.3s;
}
.d-item:hover{
    background:var(--surface);
    border-left-color:var(--copper2);
    border-color: rgba(200,121,65,0.3);
    transform: translateY(-2px);
}

.d-label {
    font-size:0.65rem;font-weight:600;letter-spacing:0.18em;
    text-transform:uppercase;color:var(--muted);
    display:flex;align-items:center;gap:8px;margin-bottom:10px;
}
.d-label i{color:var(--copper);font-size:0.95rem;}
.d-val {
    font-family:'Playfair Display',serif;
    font-size:1.3rem;font-weight:700;color:var(--off-white);
    letter-spacing: -0.5px;
}

/* Description */
.desc-wrap {
    padding:28px;
    background:var(--bg3);
    border:1px solid var(--border2);
    border-radius:4px;
    border-left:3px solid var(--copper);
    position:relative;overflow:hidden;
    transition: all 0.3s;
}
.desc-wrap:hover { border-color: rgba(200,121,65,0.3); }
.desc-wrap::before {
    content:'"';
    font-family:'Playfair Display',serif;
    font-size:8rem;font-weight:900;
    color:var(--copper-dim);
    position:absolute;top:-24px;right:0;
    line-height:1;pointer-events:none;
}
.desc-text{font-size:0.95rem;font-weight:300;line-height:1.9;color:var(--muted);position:relative;z-index:1;}

/* ── FORM ── */
.form-sec-label {
    font-size:0.65rem;font-weight:600;letter-spacing:0.22em;
    text-transform:uppercase;color:var(--copper);
    margin-bottom:16px;margin-top:8px;
    padding-bottom:10px;border-bottom:1px solid var(--border2);
}

.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;}
.form-row-1{display:grid;grid-template-columns:1fr;gap:16px;margin-bottom:16px;}

.ff{display:flex;flex-direction:column;gap:8px;}

.ff label {
    font-size:0.65rem;font-weight:500;letter-spacing:0.16em;
    text-transform:uppercase;color:var(--muted);
    display:flex;align-items:center;gap:6px;
}
.ff label i{color:var(--copper);font-size:0.85rem;}

.fi {
    padding:14px 16px;
    background:var(--bg3);border:1px solid var(--border2);
    border-radius:4px;color:var(--off-white);
    font-family:'Outfit',sans-serif;font-size:0.9rem;
    outline:none;appearance:none;width:100%;
    transition:border-color 0.25s,background 0.25s,box-shadow 0.25s;
}
.no-img {
    color:var(--muted);
    font-size: 2.55rem;
    font-style:italic;
    text-align:center;
    padding:200px 0;
}
.fi:focus{
    border-color:var(--copper);
    background:var(--surface);
    box-shadow: 0 0 0 3px rgba(200,121,65,0.1);
}
.fi::placeholder{color:var(--muted2);}
.fi option{background:var(--bg3);color:var(--off-white);}
textarea.fi{resize:vertical;min-height:100px;}

.btn-submit {
    width:100%;padding:16px;
    background:linear-gradient(135deg, var(--copper), var(--copper2));
    color:#fff;border:none;
    border-radius:4px;font-family:'Outfit',sans-serif;
    font-size:0.85rem;font-weight:700;letter-spacing:0.14em;
    text-transform:uppercase;cursor:pointer;
    transition:all 0.3s;
    display:flex;align-items:center;justify-content:center;gap:10px;
    margin-top:32px;
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.btn-submit:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(200,121,65,0.5);
    background: linear-gradient(135deg, var(--copper2), var(--copper3));
}

.alert-ok {
    padding:14px 20px;
    background:rgba(74,222,128,0.08);
    border:1px solid rgba(74,222,128,0.25);
    border-radius:3px;color:#4ade80;
    font-size:0.85rem;margin-bottom:20px;
    display:flex;align-items:center;gap:10px;
}

/* ── SIDEBAR ── */
.sidebar{position:sticky;top:88px;}

/* Owner */
.owner-banner {
    background:var(--bg2);
    border:1px solid var(--border2);
    border-radius:6px;
    overflow:hidden;
    margin-bottom:32px;
    animation:fadeUp 0.6s ease 0.12s both;
    transition: all 0.3s;
}
.owner-banner:hover { border-color: rgba(200,121,65,0.3); box-shadow: 0 8px 32px rgba(0,0,0,0.4); }

.owner-banner-top {
    height:3px;
    background:linear-gradient(to right, var(--copper), var(--copper2), transparent);
}

.owner-head {
    padding:32px 32px 0;
    border-bottom:1px solid var(--border2);
    padding-bottom:28px;
    margin-bottom:28px;
}
.owner-head-title {
    font-size:0.65rem;font-weight:700;letter-spacing:0.22em;
    text-transform:uppercase;color:var(--copper);
    margin-bottom:24px;
    display:flex;align-items:center;gap:10px;
}
.owner-head-title i{font-size:1rem;}

.owner-profile{display:flex;align-items:center;gap:20px;}

.owner-av {
    width:70px;height:70px;border-radius:50%;
    background:var(--copper-dim);
    border:2.5px solid var(--copper);
    display:flex;align-items:center;justify-content:center;
    font-family:'Playfair Display',serif;
    font-size:1.8rem;font-weight:900;color:var(--copper2);
    flex-shrink:0;
}
.owner-name{font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:var(--off-white); letter-spacing: -0.5px;}
.owner-role{font-size:0.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:0.12em;margin-top:6px;}

.owner-contacts{padding:0 32px 32px;display:flex;flex-direction:column;gap:12px;}

.c-btn {
    display:flex;align-items:center;justify-content:center;gap:10px;
    padding:15px;border-radius:4px;
    font-family:'Outfit',sans-serif;font-size:0.8rem;font-weight:700;
    letter-spacing:0.1em;text-transform:uppercase;
    text-decoration:none;transition:all 0.3s;border:none;cursor:pointer;
}
.c-btn-primary{
    background:linear-gradient(135deg, var(--copper), var(--copper2));
    color:#fff;
    box-shadow: 0 6px 20px rgba(200,121,65,0.3);
}
.c-btn-primary:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 28px rgba(200,121,65,0.4);
}
.c-btn-wa{background:#25d366;color:#fff; box-shadow: 0 6px 20px rgba(37,211,102,0.2);}
.c-btn-wa:hover{
    background:#128c7e;color:#fff;
    transform:translateY(-2px);
    box-shadow: 0 10px 28px rgba(37,211,102,0.3);
}
.c-btn-ghost{background:transparent;color:var(--muted);border:1px solid var(--border2);}
.c-btn-ghost:hover{border-color:var(--copper);color:var(--copper2);}

/* ── FAB ── */
.fab-group{
    position:fixed;bottom:40px;right:40px;
    z-index:900;display:flex;flex-direction:column;gap:14px;
}
.fab {
    width:60px;height:60px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    color:#fff;font-size:1.4rem;text-decoration:none;
    box-shadow:0 10px 32px rgba(0,0,0,0.5);
    transition:all 0.3s;border:none;cursor:pointer;
}
.fab:hover{transform:translateY(-6px) scale(1.1);color:#fff; box-shadow:0 14px 40px rgba(0,0,0,0.6);}
.fab-ph{background:var(--surface);animation:fabf 3s ease-in-out infinite;}
.fab-em{background:#3b82f6;animation:fabf 3s ease-in-out infinite 0.2s;}
.fab-wa{background:#25d366;animation:fabf 3s ease-in-out infinite 0.4s;}
@keyframes fabf{0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}

/* ── FOOTER ── */
footer {
    background:var(--bg);border-top:1px solid var(--border);
    padding:80px 48px 40px;position:relative;overflow:hidden;
    margin-top:auto;
}
footer::before {
    content:'BMI';position:absolute;bottom:-60px;right:-20px;
    font-family:'Playfair Display',serif;font-size:22rem;font-weight:900;
    color:rgba(200,121,65,0.025);pointer-events:none;user-select:none;line-height:1;
}
.fi2{max-width:1400px;margin:0 auto;}
.f-top{
    display:grid;grid-template-columns:1.6fr 1fr 1fr;
    gap:64px;margin-bottom:64px;padding-bottom:64px;
    border-bottom:1px solid var(--border2);
}
.f-brand{font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:900;color:var(--copper2);margin-bottom:14px;}
.f-tag{font-size:0.9rem;font-weight:300;color:var(--muted);line-height:1.8;margin-bottom:28px;}
.f-socs{display:flex;gap:10px;margin-bottom:32px;}
.f-soc{
    width:48px;height:48px;border-radius:50%;
    border:1px solid var(--border);display:flex;align-items:center;justify-content:center;
    color:var(--copper);font-size:1.1rem;text-decoration:none;transition:all 0.3s;
}
.f-soc:hover{
    background:var(--copper);
    border-color:var(--copper);
    color:#fff;
    transform:translateY(-4px);
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.f-rat{display:inline-block;border:1px solid var(--border);border-radius:4px;padding:18px 24px;background:var(--copper-glow);}
.f-rat .rl{font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--muted);margin-bottom:6px;display:block;}
.f-rat .rs{font-family:'Playfair Display',serif;font-size:2.8rem;font-weight:900;color:var(--copper2);line-height:1;}
.f-rat .rm{font-size:0.78rem;color:var(--muted);}
.f-ct{font-size:0.65rem;font-weight:600;letter-spacing:0.22em;text-transform:uppercase;color:var(--copper);margin-bottom:24px;}
.f-lks{display:flex;flex-direction:column;gap:12px;}
.f-lk{color:var(--muted);text-decoration:none;font-size:0.88rem;font-weight:300;transition:color 0.25s;}
.f-lk:hover{color:var(--off-white);}
.f-cta{}
.f-cta-l{font-size:0.68rem;color:var(--muted);letter-spacing:0.12em;text-transform:uppercase;margin-bottom:16px;display:block;}
.f-cta-b{
    display:inline-flex;align-items:center;gap:8px;
    padding:15px 32px;
    background:linear-gradient(135deg, var(--copper), var(--copper2));
    color:#fff;font-size:0.8rem;font-weight:700;
    letter-spacing:0.12em;text-transform:uppercase;
    text-decoration:none;border-radius:4px;
    transition:all 0.3s;
    box-shadow: 0 8px 24px rgba(200,121,65,0.3);
}
.f-cta-b:hover{
    transform:translateY(-3px);
    box-shadow: 0 12px 32px rgba(200,121,65,0.5);
    background: linear-gradient(135deg, var(--copper2), var(--copper3));
}.f-bot{display:flex;align-items:center;justify-content:space-between;font-size:0.75rem;color:var(--muted2);}
.f-bot a{color:var(--muted2);text-decoration:none;transition:color 0.25s;}
.f-bot a:hover{color:var(--copper);}
.f-leg{display:flex;gap:28px;}

/* ── ANIMATIONS ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}

/* ── RESPONSIVE ── */
@media(max-width:1100px){
    .content-layout{grid-template-columns:1fr;}
    .sidebar{position:static;}
    .f-top{grid-template-columns:1fr;gap:40px;}
    .f-bot{flex-direction:column;gap:16px;}
}
@media(max-width:768px){
    nav{padding:0 20px;}
    .nav-brand{display:none;}
    .g-breadcrumb{left:20px;}
    .gallery-info{padding:0 20px 48px;width:100%;}
    .gallery-price{right:20px;bottom:48px;}
    .thumbs{padding:10px 20px;}
    .page-body{padding:40px 20px 80px;}
    .form-row{grid-template-columns:1fr;}
    .details-grid{grid-template-columns:1fr;}
    footer{padding:60px 20px 32px;}
    footer::before{display:none;}
    .fab-group{bottom:20px;right:20px;}
}
</style>
</head>
<body>

<nav>
    <a href="{{ route('accueil') }}"><img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="BMI"></a>
        <div class="nav-right">
        @auth
            <div class="user-pill">
                <div class="user-av">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div>
                <a href="{{ route('mon-activite.index') }}" class="nbtn"><i class="mdi mdi-history"></i></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nbtn"><i class="mdi mdi-logout"></i></button>
                </form>
            </div>
        @else
            <a href="{{ route('authentification') }}" class="nbtn copper"><i class="mdi mdi-login"></i> Connexion</a>
        @endauth
    </div>
</nav>

<!-- GALLERY -->
<div class="gallery">
    <div class="gallery-overlay"></div>

    <div class="g-breadcrumb">
        <a href="{{ route('accueil') }}"><i class="mdi mdi-home-outline"></i> Accueil</a>
        <i class="mdi mdi-chevron-right"></i>
        <span>{{ $bien->type_bien }}</span>
    </div>

    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000" style="height:100%">
        <div class="carousel-inner">
            @foreach($bien->images as $k => $img)
            <div class="carousel-item {{ $k==0?'active':'' }}">
                <img src="{{ asset('storage/'.$img->image_path) }}" alt="Photo {{ $k+1 }}">
            </div>
            @endforeach
            @if(count($bien->images)==0)
            <p class="no-img">Pas d'images disponibles actuellement</p>
            @endif
        </div>

        @if(count($bien->images)>1)
        <button class="cctrl cctrl-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <i class="mdi mdi-chevron-left"></i>
        </button>
        <button class="cctrl cctrl-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <i class="mdi mdi-chevron-right"></i>
        </button>
        @endif
    </div>

    <div class="gallery-info">
        <div class="g-tag">BMI Immobilier</div>
        <h1 class="g-title">{{ $bien->type_bien }}</h1>
        <div class="g-loc"><i class="mdi mdi-map-marker"></i> {{ $bien->adresse_bien }}</div>
    </div>

    <div class="gallery-price">
        <div class="g-status">
            <span class="sdot sdot-{{ $bien->statut ?? 'disponible' }}"></span>
            {{ ucfirst($bien->statut ?? 'Disponible') }}
        </div>
        <div class="g-price">{{ number_format($bien->prix,0,',',' ') }}</div>
        <span class="g-price-unit">FCFA</span>
    </div>
</div>

<!-- THUMBS -->
@if(count($bien->images)>1)
<div class="thumbs">
    @foreach($bien->images as $k => $img)
    <img src="{{ asset('storage/'.$img->image_path) }}"
         class="thumb {{ $k==0?'active':'' }}" data-index="{{ $k }}" alt="Miniature {{ $k+1 }}">
    @endforeach
</div>
@endif

<!-- BODY -->
<div class="page-body">
    <div class="content-layout">

        <!-- LEFT -->
        <div>
            <!-- Caractéristiques -->
            <div class="c-card">
                <div class="c-card-top"></div>
                <div class="c-card-head">
                    <i class="mdi mdi-home-analytics"></i>
                    <h3>Caractéristiques</h3>
                </div>
                <div class="c-card-body">
                    <div class="details-grid">
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-home-variant-outline"></i> Type</div>
                            <div class="d-val">{{ $bien->type_bien }}</div>
                        </div>
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-ruler-square"></i> Superficie</div>
                            <div class="d-val">{{ $bien->superficie }} m²</div>
                        </div>
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-map-marker-outline"></i> Localisation</div>
                            <div class="d-val">{{ $bien->adresse_bien }}</div>
                        </div>
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-tag-outline"></i> Statut</div>
                            <div class="d-val">{{ ucfirst($bien->statut ?? 'Disponible') }}</div>
                        </div>
                        @if(isset($bien->nb_chambres))
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-bed-outline"></i> Chambres</div>
                            <div class="d-val">{{ $bien->nb_chambres }}</div>
                        </div>
                        @endif
                        @if(isset($bien->nb_salles_bain))
                        <div class="d-item">
                            <div class="d-label"><i class="mdi mdi-shower"></i> Salles de bain</div>
                            <div class="d-val">{{ $bien->nb_salles_bain }}</div>
                        </div>
                        @endif
                    </div>

                    @if($bien->description)
                    <div class="desc-wrap">
                        <p class="desc-text">{{ $bien->description }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Visite Form -->
            @if($bien->statut == 'Disponible')
            <div class="c-card">
                <div class="c-card-top"></div>
                <div class="c-card-head">
                    <i class="mdi mdi-calendar-check-outline"></i>
                    <h3>Planifier une visite</h3>
                </div>
                <div class="c-card-body">
                    @if(session('success'))
                    <div class="alert-ok"><i class="mdi mdi-check-circle"></i> {{ session('success') }}</div>
                    @endif

                    <form action="{{ route('enregistrer.visite.public', $bien->id) }}" method="POST">
                        @csrf
                        <div class="form-sec-label">Vos informations</div>
                        <div class="form-row">
                            <div class="ff">
                                <label><i class="mdi mdi-account-outline"></i> Nom</label>
                                <input class="fi" type="text" name="nom_client" placeholder="Votre nom" required>
                            </div>
                            <div class="ff">
                                <label><i class="mdi mdi-account-outline"></i> Prénom</label>
                                <input class="fi" type="text" name="prenom_client" placeholder="Votre prénom" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="ff">
                                <label><i class="mdi mdi-phone-outline"></i> Téléphone</label>
                                <input class="fi" type="text" name="tel_client" placeholder="+225 XX XX XX XX" required>
                            </div>
                            <div class="ff">
                                <label><i class="mdi mdi-email-outline"></i> Email</label>
                                <input class="fi" type="email" name="email_client" placeholder="votre@email.com" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="ff">
                                <label><i class="mdi mdi-cash-multiple"></i> Budget (FCFA)</label>
                                <input class="fi" type="number" name="budget_client" placeholder="Budget estimé" required>
                            </div>
                            <div class="ff">
                                <label><i class="mdi mdi-text-box-outline"></i> Préférences</label>
                                <textarea class="fi" name="preferences" placeholder="Vos attentes..." rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-sec-label">Détails de la visite</div>
                        <div class="form-row">
                            <div class="ff">
                                <label><i class="mdi mdi-calendar-outline"></i> Date</label>
                                <input class="fi" type="date" name="date_visite" required>
                            </div>
                            <div class="ff">
                                <label><i class="mdi mdi-clock-outline"></i> Heure</label>
                                <input class="fi" type="time" name="heure_visite" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="ff">
                                <label><i class="mdi mdi-list-status"></i> Statut visite</label>
                                <select class="fi" name="statut_visite" required>
                                    <option value="" disabled selected>— Choisir —</option>
                                    <option>Prévue</option>
                                    <option>Effectuée</option>
                                    <option>Annulée</option>
                                </select>
                            </div>
                            <div class="ff">
                                <label><i class="mdi mdi-cash-outline"></i> Montant (FCFA)</label>
                                <input class="fi" type="number" name="montant_visite" placeholder="Ex: 10 000" required>
                            </div>
                        </div>
                        <div class="form-row-1">
                            <div class="ff">
                                <label><i class="mdi mdi-credit-card-outline"></i> Moyen de paiement</label>
                                <select class="fi" name="moyen_paiement" required>
                                    <option value="" disabled selected>— Choisir —</option>
                                    <option>Espèces</option>
                                    <option>Carte bancaire</option>
                                    <option>Virement</option>
                                    <option>Mobile Money</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="mdi mdi-check-circle-outline"></i>
                            Confirmer la visite
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="owner-banner">
                <div class="owner-banner-top"></div>
                <div class="owner-head">
                    <div class="owner-head-title"><i class="mdi mdi-account-circle-outline"></i> Propriétaire</div>
                    <div class="owner-profile">
                        <div class="owner-av">
                            {{ strtoupper(substr($bien->proprietaire->nom_proprio,0,1)) }}{{ strtoupper(substr($bien->proprietaire->prenom_proprio,0,1)) }}
                        </div>
                        <div>
                            <div class="owner-name">{{ $bien->proprietaire->nom_proprio }} {{ $bien->proprietaire->prenom_proprio }}</div>
                            <div class="owner-role">Propriétaire</div>
                        </div>
                    </div>
                </div>
                <div class="owner-contacts">
                    <a href="tel:{{ $bien->proprietaire->tel_proprio }}" class="c-btn c-btn-primary">
                        <i class="mdi mdi-phone"></i> Appeler
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/\D/','', $bien->proprietaire->tel_proprio) }}" class="c-btn c-btn-wa" target="_blank">
                        <i class="mdi mdi-whatsapp"></i> WhatsApp
                    </a>
                    <a href="mailto:{{ $bien->proprietaire->email_proprio ?? 'contact@bmiimmo.ci' }}" class="c-btn c-btn-ghost">
                        <i class="mdi mdi-email-outline"></i> Email
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FAB -->
<div class="fab-group">
    <a href="tel:{{ $bien->proprietaire->tel_proprio }}" class="fab fab-ph"><i class="mdi mdi-phone"></i></a>
    <a href="mailto:{{ $bien->proprietaire->email_proprio ?? 'contact@bmiimmo.ci' }}" class="fab fab-em"><i class="mdi mdi-email"></i></a>
    <a href="https://wa.me/{{ preg_replace('/\D/','', $bien->proprietaire->tel_proprio) }}" class="fab fab-wa" target="_blank"><i class="mdi mdi-whatsapp"></i></a>
</div>

<footer>
    <div class="fi2">
        <div class="f-top">
            <div>
                <div class="f-brand">BMI IMMO</div>
                <p class="f-tag">Votre partenaire de confiance pour tous vos projets immobiliers en Côte d'Ivoire. Excellence, intégrité et résultats depuis plus de 10 ans.</p>
                <div class="f-socs">
                    <a href="#" class="f-soc"><i class="mdi mdi-facebook"></i></a>
                    <a href="#" class="f-soc"><i class="mdi mdi-instagram"></i></a>
                    <a href="#" class="f-soc"><i class="mdi mdi-youtube"></i></a>
                </div>
                <div class="f-rat">
                    <span class="rl">Satisfaction clients</span>
                    <div><span class="rs">9,4</span><span class="rm"> / 10</span></div>
                </div>
            </div>
            <div>
                <div class="f-ct">Liens utiles</div>
                <div class="f-lks">
                    <a href="#" class="f-lk">Offres d'emploi</a>
                    <a href="#" class="f-lk">Devenir franchisé</a>
                    <a href="#" class="f-lk">Entreprise & commerce</a>
                    <a href="#" class="f-lk">Fine Homes & Estates</a>
                    <a href="#" class="f-lk">À propos</a>
                    <a href="#" class="f-lk">Nous contacter</a>
                </div>
            </div>
            <div class="f-cta">
                <span class="f-cta-l">Votre espace</span>
                <a href="{{ route('authentification') }}" class="f-cta-b"><i class="mdi mdi-account-circle-outline"></i> Mon compte</a>
            </div>
        </div>
        <div class="f-bot">
            <span>© {{ date('Y') }} BMI Immobilier — Tous droits réservés</span>
            <div class="f-leg">
                <a href="#">Mentions légales</a>
                <a href="#">Données personnelles</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const thumbs = document.querySelectorAll('.thumb');
const car = document.getElementById('carousel');

thumbs.forEach(t => {
    t.addEventListener('click', () => {
        const i = parseInt(t.dataset.index);
        const bc = bootstrap.Carousel.getInstance(car) || new bootstrap.Carousel(car);
        bc.to(i);
        thumbs.forEach(x => x.classList.remove('active'));
        t.classList.add('active');
    });
});

if(car) {
    car.addEventListener('slide.bs.carousel', e => {
        thumbs.forEach(x => x.classList.remove('active'));
        if(thumbs[e.to]) thumbs[e.to].classList.add('active');
    });
}
</script>
</body>
</html>
