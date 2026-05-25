<?php
/**
 * Shinto Wisdom: Daily Practice — app promo (Japan Empire Network).
 * Include before <footer> on any page: require __DIR__ . '/includes/shinto-promo.php';
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400&family=Crimson+Pro:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

<section class="sp-wrap" aria-label="Shinto Wisdom app">
  <div class="sp-inner">

    <div class="sp-deco" aria-hidden="true">
      <svg class="sp-torii" viewBox="0 0 120 140" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="28" width="100" height="8" rx="2" fill="#B5451B" opacity="0.85"/>
        <rect x="18" y="38" width="84" height="5" rx="1.5" fill="#B5451B" opacity="0.6"/>
        <rect x="8" y="24" width="104" height="6" rx="2" fill="#B5451B" opacity="0.45"/>
        <rect x="26" y="43" width="10" height="90" rx="3" fill="#B5451B" opacity="0.75"/>
        <rect x="84" y="43" width="10" height="90" rx="3" fill="#B5451B" opacity="0.75"/>
      </svg>
      <div class="sp-kanji">間</div>
      <div class="sp-romaji">Ma</div>
    </div>

    <div class="sp-content">
      <div class="sp-app-header">
        <img
          class="sp-icon"
          src="https://play-lh.googleusercontent.com/reZPnavwCMYMIhIYHU46GSguiXdOpPI0x1pEz_9Oez-qpih0gxNl2Fur3oOlXUwbqKJqaXNbAt7J_k4XkaQokw=w120-h120"
          alt="Shinto Wisdom app icon"
          width="72"
          height="72"
          loading="lazy"
        >
        <div class="sp-app-meta">
          <span class="sp-label">Free App · No Ads · Offline</span>
          <h2 class="sp-title">Shinto Wisdom<span class="sp-title-sub"> Daily Practice</span></h2>
          <p class="sp-studio">by 10k Game Studio</p>
        </div>
      </div>

      <p class="sp-desc">
        Every day, one teaching. One moment of stillness.<br>
        Kanji, meaning, and a quiet reflection — rooted in the philosophy
        behind Japan's forests, seasons, and sacred silences.
      </p>

      <div class="sp-concepts">
        <span>結び Musubi</span>
        <span>清め Harae</span>
        <span>自然 Shizen</span>
        <span>間 Ma</span>
        <span>誠 Makoto</span>
        <span class="sp-more">+ 45 more</span>
      </div>

      <a
        class="sp-badge"
        href="https://play.google.com/store/apps/details?id=com.studio10k.daily_shinto_wisdom"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Get Shinto Wisdom on Google Play"
      >
        <svg class="sp-gplay-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M3.18 23.76c.37.21.8.22 1.2.02l13.56-7.63-3.03-3.04-11.73 10.65zM.5 1.56C.19 1.96 0 2.53 0 3.26v17.48c0 .73.19 1.3.5 1.7l.09.08 9.79-9.79v-.23L.59 1.48.5 1.56zm20.32 8.88-2.67-1.5-3.36 3.36 3.36 3.37 2.68-1.51c.77-.43.77-1.28-.01-1.72zM4.38.26 17.94 7.9l-3.03 3.03L3.18.28c.4-.21.83-.2 1.2-.02z" fill="currentColor"/>
        </svg>
        <span class="sp-badge-text">
          <span class="sp-badge-top">Get it on</span>
          <span class="sp-badge-main">Google Play</span>
        </span>
      </a>
    </div>
  </div>
</section>

<style>
.sp-wrap {
  --sp-bg:       #F8F3EB;
  --sp-border:   #D6C9B0;
  --sp-vermil:   #B5451B;
  --sp-ink:      #2A2318;
  --sp-muted:    #7A6E5F;
  --sp-chip-bg:  #EDE5D5;
  --sp-chip-txt: #5C4A30;
  background: var(--sp-bg);
  border-top: 1px solid var(--sp-border);
  border-bottom: 1px solid var(--sp-border);
  padding: 3rem 1.5rem;
  margin: 3rem 0 0;
  position: relative;
  overflow: hidden;
  width: 100%;
  box-sizing: border-box;
}
.sp-wrap::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(0,0,0,0.03) 40px),
    repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(0,0,0,0.015) 40px);
  pointer-events: none;
}
.sp-inner {
  max-width: 860px;
  margin: 0 auto;
  display: flex;
  gap: 2.5rem;
  align-items: center;
  position: relative;
}
.sp-deco {
  flex: 0 0 110px;
  display: flex;
  flex-direction: column;
  align-items: center;
  opacity: 0.55;
}
.sp-torii {
  width: 70px;
  height: auto;
  margin-bottom: 0.5rem;
}
.sp-kanji {
  font-family: 'Noto Serif JP', serif;
  font-size: 2.8rem;
  font-weight: 300;
  color: var(--sp-ink);
  line-height: 1;
  letter-spacing: -0.02em;
}
.sp-romaji {
  font-family: 'Crimson Pro', 'Georgia', serif;
  font-size: 0.8rem;
  font-style: italic;
  color: var(--sp-muted);
  margin-top: 0.2rem;
  letter-spacing: 0.1em;
}
.sp-content { flex: 1; min-width: 0; }
.sp-app-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1rem;
}
.sp-icon {
  width: 64px;
  height: 64px;
  border-radius: 16px;
  flex-shrink: 0;
  box-shadow: 0 2px 8px rgba(0,0,0,0.12);
}
.sp-app-meta { display: flex; flex-direction: column; gap: 0.15rem; }
.sp-label {
  font-family: 'Crimson Pro', 'Georgia', serif;
  font-size: 0.75rem;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--sp-vermil);
}
.sp-title {
  font-family: 'Noto Serif JP', serif;
  font-size: 1.35rem;
  font-weight: 400;
  color: var(--sp-ink);
  margin: 0;
  line-height: 1.2;
}
.sp-title-sub {
  font-family: 'Crimson Pro', serif;
  font-weight: 300;
  font-style: italic;
  font-size: 1.1rem;
  color: var(--sp-muted);
}
.sp-studio {
  font-family: 'Crimson Pro', serif;
  font-size: 0.8rem;
  color: var(--sp-muted);
  margin: 0;
}
.sp-desc {
  font-family: 'Crimson Pro', 'Georgia', serif;
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--sp-ink);
  margin: 0 0 1rem;
}
.sp-concepts {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
  margin-bottom: 1.25rem;
}
.sp-concepts span {
  font-family: 'Noto Serif JP', serif;
  font-size: 0.72rem;
  font-weight: 400;
  background: var(--sp-chip-bg);
  color: var(--sp-chip-txt);
  padding: 0.25rem 0.6rem;
  border-radius: 3px;
  border: 1px solid var(--sp-border);
  white-space: nowrap;
}
.sp-more {
  font-family: 'Crimson Pro', serif !important;
  font-style: italic;
  font-size: 0.78rem !important;
  color: var(--sp-muted) !important;
  background: transparent !important;
  border-color: transparent !important;
  padding-left: 0 !important;
}
.sp-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  background: var(--sp-ink);
  color: #F8F3EB;
  text-decoration: none;
  padding: 0.55rem 1.1rem;
  border-radius: 6px;
  transition: background 0.2s;
}
.sp-badge:hover { background: #3D2F1A; }
.sp-gplay-icon { width: 18px; height: 18px; flex-shrink: 0; }
.sp-badge-text { display: flex; flex-direction: column; line-height: 1.1; }
.sp-badge-top {
  font-family: 'Crimson Pro', serif;
  font-size: 0.65rem;
  letter-spacing: 0.05em;
  opacity: 0.75;
}
.sp-badge-main {
  font-family: 'Noto Serif JP', serif;
  font-size: 0.9rem;
  font-weight: 400;
}
@media (max-width: 600px) {
  .sp-deco { display: none; }
  .sp-inner { flex-direction: column; gap: 0; }
  .sp-desc { font-size: 0.95rem; }
}
</style>
