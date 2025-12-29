(function () {
  const yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = String(new Date().getFullYear());

  const openWhatsApp = (phone) => {
    if (!phone) return;
    const message = encodeURIComponent(
      "Merhaba, hizmetleriniz hakkında bilgi almak istiyorum."
    );
    const url = `https://wa.me/${phone}?text=${message}`;
    window.open(url, "_blank", "noopener");
  };

  const whatsappButtons = [
    document.getElementById("cta-whatsapp"),
    document.getElementById("contact-whatsapp"),
  ]
    .filter(Boolean)
    .concat(Array.from(document.querySelectorAll(".whatsapp-link")));

  whatsappButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const phone = this.getAttribute("data-phone");
      openWhatsApp(phone);
    });
  });

  // Mobile nav toggle
  const toggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".nav");
  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      const isVisible = getComputedStyle(nav).display !== "none";
      nav.style.display = isVisible ? "none" : "flex";
    });
  }

  // Active nav link on scroll + to-top button + header style
  const sections = Array.from(document.querySelectorAll("main section[id]"));
  const links = Array.from(document.querySelectorAll('.nav a[href^="#"]'));
  const toTop = document.getElementById("to-top");
  const header = document.querySelector(".site-header");
  const setActiveLink = () => {
    const scrollPos = window.scrollY + 120;
    let currentId = null;
    for (const s of sections) {
      if (s.offsetTop <= scrollPos) currentId = s.id;
    }
    links.forEach((a) =>
      a.classList.toggle("active", a.getAttribute("href") === `#${currentId}`)
    );
  };

  const topBar = document.querySelector(".top-bar");
  let lastScrollY = window.scrollY;
  let scrollDirection = 'down';
  
  const handleScrollUi = () => {
    setActiveLink();
    if (toTop) toTop.classList.toggle("show", window.scrollY > 400);
    if (header) header.classList.toggle("scrolled", window.scrollY > 10);
    if (topBar) topBar.classList.toggle("scrolled", window.scrollY > 10);
    
    // Topbar hide/show logic (Croffle style)
    const currentScrollY = window.scrollY;
    
    if (currentScrollY > lastScrollY && currentScrollY > 100) {
      // Scrolling down - hide topbar
      scrollDirection = 'down';
      if (topBar) {
        topBar.classList.add("hidden");
        document.body.classList.add("topbar-hidden");
        if (header) header.classList.add("topbar-hidden");
      }
    } else if (currentScrollY < lastScrollY) {
      // Scrolling up - show topbar
      scrollDirection = 'up';
      if (topBar) {
        topBar.classList.remove("hidden");
        document.body.classList.remove("topbar-hidden");
        if (header) header.classList.remove("topbar-hidden");
      }
    }
    
    lastScrollY = currentScrollY;
  };

  window.addEventListener("scroll", handleScrollUi);
  if (toTop)
    toTop.addEventListener("click", () =>
      window.scrollTo({ top: 0, behavior: "smooth" })
    );
  handleScrollUi();

  // Theme toggle with localStorage
  const themeToggle = document.querySelector(".theme-toggle");
  const applyTheme = (t) =>
    document.documentElement.setAttribute("data-theme", t);
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) applyTheme(savedTheme);
  if (themeToggle) {
    themeToggle.addEventListener("click", () => {
      const current =
        document.documentElement.getAttribute("data-theme") === "light"
          ? "dark"
          : "light";
      const next = current || "dark";
      applyTheme(next);
      localStorage.setItem("theme", next);
    });
  }

  // Reveal on scroll with stagger effect
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((e, index) => {
        if (e.isIntersecting) {
          setTimeout(() => {
            e.target.classList.add("visible");
          }, index * 100); // Stagger animation
        }
      });
    },
    { threshold: 0.1, rootMargin: "0px 0px -50px 0px" }
  );
  document.querySelectorAll(".reveal").forEach((el) => observer.observe(el));

  // Accordion
  document.querySelectorAll(".accordion-header").forEach((btn) => {
    btn.addEventListener("click", function () {
      const item = this.parentElement;
      const open = item.classList.contains("open");
      const panel = item.querySelector(".accordion-panel");
      if (!open) {
        item.classList.add("open");
        this.setAttribute("aria-expanded", "true");
        if (panel) {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      } else {
        this.setAttribute("aria-expanded", "false");
        if (panel) {
          panel.style.maxHeight = "0px";
          panel.addEventListener(
            "transitionend",
            () => {
              if (!item.classList.contains("open")) {
                panel.style.maxHeight = "0px";
              }
            },
            { once: true }
          );
        }
        item.classList.remove("open");
      }
    });
  });
  // Ensure opened panels have proper height on load
  document
    .querySelectorAll(".accordion-item.open .accordion-panel")
    .forEach((p) => {
      p.style.maxHeight = p.scrollHeight + "px";
    });

  // Contact form client validation (non-blocking UX)
  const form = document.querySelector(".contact-form");
  if (form) {
    form.addEventListener("submit", (e) => {
      const name = form.querySelector('input[name="ad"]');
      const email = form.querySelector('input[name="eposta"]');
      const msg = form.querySelector('textarea[name="mesaj"]');
      let valid = true;
      const mark = (el, ok) => {
        el.style.borderColor = ok ? "var(--border)" : "#e66b6b";
      };
      if (!name.value.trim()) {
        valid = false;
        mark(name, false);
      } else mark(name, true);
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        valid = false;
        mark(email, false);
      } else mark(email, true);
      if (msg.value.trim().length < 10) {
        valid = false;
        mark(msg, false);
      } else mark(msg, true);
      if (!valid) {
        e.preventDefault();
        alert("Lütfen form alanlarını kontrol edin.");
      }
    });
  }

  // Service detail modals
  const modal = document.getElementById("modal");
  const modalBody = document.getElementById("modal-body");
  const openModal = (html) => {
    if (!modal || !modalBody) return;
    modalBody.innerHTML = html;
    modal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  };
  const closeModal = () => {
    if (!modal) return;
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  };
  document
    .querySelectorAll("[data-close]")
    .forEach((el) => el.addEventListener("click", closeModal));
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeModal();
  });
  const serviceDetails = {
    web: "<h3>Web Tasarım</h3><p>Performans odaklı, SEO dostu ve yönetilebilir altyapılar.</p>",
    ads: "<h3>Dijital Pazarlama</h3><p>Meta ve Google Ads kampanyalarıyla ölçülebilir büyüme.</p>",
    smm: "<h3>Sosyal Medya</h3><p>Strateji, içerik takvimi ve çoklu platform yönetimi.</p>",
  };
  document.querySelectorAll(".service-detail").forEach((btn) => {
    btn.addEventListener("click", function () {
      const key = this.getAttribute("data-service");
      openModal(serviceDetails[key] || "<p>Detay bulunamadı.</p>");
    });
  });

  // Cookie consent
  const cookieBar = document.getElementById("cookie-consent");
  const acceptBtn = document.getElementById("cookie-accept");
  const declineBtn = document.getElementById("cookie-decline");
  const cookieKey = "cookie-consent";
  if (cookieBar && !localStorage.getItem(cookieKey)) {
    cookieBar.classList.add("show");
  }
  const setConsent = (value) => {
    localStorage.setItem(cookieKey, value);
    cookieBar && cookieBar.classList.remove("show");
  };
  acceptBtn &&
    acceptBtn.addEventListener("click", () => setConsent("accepted"));
  declineBtn &&
    declineBtn.addEventListener("click", () => setConsent("declined"));

  // Simple i18n (TR/EN)
  const langBtn = document.querySelector(".lang-toggle");
  const textMap = {
    tr: {
      nav: { blog: "Blog" },
      hero: {
        title:
          'Merhaba, ben <span class="accent">dijital çözüm ortağınız</span>',
        subtitle: "Kurumsal Web Siteleri • Web Geliştirme",
      },
      cta: { whatsapp: "Whatsapp'tan Yaz", quote: "Teklif Al" },
      services: {
        title: "Hizmetler",
        web: {
          title: "Web Tasarım",
          desc: "Hızlı, mobil uyumlu ve modern arayüzler ile markanızı öne çıkarın.",
        },
        ads: {
          title: "Dijital Pazarlama",
          desc: "Hedef odaklı kampanyalarla dönüşümlerinizi artırın.",
        },
        smm: {
          title: "Sosyal Medya",
          desc: "Stratejik içerik planı ile etkileşiminizi büyütün.",
        },
      },
      pricing: {
        title: "Fiyatlar",
        starter: "Başlangıç",
        starter1: "Tek sayfa site",
        starter2: "Mobil uyumlu",
        starter3: "Temel SEO",
        start: "Başla",
        pro: "Profesyonel",
        pro1: "Çok sayfalı site",
        pro2: "Hız optimizasyonu",
        pro3: "Gelişmiş SEO",
        choose: "Seç",
        custom: "Özel",
        quote: "Teklif",
        custom1: "Özel tasarım",
        custom2: "Entegrasyonlar",
        custom3: "Ölçeklenebilir altyapı",
        getQuote: "Teklif Al",
      },
      testimonials: {
        title: "Müşteri Yorumları",
        t1: "Hızlı teslimat ve kaliteli iş, kesinlikle tavsiye ederim.",
        t2: "Reklam performansımız belirgin şekilde arttı.",
        t3: "Hem tasarım hem iletişim mükemmeldi.",
      },
      faq: {
        title: "Sık Sorulan Sorular",
        q1: "Teslim süresi nedir?",
        a1: "Proje kapsamına göre 1-4 hafta arasında değişir.",
        q2: "Ödeme nasıl yapılır?",
        a2: "Başlangıçta %50, teslimde kalan tutar alınır.",
        q3: "Destek veriyor musunuz?",
        a3: "Yayın sonrası belirlenen süre boyunca destek sağlanır.",
      },
      contact: {
        title: "İletişim",
        whatsapp: "Whatsapp",
        email: "E-posta",
        name: "Ad Soyad",
        emailLabel: "E-posta",
        message: "Mesajınız",
        send: "Gönder",
      },
    },
    en: {
      nav: { blog: "Blog" },
      hero: {
        title: 'Hi, I am your <span class="accent">digital partner</span>',
        subtitle: "Corporate Websites • Web Development",
      },
      cta: { whatsapp: "Message on WhatsApp", quote: "Get a Quote" },
      services: {
        title: "Services",
        web: {
          title: "Web Design",
          desc: "Fast, responsive, modern interfaces to highlight your brand.",
        },
        ads: {
          title: "Digital Marketing",
          desc: "Goal-driven campaigns to increase conversions.",
        },
        smm: {
          title: "Social Media",
          desc: "Strategic content to grow your presence.",
        },
      },
      pricing: {
        title: "Pricing",
        starter: "Starter",
        starter1: "One-page site",
        starter2: "Responsive",
        starter3: "Basic SEO",
        start: "Start",
        pro: "Professional",
        pro1: "Multi-page site",
        pro2: "Speed optimization",
        pro3: "Advanced SEO",
        choose: "Choose",
        custom: "Custom",
        quote: "Quote",
        custom1: "Custom design",
        custom2: "Integrations",
        custom3: "Scalable infra",
        getQuote: "Get Quote",
      },
      testimonials: {
        title: "Testimonials",
        t1: "Fast delivery and high quality work.",
        t2: "Our ad performance noticeably improved.",
        t3: "Both design and communication were excellent.",
      },
      faq: {
        title: "FAQ",
        q1: "What is the delivery time?",
        a1: "Depends on scope, usually 1-4 weeks.",
        q2: "How do payments work?",
        a2: "50% upfront, remaining on delivery.",
        q3: "Do you provide support?",
        a3: "Yes, support is provided after launch.",
      },
      contact: {
        title: "Contact",
        whatsapp: "WhatsApp",
        email: "Email",
        name: "Full Name",
        emailLabel: "Email",
        message: "Your message",
        send: "Send",
      },
    },
  };
  const applyLang = (lang) => {
    const t = textMap[lang] || textMap.tr;
    // hero
    const heroTitle = document.getElementById("hero-title");
    const heroSubtitle = document.getElementById("hero-subtitle");
    // Keep custom title (with name); only update subtitle
    if (heroSubtitle) heroSubtitle.textContent = t.hero.subtitle;
    const ctaWhats = document.getElementById("cta-whatsapp");
    const ctaQuote = document.getElementById("cta-quote");
    if (ctaWhats) ctaWhats.textContent = t.cta.whatsapp;
    if (ctaQuote) ctaQuote.textContent = t.cta.quote;
    // sections titles
    const ids = [
      ["services-title", t.services.title],
      ["pricing-title", t.pricing.title],
      ["testimonials-title", t.testimonials.title],
      ["faq-title", t.faq.title],
      ["contact-title", t.contact.title],
      ["contact-name-label", t.contact.name],
      ["contact-email-label", t.contact.emailLabel],
      ["contact-message-label", t.contact.message],
      ["contact-send", t.contact.send],
    ];
    ids.forEach(([id, val]) => {
      const el = document.getElementById(id);
      if (el) el.textContent = val;
    });
    // pricing bullets
    const mapId = {
      starter: "Başlangıç",
      pro: "Profesyonel",
      custom: "Özel",
    };
    // cards titles
    const services = document.getElementById("hizmetler");
    if (services) {
      const cards = services.querySelectorAll(".card");
      const [c1, c2, c3] = cards;
      if (c1) {
        c1.querySelector("h3").textContent = t.services.web.title;
        c1.querySelector("p").textContent = t.services.web.desc;
      }
      if (c2) {
        c2.querySelector("h3").textContent = t.services.ads.title;
        c2.querySelector("p").textContent = t.services.ads.desc;
      }
      if (c3) {
        c3.querySelector("h3").textContent = t.services.smm.title;
        c3.querySelector("p").textContent = t.services.smm.desc;
      }
    }
    // pricing cards
    const pricing = document.getElementById("fiyatlar");
    if (pricing) {
      const cards = pricing.querySelectorAll(".price-card");
      const [p1, p2, p3] = cards;
      if (p1) {
        p1.querySelector("h3").textContent = t.pricing.starter;
        const lis = p1.querySelectorAll("li");
        lis[0].textContent = t.pricing.starter1;
        lis[1].textContent = t.pricing.starter2;
        lis[2].textContent = t.pricing.starter3;
        p1.querySelector("a").textContent = t.pricing.start;
      }
      if (p2) {
        p2.querySelector("h3").textContent = t.pricing.pro;
        const lis = p2.querySelectorAll("li");
        lis[0].textContent = t.pricing.pro1;
        lis[1].textContent = t.pricing.pro2;
        lis[2].textContent = t.pricing.pro3;
        p2.querySelector("a").textContent = t.pricing.choose;
      }
      if (p3) {
        p3.querySelector("h3").textContent = t.pricing.custom;
        const lis = p3.querySelectorAll("li");
        lis[0].textContent = t.pricing.custom1;
        lis[1].textContent = t.pricing.custom2;
        lis[2].textContent = t.pricing.custom3;
        p3.querySelector("a").textContent = t.pricing.getQuote;
        p3.querySelector(".price").textContent = t.pricing.quote;
      }
    }
    // testimonials
    const testi = document.getElementById("yorumlar");
    if (testi) {
      const ps = testi.querySelectorAll("blockquote p");
      ps[0] && (ps[0].textContent = t.testimonials.t1);
      ps[1] && (ps[1].textContent = t.testimonials.t2);
      ps[2] && (ps[2].textContent = t.testimonials.t3);
    }
    // nav blog label
    const blogLink = document.querySelector('.nav a[href="blog.html"]');
    if (blogLink) blogLink.textContent = t.nav.blog;
    localStorage.setItem("lang", lang);
    const langBtn = document.querySelector(".lang-toggle");
    if (langBtn) langBtn.textContent = lang.toUpperCase();
  };
  const savedLang = localStorage.getItem("lang") || "tr";
  applyLang(savedLang);
  if (langBtn) {
    langBtn.textContent = savedLang.toUpperCase();
    langBtn.addEventListener("click", () => {
      const next =
        (localStorage.getItem("lang") || "tr") === "tr" ? "en" : "tr";
      applyLang(next);
    });
  }

  // Role Rotator in hero
  const roleEl = document.getElementById("role-rotator");
  if (roleEl) {
    const roles = [
      "Dijital Çözüm Ortağınız",
      "Yazılım Mühendisi",
      "Web Programlamacısı",
    ];
    let idx = 0;
    const rotate = () => {
      idx = (idx + 1) % roles.length;
      roleEl.classList.add("fade-out");
      setTimeout(() => {
        roleEl.textContent = roles[idx];
        roleEl.classList.remove("fade-out");
        roleEl.classList.add("fade-in");
        setTimeout(() => roleEl.classList.remove("fade-in"), 400);
      }, 250);
    };
    setInterval(rotate, 2200);
  }
})();
