
<div class="container about">
  <div class="row justify-content-center">
    <div class="col-md-6 col-12">
      <div class="card mt-4 p-5">
        <div class="card-body">
          <h5 class="card-title text-center">THE MICE</h5>
          <form class="box" action="<?= base_url('auth') ?>" method="post">
            <input type="text" id="nickname" name="nickname" placeholder="Enter your nickname" value="<?= set_value('nickname') ?>">
            <?= form_error('nickname', '<small style="color: red;font-weight: bold;">', '</small>'); ?>
            <button type="submit">Play!</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>