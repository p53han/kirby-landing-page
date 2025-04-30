<?php # Hero-Bereich
# @author Alexander Schalk ?>
  <section class="hero bg-gray-100 py-12 md:py-20"> <?php # Hintergrund & Padding ?>
    <div class="container mx-auto px-4"> <?php # Zentrierter Container ?>
      <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12"> <?php # Flexbox-Layout ?>

        <?php # Spalte 1 Text ?>
        <div class="w-full md:w-1/2 text-center md:text-left"> <?php # Breite & Ausrichtung ?>
          <?php if ($page->hero_headline()->isNotEmpty()): ?>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
              <?= $page->hero_headline()->esc() ?>
            </h1>
          <?php endif ?>

          <?php if ($page->hero_text()->isNotEmpty()): ?>
            <div class="text-lg text-gray-600 prose max-w-none"> <?php # Textgröße & Styling (prose für Fließtext) ?>
              <?= $page->hero_text()->kt() // kt() wandelt KirbyText (z.B. Fettungen) in HTML um ?>
            </div>
          <?php endif ?>
        </div>

        <?php # Spalte 2 Bild ?>
        <div class="w-full md:w-1/2">
          <?php if ($heroImage = $page->hero_image()->toFile()): ?>
            <img
              src="<?= $heroImage->url() ?>"
              alt="<?= $heroImage->alt()->esc() ?: $page->hero_headline()->esc() ?>" <?php // Alt-Text: Entweder aus Panel oder Headline ?>
              class="rounded-lg shadow-lg w-full h-auto object-cover" <?php // Styling: Rund, Schatten, volle Breite ?>
              <?php // Optional: Responsive Bildgrößen mit srcset ?>
              <?php /* srcset="<?= $heroImage->srcset([ '800w' => ['width' => 800], '1200w' => ['width' => 1200] ]) ?>" */ ?>
            >
          <?php endif ?>
        </div>

      </div>
    </div>
  </section>