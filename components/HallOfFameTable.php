<div class="card">
  <div class="card-content table-container">
    <h5 class="title">Top 10 Players</h5>

    <table class="table is-fullwidth is-bordered is-striped is-hoverable">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($games as $k => ['username' => $username, 'score' => $score]) { ?>
          <tr>
            <th><?= $k + 1 ?></th>
            <td><?= $username ?></td>
            <td><?= $score ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
