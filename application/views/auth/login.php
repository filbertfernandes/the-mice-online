
<div class="container about">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-8 col-sm-10 col-12">
      <div class="card mt-4 pt-1">
        <div class="card-body">
          <h2 class="card-title text-center">THE MICE</h2>
          <div class="box">
            <form action="<?= base_url('auth') ?>" method="post">
              <input type="text" class="mt-3" id="nickname" name="nickname" placeholder="Enter your nickname" autocomplete="off" value="<?= set_value('nickname') ?>">
              <?= form_error('nickname', '<small style="color: red;font-weight: bold;" class="pl-1">', '</small>'); ?>
              <button type="submit" class="mt-3 mb-4" >Play!</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>