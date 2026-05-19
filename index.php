```php
<?php
// Template: FAQ
include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="cs">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $page_title ?? 'FAQ – Časté dotazy'; ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Inter:wght@500&display=swap" rel="stylesheet">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');

  :root {
    --red: rgba(232,25,62,1.0);
    --red-dark: rgba(199,31,63,1.0);
    --navy: rgba(36,29,69,1.0);
    --light-bg: rgba(245,245,245,1.0);
    --white: rgba(255,255,255,1.0);
    --gold: rgba(242,168,56,1.0);
    --gray-bg: rgba(237,237,237,1.0);
    --dark: rgba(30,30,30,1.0);
    --black: rgba(0,0,0,1.0);
    --gradient1: linear-gradient(135deg, rgba(214,214,255,1.0) 1%, rgba(220,230,243,1.0) 48%, rgba(237,133,152,1.0) 100%);
  }

  *, *::before, *::after { box-sizing: border-box; }

  body {
    background-color: var(--light-bg);
    font-family: 'Proxima Nova', 'Inter', Arial, sans-serif;
    color: var(--navy);
    margin: 0;
    padding: 0;
  }

  /* NAVBAR */
  .navbar-custom {
    background: var(--white);
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    padding: 0;
    min-height: 80px;
  }
  .navbar-custom .navbar-brand img {
    height: 40px;
    width: auto;
  }
  .navbar-custom .nav-link {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 13px;
    color: var(--navy) !important;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 0.5rem 0.75rem;
    transition: color 0.2s;
  }
  .navbar-custom .nav-link:hover { color: var(--red) !important; }
  .navbar-custom .nav-link.active-faq { color: var(--red) !important; }
  .navbar-custom .navbar-toggler { border: none; }
  .navbar-custom .navbar-toggler:focus { box-shadow: none; }
  .search-icon {
    cursor: pointer;
    padding: 0.5rem 0.75rem;
    display: flex;
    align-items: center;
  }

  /* VIDEO HEADER */
  .video-header {
    position: relative;
    width: 100%;
    height: 540px;
    overflow: hidden;
    background: var(--dark);
    display: flex;
    align-items: flex-end;
  }
  .video-header img.header-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.7;
  }
  .video-header .header-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 60%);
    z-index: 1;
  }
  .video-header .header-content {
    position: relative;
    z-index: 2;
    padding-bottom: 60px;
    padding-left: 15px;
    padding-right: 15px;
  }
  .video-header h1 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(48px, 7vw, 96px);
    color: var(--light-bg);
    line-height: 1.1;
    margin: 0;
    letter-spacing: 0.02em;
  }

  /* INTRO TEXT */
  .intro-section {
    background: var(--light-bg);
    padding: 40px 0 10px 0;
  }
  .intro-section p {
    font-size: 16px;
    font-weight: 400;
    color: var(--navy);
    margin: 0;
    line-height: 1.6;
  }

  /* FAQ SECTIONS */
  .faq-section {
    background: var(--light-bg);
    padding: 60px 0;
  }

  /* Q1: Proč bych se měl/a testovat */
  .faq-q1 {
    padding: 60px 0 40px;
  }
  .faq-q1 .question-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(26px, 3vw, 40px);
    color: var(--navy);
    line-height: 1.2;
    margin-bottom: 20px;
  }
  .faq-q1 .question-body {
    font-size: 16px;
    font-weight: 400;
    color: var(--navy);
    line-height: 1.7;
  }

  /* Dark card style */
  .dark-card {
    position: relative;
    overflow: hidden;
    min-height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }
  .dark-card img.card-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
  }
  .dark-card .card-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.82) 0%, transparent 60%);
    z-index: 1;
  }
  .dark-card .card-content {
    position: relative;
    z-index: 2;
    padding: 32px;
  }
  .dark-card .card-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(22px, 2.5vw, 40px);
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 12px;
  }
  .dark-card .card-text {
    font-size: 15px;
    font-weight: 400;
    color: var(--light-bg);
    line-height: 1.65;
  }

  /* Light card style */
  .light-card {
    background: var(--light-bg);
    padding: 40px 40px 40px 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 400px;
  }
  .light-card .card-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(22px, 2.5vw, 40px);
    color: var(--navy);
    line-height: 1.2;
    margin-bottom: 16px;
  }
  .light-card .card-text {
    font-size: 16px;
    font-weight: 400;
    color: var(--navy);
    line-height: 1.7;
  }

  /* Pairs */
  .faq-pair {
    margin-bottom: 0;
  }
  .faq-pair .row {
    min-height: 400px;
  }

  /* Q5: Je testování anonymní */
  .anon-card {
    position: relative;
    overflow: hidden;
    min-height: 400px;
  }
  .anon-card img.card-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
  }
  .anon-card .card-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(80,79,79,0.0) 4%, rgba(41,20,24,1.0) 100%);
    z-index: 1;
  }
  .anon-card .card-content {
    position: relative;
    z-index: 2;
    padding: 32px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }
  .anon-card .card-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(22px, 2.5vw, 40px);
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 12px;
  }
  .anon-card .card-text {
    font-size: 15px;
    font-weight: 400;
    color: var(--light-bg);
    line-height: 1.65;
  }

  /* Kolik stoji dark card */
  .stoji-card {
    position: relative;
    overflow: hidden;
    min-height: 400px;
  }
  .stoji-card img.card-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
  }
  .stoji-card .card-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(80,79,79,0.0) 4%, rgba(54,57,52,1.0) 100%);
    z-index: 1;
  }
  .stoji-card .card-content {
    position: relative;
    z-index: 2;
    padding: 32px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }
  .stoji-card .card-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(22px, 2.5vw, 40px);
    color: var(--white);
    line-height: 1.2;
    margin-bottom: 12px;
  }
  .stoji-card .card-text {
    font-size: 15px;
    font-weight: 400;
    color: var(--light-bg);
    line-height: 1.65;
    white-space: pre-line;
  }

  /* Je lecba row */
  .lecba-section {
    background: var(--light-bg);
    padding: 60px 0;
  }
  .lecba-section .lecba-text-col {
    padding: 40px 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .lecba-section .lecba-title {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(26px, 3vw, 40px);
    color: var(--navy);
    line-height: 1.2;
    margin-bottom: 20px;
    white-space: pre-line;
  }
  .lecba-section .lecba-body {
    font-size: 16px;
    font-weight: 400;
    color: var(--navy);
    line-height: 1.75;
    white-space: pre-line;
  }
  .lecba-section .lecba-img-col {
    position: relative;
    min-height: 400px;
    overflow: hidden;
  }
  .lecba-section .lecba-img-col img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* HIV / Zloutenka promo cards */
  .promo-section {
    background: var(--light-bg);
    padding: 60px 0 40px;
  }
  .promo-section h2 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(28px, 3.5vw, 48px);
    color: var(--navy);
    margin-bottom: 24px;
  }
  .promo-card {
    position: relative;
    overflow: hidden;
    min-height: 320px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    border-radius: 4px;
  }
  .promo-card img.card-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
  }
  .promo-card .card-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.80) 0%, transparent 60%);
    z-index: 1;
  }
  .promo-card .card-content {
    position: relative;
    z-index: 2;
    padding: 28px 28px 28px;
  }
  .promo-card .card-text {
    font-size: 15px;
    font-weight: 400;
    color: var(--white);
    line-height: 1.5;
    margin-bottom: 16px;
  }
  .btn-red {
    background-color: var(--red);
    color: var(--white);
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border: none;
    padding: 10px 28px;
    border-radius: 2px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.2s;
  }
  .btn-red:hover { background-color: var(--red-dark); color: var(--white); }
  .btn-gold {
    background-color: var(--gold);
    color: var(--navy);
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border: none;
    padding: 10px 28px;
    border-radius: 2px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.2s;
  }
  .btn-gold:hover { background-color: #d4911e; color: var(--navy); }

  /* BOTTOM LINK CARDS */
  .bottom-links-section {
    background: var(--light-bg);
    padding: 20px 0 60px;
  }
  .bottom-link-card {
    background: var(--gradient1);
    background: linear-gradient(135deg, rgba(214,214,255,1.0) 1%, rgba(220,230,243,1.0) 48%, rgba(237,133,152,1.0) 100%);
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 24px 32px;
    text-decoration: none;
    transition: opacity 0.2s;
    height: 100%;
    min-height: 100px;
  }
  .bottom-link-card:hover { opacity: 0.9; }
  .bottom-link-card img.link-icon {
    width: 60px;
    height: 60px;
    object-fit: contain;
    flex-shrink: 0;
  }
  .bottom-link-card .link-label {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(13px, 1.4vw, 17px);
    text-transform: uppercase;
    color: var(--navy);
    line-height: 1.3;
    letter-spacing: 0.03em;
  }
  /* Third card no icon */
  .bottom-link-card-plain {
    background: linear-gradient(135deg, rgba(214,214,255,1.0) 1%, rgba(220,230,243,1.0) 48%, rgba(237,133,152,1.0) 100%);
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 24px 32px;
    text-decoration: none;
    transition: opacity 0.2s;
    height: 100%;
    min-height: 100px;
  }
  .bottom-link-card-plain:hover { opacity: 0.9; }
  .bottom-link-card-plain .link-label {
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: clamp(13px, 1.4vw, 17px);
    text-transform: uppercase;
    color: var(--navy);
    line-height: 1.3;
    letter-spacing: 0.03em;
    white-space: pre-line;
  }

  /* FOOTER */
  footer.site-footer {
    background-color: var(--navy);
    color: var(--white);
    padding: 44px 0 0;
  }
  footer.site-footer .footer-logo img {
    height: 50px;
    width: auto;
  }
  footer.site-footer .footer-nav a {
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
  }
</style>
</head>
<body>

<!-- NAVBAR -->
<?php include('includes/navbar.php'); ?>

<!-- VIDEO HEADER -->
<div class="video-header">
  <img class="header-bg" src="<?php echo $header_bg_image ?? 'img/faq-header.jpg'; ?>" alt="<?php echo $header_bg_alt ?? 'FAQ header'; ?>">
  <div class="header-overlay"></div>
  <div class="header-content container">
    <h1><?php echo $header_title ?? 'FAQ'; ?></h1>
  </div>
</div>

<!-- INTRO -->
<section class="intro-section">
  <div class="container">
    <p><?php echo $intro_text ?? ''; ?></p>
  </div>
</section>

<!-- FAQ Q1 -->
<section class="faq-q1">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="question-title"><?php echo $faq_q1_title ?? ''; ?></div>
        <div class="question-body"><?php echo $faq_q1_body ?? ''; ?></div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ PAIR 1 -->
<section class="faq-pair">
  <div class="row g-0">
    <div class="col-md-6">
      <div class="dark-card">
        <img class="card-bg" src="<?php echo $faq_pair1_left_img ?? 'img/faq-pair1-left.jpg'; ?>" alt="<?php echo $faq_pair1_left_img_alt ?? ''; ?>">
        <div class="card-gradient"></div>
        <div class="card-content">
          <div class="card-title"><?php echo $faq_pair1_left_title ?? ''; ?></div>
          <div class="card-text"><?php echo $faq_pair1_left_text ?? ''; ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="light-card">
        <div class="card-title"><?php echo $faq_pair1_right_title ?? ''; ?></div>
        <div class="card-text"><?php echo $faq_pair1_right_text ?? ''; ?></div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ PAIR 2 -->
<section class="faq-pair">
  <div class="row g-0">
    <div class="col-md-6">
      <div class="light-card">
        <div class="card-title"><?php echo $faq_pair2_left_title ?? ''; ?></div>
        <div class="card-text"><?php echo $faq_pair2_left_text ?? ''; ?></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="dark-card">
        <img class="card-bg" src="<?php echo $faq_pair2_right_img ?? 'img/faq-pair2-right.jpg'; ?>" alt="<?php echo $faq_pair2_right_img_alt ?? ''; ?>">
        <div class="card-gradient"></div>
        <div class="card-content">
          <div class="card-title"><?php echo $faq_pair2_right_title ?? ''; ?></div>
          <div class="card-text"><?php echo $faq_pair2_right_text ?? ''; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Q5: Anonymní -->
<section class="faq-pair">
  <div class="row g-0">
    <div class="col-md-6">
      <div class="anon-card">
        <img class="card-bg" src="<?php echo $faq_anon_img ?? 'img/faq-anon.jpg'; ?>" alt="<?php echo $faq_anon_img_alt ?? ''; ?>">
        <div class="card-gradient"></div>
        <div class="card-content">
          <div class="card-title"><?php echo $faq_anon_title ?? ''; ?></div>
          <div class="card-text"><?php echo $faq_anon_text ?? ''; ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="stoji-card">
        <img class="card-bg" src="<?php echo $faq_stoji_img ?? 'img/faq-stoji.jpg'; ?>" alt="<?php echo $faq_stoji_img_alt ?? ''; ?>">
        <div class="card-gradient"></div>
        <div class="card-content">
          <div class="card-title"><?php echo $faq_stoji_title ?? ''; ?></div>
          <div class="card-text"><?php echo $faq_stoji_text ?? ''; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LÉČBA SECTION -->
<section class="lecba-section">
  <div class="container-fluid px-0">
    <div class="row g-0">
      <div class="col-md-6 lecba-text-col">
        <div class="lecba-title"><?php echo $lecba_title ?? ''; ?></div>
        <div class="lecba-body"><?php echo $lecba_body ?? ''; ?></div>
      </div>
      <div class="col-md-6 lecba-img-col">
        <img src="<?php echo $lecba_img ?? 'img/lecba.jpg'; ?>" alt="<?php echo $lecba_img_alt ?? ''; ?>">
      </div>
    </div>
  </div>
</section>

<!-- PROMO CARDS -->
<section class="promo-section">
  <div class="container">
    <h2><?php echo $promo_section_title ?? ''; ?></h2>
    <div class="row g-3">
      <div class="col-md-6">
        <div class="promo-card">
          <img class="card-bg" src="<?php echo $promo_card1_img ?? 'img/promo-hiv.jpg'; ?>" alt="<?php echo $promo_card1_img_alt ?? ''; ?>">
          <div class="card-gradient"></div>
          <div class="card-content">
            <div class="card-text"><?php echo $promo_card1_text ?? ''; ?></div>
            <a href="<?php echo $promo_card1_btn_url ?? '#'; ?>" class="btn-red"><?php echo $promo_card1_btn_label ?? ''; ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="promo-card">
          <img class="card-bg" src="<?php echo $promo_card2_img ?? 'img/promo-zloutenka.jpg'; ?>" alt="<?php echo $promo_card2_img_alt ?? ''; ?>">
          <div class="card-gradient"></div>
          <div class="card-content">
            <div class="card-text"><?php echo $promo_card2_text ?? ''; ?></div>
            <a href="<?php echo $promo_card2_btn_url ?? '#'; ?>" class="btn-gold"><?php echo $promo_card2_btn_label ?? ''; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BOTTOM LINK CARDS -->
<section class="bottom-links-section">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-4">
        <a href="<?php echo $bottom_link1_url ?? '#'; ?>" class="bottom-link-card">
          <img class="link-icon" src="<?php echo $bottom_link1_icon ?? 'img/icon1.png'; ?>" alt="<?php echo $bottom_link1_icon_alt ?? ''; ?>">
          <span class="link-label"><?php echo $bottom_link1_label ?? ''; ?></span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php echo $bottom_link2_url ?? '#'; ?>" class="bottom-link-card">
          <img class="link-icon" src="<?php echo $bottom_link2_icon ?? 'img/icon2.png'; ?>" alt="<?php echo $bottom_link2_icon_alt ?? ''; ?>">
          <span class="link-label"><?php echo $bottom_link2_label ?? ''; ?></span>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php echo $bottom_link3_url ?? '#'; ?>" class="bottom-link-card-plain">
          <span class="link-label"><?php echo $bottom_link3_label ?? ''; ?></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<?php include('includes/footer.php'); ?>

</body>
</html>
<?php
```