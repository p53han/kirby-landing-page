<?php
// @author ALexander Schalk
// site/snippets/sections/services.php

$services = $page->children()->filterBy('template', 'service'); // Nur nach Template filtern

if ($services->isNotEmpty()):
  ?>
  <section class="services bg-white py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Unsere Leistungen</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
  
        <?php foreach ($services as $service): ?>
          <div class="service-item p-6 text-center border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col">
            <?php if ($iconFile = $service->service_image_icon()->toFile()): ?>
              <div class="icon mb-4 inline-block">
                <img
                  src="<?= $iconFile->url() ?>"
                  alt="<?= $iconFile->alt()->esc() ?: $service->title()->esc() ?>"
                  class="h-12 w-12 mx-auto object-contain"
                  loading="lazy"
                 >
              </div>
            <?php endif; ?>
  
            <h3 class="text-xl font-semibold text-gray-800 mb-2 break-words">
                <?= $service->title()->esc() ?>
            </h3>
  
            <?php if ($service->service_text()->isNotEmpty()): ?>
              <p class="text-gray-600 mt-auto">
                <?= $service->service_text()->esc() ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endforeach ?>
  
      </div>
    </div>
  </section>
  <?php endif; ?>