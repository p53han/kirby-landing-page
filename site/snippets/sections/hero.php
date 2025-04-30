<?php # Hero-Bereich
# @author Alexander Schalk ?>
<section class="hero bg-gray-100 py-16 md:py-24">
  <div class="container mx-auto px-4"> 
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">

      <?php //Text ?>
      <div class="text-center md:text-left order-2 md:order-1">
        <?php if ($page->hero_headline()->isNotEmpty()): ?>
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 leading-tight">
            <?= $page->hero_headline()->esc() ?>
          </h1>
        <?php endif ?>

        <?php if ($page->hero_text()->isNotEmpty()): ?>
          <div class="text-lg text-gray-600 prose max-w-none md:prose-lg">
            <?= $page->hero_text()->kt() ?>
          </div>
        <?php endif ?>
      </div>

      <?php //Bild ?>
      <div class="order-1 md:order-2">
        <?php if ($heroImage = $page->hero_image()->toFile()): ?>
          <img
            src="<?= $heroImage->url() ?>"
            alt="<?= $heroImage->alt()->esc() ?: $page->hero_headline()->esc() ?>"
            class="rounded-lg shadow-lg w-full h-auto object-cover max-w-md mx-auto md:max-w-full" 
            loading="lazy"
          >
        <?php else: ?>
          <div class="aspect-video bg-gray-300 rounded-lg shadow-lg flex items-center justify-center">
            <span class="text-gray-500">Bild Platzhalter</span>
          </div>
        <?php endif ?>
      </div>

    </div>
  </div>
</section>