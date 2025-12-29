    <footer class="site-footer">
      <div class="container footer-inner">
        <span>© <span id="year"></span> <?php echo isset($siteName) ? $siteName : 'Emir Yıldırım'; ?>. Tüm hakları saklıdır.</span>
        <nav class="footer-nav">
          <a href="<?php echo SITE_URL; ?>KVKK-Aydinlatma-Metni">KVKK Aydınlatma Metni</a>
          <a href="<?php echo SITE_URL; ?>Cerez-Politikasi">Çerez Politikası</a>
        </nav>
      </div>
    </footer>

    <?php if (!isset($isBlogPage) || !$isBlogPage): ?>
    <button id="to-top" aria-label="Yukarı Çık">↑</button>

    <div
      id="modal"
      class="modal"
      aria-hidden="true"
      role="dialog"
      aria-modal="true"
    >
      <div class="modal-backdrop" data-close></div>
      <div class="modal-content" role="document">
        <button class="modal-close" aria-label="Kapat" data-close>✕</button>
        <div class="modal-body" id="modal-body"></div>
      </div>
    </div>

    <div
      id="cookie-consent"
      class="cookie-consent"
      role="dialog"
      aria-live="polite"
    >
      <div class="cookie-inner container">
        <span>Bu site deneyiminizi iyileştirmek için çerezler kullanır.</span>
        <div class="cookie-actions">
          <button class="btn outline" id="cookie-decline">Reddet</button>
          <button class="btn primary" id="cookie-accept">Kabul Et</button>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <script defer src="assets/js/main.js"></script>
  </body>
</html>

