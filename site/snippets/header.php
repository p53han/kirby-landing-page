<?php
/**
 * @author Alexander Schalk
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

  <?= css('assets/css/output.css') ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">

  <?= css('@auto') ?>
  <?= js('@auto', true)?>

</head>
<body class="bg-white text-gray-800 antialiased">

  <header class="bg-white shadow-md sticky top-0 z-50"> 
    <div class="container mx-auto px-4 py-4"> 
      <div class="flex justify-between items-center"> 

        
        <a class="text-xl font-bold text-gray-900 hover:text-blue-700 transition duration-200" href="<?= $site->url() ?>">
          <?= $site->title()->esc() ?>
        </a>

        <nav class="space-x-4">
          <?php
          $items = $site->children()->listed();
          if ($items->isNotEmpty()):
            foreach ($items as $item): ?>
              <a
                href="<?= $item->url() ?>"
                class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded transition duration-200 <?php e($item->isActive(), 'font-semibold text-blue-600')?>"
                <?php e($item->isOpen(), 'aria-current="page"') ?>
              >
                <?= $item->title()->esc() ?>
              </a>
            <?php endforeach;
          endif;
          ?>
        </nav>

      </div>
    </div>
  </header>
