<?php $view = 'users/index'; ?>
<h1>Users</h1>
<table>
  <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Joined</th></tr></thead>
  <tbody>
    <?php foreach ($users as $u): ?>
      <tr>
        <td><?= (int)$u['id'] ?></td>
        <td><?= htmlspecialchars($u['name'] ?? '') ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['created_at']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
