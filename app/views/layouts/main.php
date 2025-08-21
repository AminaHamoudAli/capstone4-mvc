<?php use App\Core\Auth; ?>
<!doctype html><html lang="en"><head> ... </head><body>
<header>
  <strong>Capstone4 MVC</strong>
  <nav class="right">
    <?php if (Auth::check()): ?>
      <span><?= htmlspecialchars(Auth::user()['email']) ?></span> | 
      <a href="/users">Users</a> | <a href="/logout">Logout</a>
    <?php else: ?>
      <a href="/login">Login</a>
    <?php endif; ?>
  </nav>
  <div style="clear:both"></div>
</header>

<main>
  <?php \App\Core\View::section($view, get_defined_vars()); ?>
</main>

<footer><small>© <?= date('Y') ?> Capstone4 MVC</small></footer>
</body></html>
