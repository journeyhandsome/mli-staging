<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WZ3ZXG4');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Change of Status (COS) Support | Mentor Language Institute</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy: '#1a365d',
            'navy-light': '#2c5282',
            gold: '#d69e2e',
            'gold-light': '#ecc94b',
            cream: '#fffbeb',
            success: '#38a169',
            danger: '#e53e3e',
          },
          fontFamily: {
            sans: ['DM Sans', 'sans-serif'],
            serif: ['Playfair Display', 'serif'],
          },
        },
      },
    };
  </script>
  <style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ3ZXG4"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  {{-- =========================================================
       HEADER
  ========================================================= --}}
  <header class="bg-white sticky top-0 z-50 shadow-sm">
    {{-- Top Row --}}
    <div class="max-w-[1100px] mx-auto px-4 sm:px-6 py-3 sm:py-4 flex justify-between items-center gap-4">
      {{-- Logo --}}
      <a href="https://mliesl.edu" class="flex-shrink-0">
        <img src="{{ asset('images/cos/mli-logo.png') }}" alt="Mentor Language Institute" class="h-10 sm:h-14 w-auto" />
      </a>

      {{-- Desktop: Right Side Actions --}}
      <div class="hidden md:flex items-center gap-2 flex-wrap justify-end">
        {{-- Language Dropdown --}}
        <div class="relative" id="lang-dropdown-wrapper">
          <button id="lang-btn" type="button" class="flex items-center gap-2 text-gray-700 px-3 py-2 text-sm hover:text-gold transition-colors border border-gray-200 rounded-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
            <span data-i18n="lang_label">Language</span>
            <svg id="lang-chevron" class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="lang-menu" class="hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
            <div class="py-2">
              <a href="?lang=en" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/us.png" width="20" height="15" alt="" class="rounded-sm" /><span>English</span><span class="text-gray-400 text-xs ml-auto">English</span>
              </a>
              <a href="?lang=tw" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/tw.png" width="20" height="15" alt="" class="rounded-sm" /><span>繁體中文</span><span class="text-gray-400 text-xs ml-auto">Chinese (Traditional)</span>
              </a>
              <a href="?lang=ch" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/cn.png" width="20" height="15" alt="" class="rounded-sm" /><span>简体中文</span><span class="text-gray-400 text-xs ml-auto">Chinese (Simplified)</span>
              </a>
              <a href="?lang=por" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/br.png" width="20" height="15" alt="" class="rounded-sm" /><span>Português</span><span class="text-gray-400 text-xs ml-auto">Portuguese</span>
              </a>
              <a href="?lang=sp" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/es.png" width="20" height="15" alt="" class="rounded-sm" /><span>Español</span><span class="text-gray-400 text-xs ml-auto">Spanish</span>
              </a>
              <a href="?lang=tr" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/tr.png" width="20" height="15" alt="" class="rounded-sm" /><span>Türkçe</span><span class="text-gray-400 text-xs ml-auto">Turkish</span>
              </a>
              <a href="?lang=ru" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/ru.png" width="20" height="15" alt="" class="rounded-sm" /><span>Русский</span><span class="text-gray-400 text-xs ml-auto">Russian</span>
              </a>
              <a href="?lang=ar" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/sa.png" width="20" height="15" alt="" class="rounded-sm" /><span>العربية</span><span class="text-gray-400 text-xs ml-auto">Arabic</span>
              </a>
              <a href="?lang=kr" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <img src="https://flagcdn.com/w20/kr.png" width="20" height="15" alt="" class="rounded-sm" /><span>한국어</span><span class="text-gray-400 text-xs ml-auto">Korean</span>
              </a>
            </div>
          </div>
        </div>
        <a href="tel:+13108870777" class="flex items-center gap-1.5 text-gray-700 px-3 py-2 text-sm hover:text-gold transition-colors">
          <span class="font-semibold">Westwood</span><span>(310) 887-0777</span>
        </a>
        <span class="text-gray-300">|</span>
        <a href="tel:+13238707102" class="flex items-center gap-1.5 text-gray-700 px-3 py-2 text-sm hover:text-gold transition-colors">
          <span class="font-semibold">Hollywood</span><span>(323) 870-7102</span>
        </a>
        <a href="https://mliesl.edu/admission/" target="_blank" rel="noopener noreferrer" data-i18n="btn_apply" class="bg-navy text-white px-5 py-2 rounded-md font-semibold text-sm hover:bg-navy-light transition-colors">
          Online Application
        </a>
        <a href="https://mliesl.edu/freetrial/" target="_blank" rel="noopener noreferrer" data-i18n="btn_trial" class="bg-gold text-navy px-5 py-2 rounded-md font-semibold text-sm hover:bg-gold-light transition-colors">
          Free Consultation
        </a>
      </div>

      {{-- Mobile: Hamburger --}}
      <button id="mobile-menu-btn" type="button" aria-label="Toggle menu" class="md:hidden flex flex-col justify-center items-center w-10 h-10 rounded-md text-navy hover:bg-gray-100 transition-colors">
        <span id="hb-top"    class="block w-5 h-0.5 bg-current rounded-full transition-all duration-200"></span>
        <span id="hb-mid"    class="block w-5 h-0.5 bg-current rounded-full my-1 transition-all duration-200"></span>
        <span id="hb-bottom" class="block w-5 h-0.5 bg-current rounded-full transition-all duration-200"></span>
      </button>
    </div>

    {{-- Desktop Nav Row --}}
    <nav class="hidden md:block border-t border-gray-200 bg-white">
      <div class="max-w-[1100px] mx-auto px-6">
        <ul class="flex flex-wrap justify-center gap-1 py-3">
          <li><a href="#process"   data-i18n="nav_how"       class="px-4 py-2 text-navy text-sm font-medium hover:text-gold transition-colors">How We Help</a></li>
          <li><a href="#faq"       data-i18n="nav_faq"       class="px-4 py-2 text-navy text-sm font-medium hover:text-gold transition-colors">Common Questions</a></li>
          <li><a href="#programs"  data-i18n="nav_programs"  class="px-4 py-2 text-navy text-sm font-medium hover:text-gold transition-colors">Our Programs</a></li>
          <li><a href="#locations" data-i18n="nav_locations" class="px-4 py-2 text-navy text-sm font-medium hover:text-gold transition-colors">Locations</a></li>
          <li><a href="#contact"   data-i18n="nav_contact"   class="px-4 py-2 text-navy text-sm font-medium hover:text-gold transition-colors">Contact</a></li>
        </ul>
      </div>
    </nav>

    {{-- Mobile Menu Overlay --}}
    <div id="mobile-overlay" class="md:hidden fixed inset-0 z-40 opacity-0 pointer-events-none transition-opacity duration-200">
      <div id="mobile-backdrop" class="absolute inset-0 bg-black/40"></div>
      <div id="mobile-panel" class="absolute top-0 right-0 h-full w-full max-w-[320px] bg-white shadow-xl flex flex-col translate-x-full transition-transform duration-200 ease-out">
        <div class="flex items-center justify-between px-4 py-4 border-b border-gray-200">
          <span data-i18n="mobile_menu" class="text-sm font-semibold text-navy">Menu</span>
          <button id="mobile-close-btn" type="button" aria-label="Close menu" class="p-2 rounded-md hover:bg-gray-100 text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 overflow-y-auto py-4 px-4">
          <ul class="space-y-1">
            <li><a href="#process"   data-i18n="nav_how"       class="mobile-nav-link block px-4 py-3 text-navy font-medium rounded-md hover:bg-gray-50 hover:text-gold transition-colors">How We Help</a></li>
            <li><a href="#faq"       data-i18n="nav_faq"       class="mobile-nav-link block px-4 py-3 text-navy font-medium rounded-md hover:bg-gray-50 hover:text-gold transition-colors">Common Questions</a></li>
            <li><a href="#programs"  data-i18n="nav_programs"  class="mobile-nav-link block px-4 py-3 text-navy font-medium rounded-md hover:bg-gray-50 hover:text-gold transition-colors">Our Programs</a></li>
            <li><a href="#locations" data-i18n="nav_locations" class="mobile-nav-link block px-4 py-3 text-navy font-medium rounded-md hover:bg-gray-50 hover:text-gold transition-colors">Locations</a></li>
            <li><a href="#contact"   data-i18n="nav_contact"   class="mobile-nav-link block px-4 py-3 text-navy font-medium rounded-md hover:bg-gray-50 hover:text-gold transition-colors">Contact</a></li>
          </ul>
          <div class="mt-6 pt-4 border-t border-gray-200 space-y-3">
            {{-- Mobile Language Dropdown --}}
            <div class="relative" id="mobile-lang-wrapper">
              <button id="mobile-lang-btn" type="button" class="w-full flex items-center justify-between gap-2 text-gray-700 px-4 py-3 text-sm hover:bg-gray-50 rounded-md border border-gray-200">
                <span class="flex items-center gap-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                  </svg>
                  <span data-i18n="lang_label">Language</span>
                </span>
                <svg id="mobile-lang-chevron" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div id="mobile-lang-menu" class="hidden mt-2 rounded-lg border border-gray-200 bg-gray-50 overflow-hidden">
                <a href="?lang=en" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/us.png" width="20" height="15" alt="" class="rounded-sm" /><span>English</span>
                </a>
                <a href="?lang=tw" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/tw.png" width="20" height="15" alt="" class="rounded-sm" /><span>繁體中文</span>
                </a>
                <a href="?lang=ch" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/cn.png" width="20" height="15" alt="" class="rounded-sm" /><span>简体中文</span>
                </a>
                <a href="?lang=por" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/br.png" width="20" height="15" alt="" class="rounded-sm" /><span>Português</span>
                </a>
                <a href="?lang=sp" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/es.png" width="20" height="15" alt="" class="rounded-sm" /><span>Español</span>
                </a>
                <a href="?lang=tr" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/tr.png" width="20" height="15" alt="" class="rounded-sm" /><span>Türkçe</span>
                </a>
                <a href="?lang=ru" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/ru.png" width="20" height="15" alt="" class="rounded-sm" /><span>Русский</span>
                </a>
                <a href="?lang=ar" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/sa.png" width="20" height="15" alt="" class="rounded-sm" /><span>العربية</span>
                </a>
                <a href="?lang=kr" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                  <img src="https://flagcdn.com/w20/kr.png" width="20" height="15" alt="" class="rounded-sm" /><span>한국어</span>
                </a>
              </div>
            </div>
            <a href="tel:+13108870777" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-md">
              <span class="font-semibold">Westwood</span> (310) 887-0777
            </a>
            <a href="tel:+13238707102" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-md">
              <span class="font-semibold">Hollywood</span> (323) 870-7102
            </a>
            <a href="https://mliesl.edu/admission/" target="_blank" rel="noopener noreferrer" data-i18n="btn_apply" class="mobile-nav-link block text-center bg-navy text-white px-4 py-3 rounded-md font-semibold text-sm hover:bg-navy-light transition-colors">
              Online Application
            </a>
            <a href="https://mliesl.edu/freetrial/" target="_blank" rel="noopener noreferrer" data-i18n="btn_trial" class="mobile-nav-link block text-center bg-gold text-navy px-4 py-3 rounded-md font-semibold text-sm hover:bg-gold-light transition-colors">
              Free Consultation
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  {{-- =========================================================
       HERO
  ========================================================= --}}
  <section class="relative min-h-[480px] sm:min-h-[580px] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-navy to-navy-light z-0"></div>
    <div class="absolute inset-0 bg-center bg-cover opacity-30 z-0" style="background-image: url('{{ asset('images/cos/Background.jpg') }}');"></div>
    <div class="relative z-10 max-w-[1100px] mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center py-12 sm:py-20">
      <div class="text-white">
        <div data-i18n="hero_badge" class="inline-block bg-white/15 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm mb-4 sm:mb-6 border border-white/20">
          English School in LA · Since 2002
        </div>
        <h1 data-i18n="hero_h1" class="font-serif text-3xl sm:text-4xl md:text-[2.8rem] font-bold mb-4 sm:mb-5 leading-tight">
          Already in L.A.?<br />
          <span class="text-gold">Turn Your Visit</span> into Real Fluency.
        </h1>
        <p data-i18n="hero_desc" class="text-lg opacity-90 mb-8 leading-relaxed">
          A short trip won't make you fluent. But a few months of real study can change everything. We help you stay and learn.
        </p>
        <div class="flex flex-col gap-3 mb-8">
          <div class="flex items-center gap-3 text-base">
            <div class="w-6 h-6 bg-gold rounded-full flex items-center justify-center text-navy text-xs font-bold">✓</div>
            <span data-i18n="hero_b1">Study 2, 3, or 4 days a week</span>
          </div>
          <div class="flex items-center gap-3 text-base">
            <div class="w-6 h-6 bg-gold rounded-full flex items-center justify-center text-navy text-xs font-bold">✓</div>
            <span data-i18n="hero_b2">Change of Status (COS) support</span>
          </div>
          <div class="flex items-center gap-3 text-base">
            <div class="w-6 h-6 bg-gold rounded-full flex items-center justify-center text-navy text-xs font-bold">✓</div>
            <span data-i18n="hero_b3">Westwood &amp; Hollywood campuses</span>
          </div>
        </div>
        <a href="https://mliesl.edu/freetrial/" target="_blank" rel="noopener noreferrer" data-i18n="hero_cta" class="inline-block bg-gold text-navy px-8 py-4 rounded-lg font-bold text-base transition-all hover:bg-gold-light hover:-translate-y-0.5 hover:shadow-lg">
          Get Free Consultation →
        </a>
      </div>
      <div class="hidden md:block">
        <img src="{{ asset('images/cos/hero.jpg') }}" alt="Students enjoying LA life" class="rounded-2xl w-full h-[400px] object-cover shadow-2xl" />
      </div>
    </div>
  </section>

  {{-- =========================================================
       REVIEWS
  ========================================================= --}}
  <section class="py-16 bg-white border-b border-gray-200">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-10">
        <div class="inline-flex items-center gap-4 bg-white px-7 py-4 rounded-xl shadow-lg shadow-black/5 mb-4 border border-gray-100">
          <div class="text-2xl font-bold flex">
            <span style="color:#4285f4">G</span><span style="color:#ea4335">o</span><span style="color:#fbbc05">o</span><span style="color:#4285f4">g</span><span style="color:#34a853">l</span><span style="color:#ea4335">e</span>
          </div>
          <div class="flex flex-col items-start">
            <div class="text-xl tracking-widest" style="color:#fbbc05">★★★★★</div>
            <div data-i18n="rating_main" class="text-sm text-gray-600 mt-1"><span class="font-bold text-gray-800">4.9</span> · #1 Rated in LA as of July 2025</div>
          </div>
        </div>
        <p data-i18n="rating_sub" class="text-gray-600 text-base">See what our students say</p>
      </div>
      <div class="flex md:grid md:grid-cols-3 gap-6 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0">
        <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-100 p-7 rounded-xl">
          <div class="text-base mb-3" style="color:#fbbc05">★★★★★</div>
          <p data-i18n="review1" class="text-[0.95rem] text-gray-800 mb-4 leading-relaxed">"I think MLI is a great place to study in Los Angeles. It's the best because of the teachers. My TOEFL teacher has so much energy and really motivates the students. Everyone at MLI is super friendly and it's a fun school too."</p>
          <div data-i18n="review1_by" class="text-sm text-gray-600"><strong class="text-navy">Maria</strong> · Colombia</div>
        </div>
        <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-100 p-7 rounded-xl">
          <div class="text-base mb-3" style="color:#fbbc05">★★★★★</div>
          <p data-i18n="review2" class="text-[0.95rem] text-gray-800 mb-4 leading-relaxed">"I started in the Beginner 1 class. I didn't know basic grammar like 'am', 'is', 'are'. When I talk to my friends now, they say 'your English is so much better!' I feel it too. Now I can understand English and speak a little bit."</p>
          <div data-i18n="review2_by" class="text-sm text-gray-600"><strong class="text-navy">Kaito</strong> · Japan</div>
        </div>
        <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-100 p-7 rounded-xl">
          <div class="text-base mb-3" style="color:#fbbc05">★★★★★</div>
          <p data-i18n="review3" class="text-[0.95rem] text-gray-800 mb-4 leading-relaxed">"I really recommend studying English at Mentor Language Institute. The school staff are such good managers and are the best part of the school. They are so nice and helpful always for all the students."</p>
          <div data-i18n="review3_by" class="text-sm text-gray-600"><strong class="text-navy">Mohammed</strong> · Saudi Arabia</div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       SOLUTION
  ========================================================= --}}
  <section class="py-20">
    <div class="max-w-[1100px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
      <div>
        <div data-i18n="sol_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">How We Help</div>
        <h2 data-i18n="sol_h2" class="font-serif text-[2rem] text-navy mb-5">Stay Longer.<br />Learn More.</h2>
        <p data-i18n="sol_desc" class="text-gray-600 mb-6 text-[1.05rem] leading-loose">
          MLI is more than an English school. We help make long-term study possible. Change of Status (COS) support, flexible classes, fair prices.
        </p>
        <ul class="mb-8 space-y-3">
          <li class="flex items-start gap-3 text-base leading-relaxed">
            <span class="text-success font-bold text-lg">✓</span>
            <span data-i18n="sol_b1">We issue I-20s for Change of Status (COS) to F-1</span>
          </li>
          <li class="flex items-start gap-3 text-base leading-relaxed">
            <span class="text-success font-bold text-lg">✓</span>
            <span data-i18n="sol_b2">One price includes lawyer fee + USCIS fee + $600 tuition credit</span>
          </li>
          <li class="flex items-start gap-3 text-base leading-relaxed">
            <span class="text-success font-bold text-lg">✓</span>
            <span data-i18n="sol_b3">Staff speaks Spanish, Portuguese, Turkish, Russian, and French</span>
          </li>
        </ul>
      </div>
      <div class="relative">
        <div class="rounded-2xl overflow-hidden h-[350px] shadow-xl border-4 border-white relative z-0">
          <img src="{{ asset('images/cos/Patric.jpg') }}" alt="Patrick Riley, Academic Director" class="w-full h-full object-cover object-center" />
        </div>
        <div class="bg-white p-6 rounded-xl shadow-xl shadow-black/10 md:absolute md:-bottom-8 md:-left-5 md:-right-10 mt-6 md:mt-0 relative z-10">
          <p data-i18n="patrick_q" class="text-[0.95rem] italic text-gray-800 mb-3 leading-relaxed">
            "When students come for a week or two, they have a good time. But when they come for longer, they really start to learn English -- and it's always amazing to see them make progress and help them along the way. Stop by and talk to us!"
          </p>
          <div data-i18n="patrick_name" class="text-sm text-navy font-bold">— Patrick Riley, Academic Director</div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       COMPARISON
  ========================================================= --}}
  <section class="py-20 bg-cream">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-12">
        <div data-i18n="cmp_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Compare Your Options</div>
        <h2 data-i18n="cmp_h2" class="font-serif text-[2rem] text-navy">Why Choose MLI?</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-[950px] mx-auto">
        {{-- DIY --}}
        <div class="bg-white rounded-2xl p-8 px-6 text-center shadow-lg shadow-black/5">
          <h3 data-i18n="diy_title" class="text-sm mb-2 opacity-80 tracking-wide uppercase">DO IT YOURSELF</h3>
          <div class="font-serif text-[2.5rem] font-bold mb-6">$420+</div>
          <ul class="text-left space-y-3 text-sm">
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="diy_b1">Process is complicated</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="diy_b2">Prepare &amp; submit alone</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="diy_b3">Higher risk of Request for Evidence (RFE)</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="diy_b4">Takes a lot of time</span></li>
            <li class="flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="diy_b5">No expert help</span></li>
          </ul>
        </div>
        {{-- MLI + Lawyer (featured) --}}
        <div class="bg-navy text-white rounded-2xl p-8 px-6 text-center shadow-xl md:scale-105 transform order-first md:order-none z-10">
          <h3 data-i18n="mli_title" class="text-sm mb-2 opacity-80 tracking-wide uppercase text-gold">MLI + LAWYER</h3>
          <div class="font-serif text-[2.5rem] font-bold mb-6 text-gold">$1,885*</div>
          <ul class="text-left space-y-3 text-sm">
            <li class="pb-3 border-b border-white/15 flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b1">Attorney fee included</span></li>
            <li class="pb-3 border-b border-white/15 flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b2">Filing fee ($420) included</span></li>
            <li class="pb-3 border-b border-white/15 flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b3">Lawyer is COS expert</span></li>
            <li class="pb-3 border-b border-white/15 flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b4">If COS denied: free reapplication prep — you only pay filing fee</span></li>
            <li class="pb-3 border-b border-white/15 flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b5">We support you fully</span></li>
            <li class="flex items-start gap-2.5"><span class="text-gold font-bold">✓</span> <span data-i18n="mli_b6">$600 tuition credit on approval</span></li>
          </ul>
        </div>
        {{-- Other Lawyers --}}
        <div class="bg-white rounded-2xl p-8 px-6 text-center shadow-lg shadow-black/5">
          <h3 data-i18n="other_title" class="text-sm mb-2 opacity-80 tracking-wide uppercase">OTHER LAWYERS</h3>
          <div class="font-serif text-[2.5rem] font-bold mb-6">$3,000+</div>
          <ul class="text-left space-y-3 text-sm">
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="other_b1">Hourly billing</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="other_b2">Filing fee not included</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="other_b3">Handle many case types</span></li>
            <li class="pb-3 border-b border-gray-200 flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="other_b4">Hard to contact</span></li>
            <li class="flex items-start gap-2.5"><span class="text-danger font-bold">✕</span> <span data-i18n="other_b5">No school benefits</span></li>
          </ul>
        </div>
      </div>
      <p data-i18n="cmp_note" class="text-center text-sm text-gray-600 mt-8">*MLI Registration Fee + SEVIS fee is required. Approval is not guaranteed.</p>
    </div>
  </section>

  {{-- =========================================================
       PROCESS
  ========================================================= --}}
  <section id="process" class="py-20 bg-navy text-white scroll-mt-32">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-16">
        <div data-i18n="proc_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Easy Process</div>
        <h2 data-i18n="proc_h2" class="font-serif text-[2rem] text-white">How It Works</h2>
        <div class="inline-flex items-center gap-4 mt-6 bg-white/10 px-8 py-4 rounded-full flex-col md:flex-row">
          <span class="bg-gold text-navy px-5 py-2 rounded-md font-bold text-base">B1/B2 VISA</span>
          <span class="text-2xl rotate-90 md:rotate-0">→</span>
          <span class="bg-white text-navy px-5 py-2 rounded-md font-bold text-base">F1 VISA</span>
        </div>
      </div>
      <div class="relative grid grid-cols-2 md:grid-cols-6 gap-y-10 gap-x-5">
        <div class="hidden md:block absolute top-10 left-[8%] right-[8%] h-[3px] bg-gradient-to-r from-gold to-white/30 z-0"></div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">1</div>
          <h4 data-i18n="s1_title" class="text-[0.9rem] mb-2 font-bold">Enroll at MLI</h4>
          <p data-i18n="s1_desc" class="text-xs opacity-80 leading-snug px-1"><a href="https://mliesl.edu/admission" target="_blank" rel="noopener noreferrer" class="underline hover:text-gold transition-colors">Online Application</a></p>
        </div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">2</div>
          <h4 data-i18n="s2_title" class="text-[0.9rem] mb-2 font-bold">Pay Fees</h4>
          <p data-i18n="s2_desc" class="text-xs opacity-80 leading-snug px-1">Registration + SEVIS fee + COS fee</p>
        </div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">3</div>
          <h4 data-i18n="s3_title" class="text-[0.9rem] mb-2 font-bold">Gather Documents</h4>
          <p data-i18n="s3_desc" class="text-xs opacity-80 leading-snug px-1">Request your I-20. Passport, current visa, I-94, financial proof</p>
        </div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">4</div>
          <h4 data-i18n="s4_title" class="text-[0.9rem] mb-2 font-bold">Prepare with Lawyer</h4>
          <p data-i18n="s4_desc" class="text-xs opacity-80 leading-snug px-1">Our lawyer prepares your application</p>
        </div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">5</div>
          <h4 data-i18n="s5_title" class="text-[0.9rem] mb-2 font-bold">Submit to USCIS</h4>
          <p data-i18n="s5_desc" class="text-xs opacity-80 leading-snug px-1">We submit your case for you</p>
        </div>
        <div class="text-center relative z-10">
          <div class="w-20 h-20 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-2xl font-bold mx-auto mb-5 shadow-lg">6</div>
          <h4 data-i18n="s6_title" class="text-[0.9rem] mb-2 font-bold">Get Response</h4>
          <p data-i18n="s6_desc" class="text-xs opacity-80 leading-snug px-1">Current processing times vary (average 3-6 months)</p>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       FAQ
  ========================================================= --}}
  <section id="faq" class="py-20 bg-white scroll-mt-32">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-12">
        <div data-i18n="faq_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Common Questions</div>
        <h2 data-i18n="faq_h2" class="font-serif text-[2rem] text-navy">You Might Be Wondering...</h2>
      </div>
      <div class="flex flex-col gap-4 max-w-[700px] mx-auto" id="faq-list">

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq1_q" class="text-base text-navy font-bold leading-snug">How long does it take?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq1_a" class="text-[0.9rem] text-gray-600 leading-relaxed">Typically 3–6 months. You can stay legally while you wait.</p>
          </div>
        </div>

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq2_q" class="text-base text-navy font-bold leading-snug">When is the best time to apply for a Change of Status (COS) to F-1?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq2_a" class="text-[0.9rem] text-gray-600 leading-relaxed">
              A Change of Status (COS) application should generally be filed while the applicant is still maintaining valid nonimmigrant status in the United States. USCIS requires that Form I-539 be submitted before the applicant's current status expires. The appropriate timing depends on your visa category, expiration date, and program start date. Consult with our Immigration Attorney before filing.
            </p>
          </div>
        </div>

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq3_q" class="text-base text-navy font-bold leading-snug">How far in advance should I begin preparing my Change of Status (COS) application before my current status expires?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq3_a" class="text-[0.9rem] text-gray-600 leading-relaxed">
              Start well in advance of your status expiration. Document preparation, school processing, and USCIS processing all take time. The timeline depends on your visa and expiration date. Consult our Immigration Attorney as early as possible.
            </p>
          </div>
        </div>

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq4_q" class="text-base text-navy font-bold leading-snug">Do you have multilingual staff?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq4_a" class="text-[0.9rem] text-gray-600 leading-relaxed">Yes! We speak Spanish, Portuguese, Turkish, Russian, and French.</p>
          </div>
        </div>

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq5_q" class="text-base text-navy font-bold leading-snug">Can I apply for change of status from a visa other than B1 or B2?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq5_a" class="text-[0.9rem] text-gray-600 leading-relaxed">
              Yes, in some cases. Eligibility depends on your current visa and immigration history. J-1/J-2 holders subject to the 2-year home residency requirement are generally ineligible without a waiver. We strongly recommend consulting with our immigration attorney.
            </p>
          </div>
        </div>

        <div class="faq-item bg-gray-100 rounded-xl overflow-hidden">
          <button type="button" class="faq-btn w-full p-7 text-left flex items-start justify-between gap-4 hover:bg-gray-200/50 transition-colors">
            <h4 data-i18n="faq6_q" class="text-base text-navy font-bold leading-snug">Can I travel overseas with my change of status approval?</h4>
            <span class="faq-chevron shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-navy text-sm font-bold transition-transform">▼</span>
          </button>
          <div class="faq-answer hidden px-7 pb-7 pt-0">
            <p data-i18n="faq6_a" class="text-[0.9rem] text-gray-600 leading-relaxed">
              If you leave the U.S. after COS approval, you must apply for an F-1 visa at a U.S. embassy abroad before returning. A COS approval changes status but does not issue a visa. Consult our DSO before making travel plans.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- =========================================================
       PROGRAMS
  ========================================================= --}}
  <section id="programs" class="py-20 bg-gray-100 scroll-mt-32">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-12">
        <div data-i18n="prog_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Our Programs</div>
        <h2 data-i18n="prog_h2" class="font-serif text-[2rem] text-navy">Choose What Fits Your Life</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-black/5 flex flex-col h-full">
          <div class="h-[200px] bg-gray-200 relative">
            <img src="{{ asset('images/cos/ESL-and-TOEFL.jpg') }}" alt="ESL and TOEFL class" class="w-full h-full object-cover" />
          </div>
          <div class="p-7 flex-1 flex flex-col">
            <h3 data-i18n="p1_title" class="font-serif text-[1.3rem] text-navy mb-2.5">Morning</h3>
            <div class="flex flex-wrap gap-2 mb-3">
              <span data-i18n="p1_t1" class="inline-flex items-center rounded-full bg-gold/10 text-navy text-xs font-medium px-2.5 py-1">4 days/week</span>
              <span data-i18n="p1_t2" class="inline-flex items-center rounded-full bg-gold/10 text-navy text-xs font-medium px-2.5 py-1">Group Lessons</span>
            </div>
            <ul class="space-y-1.5 text-[0.9rem] text-gray-700">
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p1_i1">ESL (Beginner to Advanced)</span></li>
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p1_i2">TOEFL</span></li>
            </ul>
          </div>
        </div>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-black/5 flex flex-col h-full">
          <div class="h-[200px] bg-gray-200 relative">
            <img src="{{ asset('images/cos/Conversation.jpg') }}" alt="Conversation and Business class" class="w-full h-full object-cover" />
          </div>
          <div class="p-7 flex-1 flex flex-col">
            <h3 data-i18n="p2_title" class="font-serif text-[1.3rem] text-navy mb-2.5">Afternoon/Evening</h3>
            <div class="flex flex-wrap gap-2 mb-3">
              <span data-i18n="p2_t1" class="inline-flex items-center rounded-full bg-gold/10 text-navy text-xs font-medium px-2.5 py-1">2, 3 or 4 days/week</span>
              <span data-i18n="p2_t2" class="inline-flex items-center rounded-full bg-gold/10 text-navy text-xs font-medium px-2.5 py-1">Group Lessons</span>
            </div>
            <ul class="space-y-1.5 text-[0.9rem] text-gray-700">
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p2_i1">Conversation</span></li>
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p2_i2">Business + TOEIC</span></li>
            </ul>
          </div>
        </div>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-black/5 flex flex-col h-full">
          <div class="h-[200px] bg-gray-200 relative">
            <img src="{{ asset('images/cos/Private-lesson.jpg') }}" alt="Private one on one tutoring" class="w-full h-full object-cover" />
          </div>
          <div class="p-7 flex-1 flex flex-col">
            <h3 data-i18n="p3_title" class="font-serif text-[1.3rem] text-navy mb-2.5">Private Lessons</h3>
            <div class="flex flex-wrap gap-2 mb-3">
              <span data-i18n="p3_t1" class="inline-flex items-center rounded-full bg-gold/10 text-navy text-xs font-medium px-2.5 py-1">Flexible timing</span>
            </div>
            <ul class="space-y-2 text-[0.9rem] text-gray-700">
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p3_i1">Lessons customized for you</span></li>
              <li class="flex items-center gap-2"><span class="text-success">✓</span> <span data-i18n="p3_i2">From $56/hour</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       TESTIMONIAL
  ========================================================= --}}
  <section class="py-20 bg-white">
    <div class="max-w-[800px] mx-auto text-center px-6">
      <div data-i18n="tsm_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Student Story</div>
      <div class="font-serif text-2xl text-navy leading-relaxed mb-8 relative">
        <span class="absolute -top-5 -left-8 text-[4rem] text-gold opacity-30 select-none">"</span>
        <span class="absolute -bottom-2 -right-8 text-[4rem] text-gold opacity-30 select-none">"</span>
        <span data-i18n="tsm_q">After a few months, things changed, I started speaking more, I gained confidence, and I realized I could do things on my own outside.</span>
      </div>
      <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('images/cos/student testimonial.jpeg') }}" alt="Merve from Türkiye" class="w-[60px] h-[60px] rounded-full object-cover" />
        <div class="text-left">
          <div data-i18n="tsm_name" class="font-semibold text-navy">Merve</div>
          <div data-i18n="tsm_country" class="text-[0.85rem] text-gray-600">Türkiye</div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       LOCATIONS
  ========================================================= --}}
  <section id="locations" class="py-20 bg-gray-100 scroll-mt-32">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="text-center mb-12">
        <div data-i18n="loc_label" class="uppercase text-xs font-bold tracking-widest text-gold mb-3">Two Campuses</div>
        <h2 data-i18n="loc_h2" class="font-serif text-[2rem] text-navy">Great Locations in L.A.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-black/5 flex flex-col">
          <div class="h-[250px] bg-gray-200 relative group overflow-hidden">
            <img src="{{ asset('images/cos/WW_building.png') }}" alt="Westwood Campus" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
            <div class="absolute inset-0 bg-navy/10 group-hover:bg-transparent transition-colors duration-300"></div>
          </div>
          <div class="p-7 flex-1 flex flex-col">
            <h3 class="text-[1.3rem] text-navy mb-3 font-bold font-serif">Westwood</h3>
            <p data-i18n="ww_desc" class="text-[0.95rem] text-gray-600 mb-6 leading-relaxed flex-1">
              Near UCLA. 10 min to Beverly Hills. 15 min to Santa Monica. Safe, academic environment near Hammer Museum, cafes, and restaurants.
            </p>
            <div class="flex flex-col gap-3 mt-auto">
              <a href="tel:+13108870777" class="flex items-center gap-2 text-navy font-bold text-lg hover:text-gold transition-colors">📞 (310) 887-0777</a>
              <a href="https://www.google.com/maps/search/?api=1&query=Mentor+Language+Institute+Westwood" target="_blank" rel="noopener noreferrer" data-i18n="ww_map" class="inline-flex items-center justify-center gap-2 border-2 border-navy text-navy px-4 py-3 rounded-lg font-bold text-sm hover:bg-navy hover:text-white transition-all hover:-translate-y-0.5">
                📍 See on Google Map
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-black/5 flex flex-col">
          <div class="h-[250px] bg-gray-200 relative group overflow-hidden">
            <img src="{{ asset('images/cos/HW_building.png') }}" alt="Hollywood Campus" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
            <div class="absolute inset-0 bg-navy/10 group-hover:bg-transparent transition-colors duration-300"></div>
          </div>
          <div class="p-7 flex-1 flex flex-col">
            <h3 class="text-[1.3rem] text-navy mb-3 font-bold font-serif">Hollywood</h3>
            <p data-i18n="hw_desc" class="text-[0.95rem] text-gray-600 mb-6 leading-relaxed flex-1">
              Directly on the Walk of Fame. Near Chinese Theater. Restaurants, shops, and entertainment everywhere.
            </p>
            <div class="flex flex-col gap-3 mt-auto">
              <a href="tel:+13238707102" class="flex items-center gap-2 text-navy font-bold text-lg hover:text-gold transition-colors">📞 (323) 870-7102</a>
              <a href="https://www.google.com/maps/search/?api=1&query=Mentor+Language+Institute+Hollywood" target="_blank" rel="noopener noreferrer" data-i18n="hw_map" class="inline-flex items-center justify-center gap-2 border-2 border-navy text-navy px-4 py-3 rounded-lg font-bold text-sm hover:bg-navy hover:text-white transition-all hover:-translate-y-0.5">
                📍 See on Google Map
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- =========================================================
       CTA
  ========================================================= --}}
  <section id="contact" class="py-20 bg-gradient-to-br from-navy to-navy-light scroll-mt-32">
    <div class="max-w-[1100px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
      <div class="text-white">
        <h2 data-i18n="cta_h2" class="font-serif text-[2rem] mb-5">Let's Talk About Your Options</h2>
        <p data-i18n="cta_desc" class="opacity-90 mb-6 text-[1.05rem] leading-relaxed">
          Not sure yet? That's okay. Get a free consultation. No pressure. We answer your questions and explain your options.
        </p>
        <ul class="space-y-2 mb-8">
          <li class="flex items-center gap-3 py-1"><span class="text-gold font-bold">✓</span> <span data-i18n="cta_b1">Free 30-minute talk</span></li>
          <li class="flex items-center gap-3 py-1"><span class="text-gold font-bold">✓</span> <span data-i18n="cta_b2">Check if you can apply for Change of Status (COS)</span></li>
          <li class="flex items-center gap-3 py-1"><span class="text-gold font-bold">✓</span> <span data-i18n="cta_b3">Find the right program for you</span></li>
          <li class="flex items-center gap-3 py-1"><span class="text-gold font-bold">✓</span> <span data-i18n="cta_b4">Tour our campus (in person or online)</span></li>
        </ul>
        <div class="mt-8">
          <p data-i18n="cta_lang" class="text-[0.95rem] mb-3 opacity-90">We speak your language:</p>
          <div class="flex gap-2 flex-wrap">
            <img src="https://flagcdn.com/w20/es.png" width="20" height="15" alt="Spanish" title="Spanish" class="rounded-sm hover:scale-110 transition-transform cursor-default" />
            <img src="https://flagcdn.com/w20/br.png" width="20" height="15" alt="Portuguese" title="Portuguese" class="rounded-sm hover:scale-110 transition-transform cursor-default" />
            <img src="https://flagcdn.com/w20/tr.png" width="20" height="15" alt="Turkish" title="Turkish" class="rounded-sm hover:scale-110 transition-transform cursor-default" />
            <img src="https://flagcdn.com/w20/ru.png" width="20" height="15" alt="Russian" title="Russian" class="rounded-sm hover:scale-110 transition-transform cursor-default" />
            <img src="https://flagcdn.com/w20/fr.png" width="20" height="15" alt="French" title="French" class="rounded-sm hover:scale-110 transition-transform cursor-default" />
          </div>
        </div>
      </div>
      <div class="flex flex-col gap-4">
        <a href="https://mliesl.edu/admission/" target="_blank" rel="noopener noreferrer" data-i18n="cta_apply" class="block text-center bg-gold text-navy px-8 py-5 rounded-xl font-bold text-lg hover:bg-gold-light transition-all hover:-translate-y-0.5 shadow-lg">
          Online Application →
        </a>
        <a href="https://mliesl.edu/freetrial/" target="_blank" rel="noopener noreferrer" data-i18n="cta_trial" class="block text-center bg-white/10 text-white border-2 border-white/40 px-8 py-5 rounded-xl font-bold text-lg hover:bg-white/20 transition-all hover:-translate-y-0.5">
          Free Consultation →
        </a>
      </div>
    </div>
  </section>

  {{-- =========================================================
       FOOTER
  ========================================================= --}}
  <footer class="bg-gray-800 text-white py-10 text-center">
    <div class="max-w-[1100px] mx-auto px-6">
      <div class="mb-5 text-[0.9rem] opacity-80 flex flex-col md:block gap-2">
        <a href="tel:+13108870777" data-i18n="footer_ww" class="md:mx-5 hover:text-gold transition-colors">📍 Westwood: (310) 887-0777</a>
        <a href="tel:+13238707102" data-i18n="footer_hw" class="md:mx-5 hover:text-gold transition-colors">📍 Hollywood: (323) 870-7102</a>
      </div>
      <p data-i18n="footer_copy" class="opacity-70 text-[0.9rem]">© 2026 Mentor Language Institute</p>
    </div>
  </footer>

  {{-- =========================================================
       JAVASCRIPT
  ========================================================= --}}
  <script>
    // --- Translation (i18n) ---
    var LANG_PARAM = new URLSearchParams(window.location.search).get('lang') || 'en';
    var RTL_LANGS = ['ar'];

    function applyTranslations(dict) {
      document.querySelectorAll('[data-i18n]').forEach(function(el) {
        var key = el.getAttribute('data-i18n');
        if (dict[key] != null) el.innerHTML = dict[key];
      });
    }

    // --- UTM Passthrough (carry ad attribution to Apply / Free Trial CTAs) ---
    var CTA_HOST_PATHS = ['https://mliesl.edu/admission', 'https://mliesl.edu/freetrial'];

    function getUtmParams() {
      var params = {};
      var regex = /[?&](utm_[a-zA-Z0-9_]+)=([^&\/?#]+)/g;
      var match;
      while ((match = regex.exec(window.location.href)) !== null) {
        var value = match[2];
        try {
          value = decodeURIComponent(value);
        } catch (e) {
          // leave value un-decoded if it contains an invalid % sequence
        }
        params[match[1]] = value;
      }
      return params;
    }

    var CTA_SELECTOR = CTA_HOST_PATHS.map(function(prefix) { return 'a[href^="' + prefix + '"]'; }).join(', ');
    var LANG_SWITCH_SELECTOR = 'a[href^="?lang="]';

    function withUtmParams(href, utmParams) {
      var url = new URL(href, window.location.href);
      Object.keys(utmParams).forEach(function(key) {
        url.searchParams.set(key, utmParams[key]);
      });
      return url.toString();
    }

    function applyUtmToLinks(selector, utmParams) {
      if (Object.keys(utmParams).length === 0) return;
      document.querySelectorAll(selector).forEach(function(link) {
        link.href = withUtmParams(link.getAttribute('href'), utmParams);
      });
    }

    function applyUtmEverywhere(utmParams) {
      // CTAs (Apply / Free Trial) and the language switcher both need the
      // visitor's UTM params carried forward, since switching language is a
      // full page reload that would otherwise drop them.
      applyUtmToLinks(CTA_SELECTOR, utmParams);
      applyUtmToLinks(LANG_SWITCH_SELECTOR, utmParams);
    }

    var UTM_PARAMS = getUtmParams();
    applyUtmEverywhere(UTM_PARAMS);

    fetch('{{ asset('lang/cos.json') }}')
      .then(function(r) { return r.json(); })
      .then(function(data) {
        var dict = data[LANG_PARAM] || data['en'];
        applyTranslations(dict);
        document.documentElement.lang = LANG_PARAM;
        if (RTL_LANGS.indexOf(LANG_PARAM) !== -1) {
          document.documentElement.dir = 'rtl';
        }
        applyUtmEverywhere(UTM_PARAMS);
      })
      .catch(function(err) { console.error('Failed to load translations:', err); });

    // --- Mobile Menu ---
    var menuBtn    = document.getElementById('mobile-menu-btn');
    var closeBtn   = document.getElementById('mobile-close-btn');
    var overlay    = document.getElementById('mobile-overlay');
    var panel      = document.getElementById('mobile-panel');
    var backdrop   = document.getElementById('mobile-backdrop');
    var hbTop      = document.getElementById('hb-top');
    var hbMid      = document.getElementById('hb-mid');
    var hbBottom   = document.getElementById('hb-bottom');
    var mobileLinks = document.querySelectorAll('.mobile-nav-link');

    function openMenu() {
      overlay.classList.remove('opacity-0', 'pointer-events-none');
      overlay.classList.add('opacity-100');
      panel.classList.remove('translate-x-full');
      panel.classList.add('translate-x-0');
      document.body.style.overflow = 'hidden';
      hbTop.classList.add('rotate-45', 'translate-y-1');
      hbMid.classList.add('opacity-0');
      hbBottom.classList.add('-rotate-45', '-translate-y-1.5');
    }

    function closeMenu() {
      overlay.classList.add('opacity-0', 'pointer-events-none');
      overlay.classList.remove('opacity-100');
      panel.classList.add('translate-x-full');
      panel.classList.remove('translate-x-0');
      document.body.style.overflow = '';
      hbTop.classList.remove('rotate-45', 'translate-y-1');
      hbMid.classList.remove('opacity-0');
      hbBottom.classList.remove('-rotate-45', '-translate-y-1.5');
    }

    menuBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    backdrop.addEventListener('click', closeMenu);
    mobileLinks.forEach(function(link) { link.addEventListener('click', closeMenu); });

    // --- Language Dropdown ---
    var langBtn     = document.getElementById('lang-btn');
    var langMenu    = document.getElementById('lang-menu');
    var langChevron = document.getElementById('lang-chevron');
    var langWrapper = document.getElementById('lang-dropdown-wrapper');

    langBtn.addEventListener('click', function() {
      var isOpen = !langMenu.classList.contains('hidden');
      if (isOpen) {
        langMenu.classList.add('hidden');
        langChevron.classList.remove('rotate-180');
      } else {
        langMenu.classList.remove('hidden');
        langChevron.classList.add('rotate-180');
      }
    });

    document.addEventListener('mousedown', function(e) {
      if (!langWrapper.contains(e.target)) {
        langMenu.classList.add('hidden');
        langChevron.classList.remove('rotate-180');
      }
    });

    // --- Mobile Language Dropdown ---
    var mobileLangBtn     = document.getElementById('mobile-lang-btn');
    var mobileLangMenu    = document.getElementById('mobile-lang-menu');
    var mobileLangChevron = document.getElementById('mobile-lang-chevron');

    mobileLangBtn.addEventListener('click', function() {
      var isOpen = !mobileLangMenu.classList.contains('hidden');
      if (isOpen) {
        mobileLangMenu.classList.add('hidden');
        mobileLangChevron.classList.remove('rotate-180');
      } else {
        mobileLangMenu.classList.remove('hidden');
        mobileLangChevron.classList.add('rotate-180');
      }
    });

    // --- FAQ Accordion ---
    var faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function(item) {
      var btn     = item.querySelector('.faq-btn');
      var answer  = item.querySelector('.faq-answer');
      var chevron = item.querySelector('.faq-chevron');

      btn.addEventListener('click', function() {
        var isOpen = !answer.classList.contains('hidden');
        if (isOpen) {
          answer.classList.add('hidden');
          chevron.classList.remove('rotate-180');
        } else {
          answer.classList.remove('hidden');
          chevron.classList.add('rotate-180');
        }
      });
    });
  </script>

</body>
</html>
