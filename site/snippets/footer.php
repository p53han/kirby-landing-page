<?php
/**
 * @author Alexander Schalk
 */
?>


<footer class="bg-gray-800 text-gray-300 pt-12 pb-8 mt-16">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">

      <?php //Spalte 1 ?>
      <div class="lg:col-span-2">
        <h2 class="text-lg font-semibold text-white mb-3">Made with Kirby</h2>
        <p class="text-sm text-gray-400">
          Kirby: The file-based CMS that adapts to any project, loved by developers and editors alike.
        </p>
        <p class="text-sm mt-2"><a href="https://getkirby.com" target="_blank" rel="noopener noreferrer" class="text-blue-400 hover:text-blue-300 hover:underline">getkirby.com</a></p>
      </div>

      <?php // Spalte 2 ?>
      <div>
        <h2 class="text-lg font-semibold text-white mb-3">Navigation</h2>
        <ul class="space-y-2">
          <?php
          $footerItems = $site->children()->listed();
          if ($footerItems->isNotEmpty()):
            foreach ($footerItems as $item): ?>
              <li>
                <a href="<?= $item->url() ?>" class="text-sm hover:text-white hover:underline">
                  <?= $item->title()->esc() ?>
                </a>
              </li>
            <?php endforeach;
          endif;
          ?>
          <li><a href="<?= url('impressum') ?>" class="text-sm hover:text-white hover:underline">Impressum</a></li>
          <li><a href="<?= url('datenschutz') ?>" class="text-sm hover:text-white hover:underline">Datenschutz</a></li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-white mb-3">Kirby Resources</h2>
        <ul class="space-y-2">
          <li><a href="https://getkirby.com/docs" target="_blank" rel="noopener noreferrer" class="text-sm hover:text-white hover:underline">Docs</a></li>
          <li><a href="https://forum.getkirby.com" target="_blank" rel="noopener noreferrer" class="text-sm hover:text-white hover:underline">Forum</a></li>
          <li><a href="https://chat.getkirby.com" target="_blank" rel="noopener noreferrer" class="text-sm hover:text-white hover:underline">Chat</a></li>
          <li><a href="https://github.com/getkirby" target="_blank" rel="noopener noreferrer" class="text-sm hover:text-white hover:underline">GitHub</a></li>
        </ul>
      </div>

    </div>

    <div class="border-t border-gray-700 pt-6 text-center text-sm text-gray-500">
      &copy; <?= date('Y') ?> <?= $site->title()->esc() ?>. Alle Rechte vorbehalten.
    </div>

  </div>
</footer>
<?= js('@auto') ?>

</body>
</html>