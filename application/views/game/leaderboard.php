
<!-- title -->
<div class="container text-center mt-3">
  <div class="row">
    <div class="col-md">
      <h1>LEADERBOARD</h1>
    </div>
  </div>
</div>
<!-- end title -->

<!-- leaderboard -->
<div class="container mb-4">
  <a href="<?= base_url('game') ?>" class="back">&laquo Back to Game</a>
  <div class="row text-center">
    <div class="col-md">
      <table class="table table-sm table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Rank</th>
            <th scope="col">Nickname</th>
            <th scope="col">Highscore</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach($users as $user) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td class="text-left"><?= $user['nickname']; ?></td>
              <td><?= $user['highscore']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end leaderboard -->





