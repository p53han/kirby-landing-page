<?php
// @author Alexander Schalk
// site/snippets/sections/contact.php


$formErrors = $formErrors ?? []; 
$formSuccess = $formSuccess ?? false;
$formData = $formData ?? [];

?>
<section class="contact-form bg-gray-50 py-16">
  <div class="container mx-auto px-4 max-w-3xl">
    <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Kontaktieren Sie uns</h2>

    <?php if ($formSuccess): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Nachricht gesendet!</strong>
        <span class="block sm:inline"> Vielen Dank, wir werden uns bald bei Ihnen melden.</span>
      </div>
    <?php endif; ?>

    <?php if (!empty($formErrors)): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Fehler!</strong>
        <span class="block sm:inline"> Bitte überprüfen Sie Ihre Eingaben:</span>
        <ul class="list-disc list-inside mt-2">
          <?php foreach ($formErrors as $field => $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (!$formSuccess): ?>
      <form method="POST" action="<?= $page->url() ?>#contact-form" id="contact-form">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Vorname <span class="text-red-500">*</span></label>
            <input
              type="text"
              name="first_name"
              id="first_name"
              required 
              value="<?= esc($formData['first_name'] ?? '', 'attr') ?>"
              class="w-full px-3 py-2 border <?= isset($formErrors['first_name']) ? 'border-red-500' : 'border-gray-300' ?> rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
            <?php if(isset($formErrors['first_name'])): ?><p class="text-red-500 text-xs mt-1"><?= esc($formErrors['first_name']) ?></p><?php endif; ?>
          </div>
          <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nachname <span class="text-red-500">*</span></label>
            <input
              type="text"
              name="last_name"
              id="last_name"
              required
              value="<?= esc($formData['last_name'] ?? '', 'attr') ?>"
              class="w-full px-3 py-2 border <?= isset($formErrors['last_name']) ? 'border-red-500' : 'border-gray-300' ?> rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
             <?php if(isset($formErrors['last_name'])): ?><p class="text-red-500 text-xs mt-1"><?= esc($formErrors['last_name']) ?></p><?php endif; ?>
          </div>
        </div>

        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-Mail-Adresse <span class="text-red-500">*</span></label>
          <input
            type="email" 
            name="email"
            id="email"
            required
            value="<?= esc($formData['email'] ?? '', 'attr') ?>"
            class="w-full px-3 py-2 border <?= isset($formErrors['email']) ? 'border-red-500' : 'border-gray-300' ?> rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          >
           <?php if(isset($formErrors['email'])): ?><p class="text-red-500 text-xs mt-1"><?= esc($formErrors['email']) ?></p><?php endif; ?>
        </div>

        <div class="mb-6">
          <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Nachricht <span class="text-red-500">*</span></label>
          <textarea
            name="message"
            id="message"
            rows="4"
            required
            class="w-full px-3 py-2 border <?= isset($formErrors['message']) ? 'border-red-500' : 'border-gray-300' ?> rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
          ><?= esc($formData['message'] ?? '') ?></textarea>
           <?php if(isset($formErrors['message'])): ?><p class="text-red-500 text-xs mt-1"><?= esc($formErrors['message']) ?></p><?php endif; ?>
        </div>

        <?php // CSRF Schutzfeld ?>
        <input type="hidden" name="csrf" value="<?= csrf() ?>">

        <?php // Honeypot-Feld für Spam-Schutz ?>
        <div class="ohnohoney" style="position: absolute; left: -9999px;" aria-hidden="true">
            <label for="website">Bitte nicht ausfüllen</label>
            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="text-center">
          <button type="submit" name="submit_contact" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-300">
            Nachricht senden
          </button>
        </div>
      </form>
    <?php endif; // Ende if (!$formSuccess) ?>

  </div>
</section>