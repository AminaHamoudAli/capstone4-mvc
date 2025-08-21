<?php $view = 'auth/login'; ?>
<h1>Login</h1>

<?php if (!empty($error)): ?>
  <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form action="/login" method="post" autocomplete="off">
  <div class="field"><label>Email</label><input type="email" name="email" required></div>
  <div class="field"><label>Password</label><input type="password" name="password" required></div>
  <button class="btn" type="submit">Login</button>
</form>
