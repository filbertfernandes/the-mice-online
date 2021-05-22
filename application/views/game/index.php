
<!-- title -->
<div class="container text-center mt-3">
  <div class="row">
    <div class="col-md">
      <h1>THE MICE</h1>
    </div>
  </div>
</div>
<!-- end title -->

<!-- game -->
<div class="container mt-3">
  <div class="row">
    <div class="col-12">
      <div class="score">0</div>
      <div class="highscore">Highscore: <span><?= $user['highscore'] ?></span></div>
      <div id="game">
        <div class="row progress-row">
          <div class="col-4">
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 100%"></div>
            </div>
          </div>
        </div>
        <div id="nickname"><?= $user['nickname'] ?></div>
        <div id="character"></div>
        <div id="gun"></div>
        <div id="gunfire"></div>
        <img src="<?= base_url('assets/game/img/light.png') ?>" id="light">
        <div id="flying-block"></div>
        <div id="fat-block"></div>
        <div id="block"></div>
      </div>
    </div>
  </div>
</div>
<!-- end game -->

<!-- description & control -->
<div class="container mt-3 mb-3">
  <div class="row justify-content-center">

    <div class="col-lg-5">
        <h5 class="control-h5 text-center">Controls</h5>
        <div class="row justify-content-center">
          <div class="col-5">
            <p style="line-height: 1.4rem">Up Arrow / Right Click<br>Ctrl<br>Space<br>X</p>  
          </div>
          <div class="col-1">
            <p style="line-height: 1.4rem">=<br>=<br>=<br>=</p>
          </div>
          <div class="col-5">
            <p style="line-height: 1.4rem">Jump<br>Turn on the light<br>Start / Pause<br>Shoot the mouse</p>  
          </div>
        </div>  
    </div>

    <div class="col-lg-3">
      <button class="btn-dark muteButton mb-3">SOUND</button>
      <button class="btn-dark startButton mb-3">START</button>
      <button class="btn-dark muteButton mb-3"><a href="<?= base_url('game/leaderboard') ?>">LEADERBOARD</a></button><br>
      <button class="btn-dark startButton mb-3"><a href="<?= base_url('game/about') ?>">ABOUT</a></button>
      <button class="btn-dark startButton mb-3"><a href="<?= base_url('auth/logout') ?>">LOGOUT</a></button>
    </div>

  </div>
</div>
<!-- end description & control -->
    
<!-- choose character -->
<div class="container text-dark">
  <div class="row justify-content-center choose-character">
    <div class="col-lg-9">

      <div class="card">
        <div class="card-body">
          <h4 class="font-weight-bold text-center">Choose Your Character</h4>
          <div class="char-suits">
            <div class="char-suit active">char01</div>
            <div class="char-suit">char02</div>
            <div class="char-suit">char03</div>
            <div class="char-suit">char04</div>
            <div class="char-suit">char05</div>
            <div class="char-suit">char06</div>
            <div class="char-suit">char07</div>
            <div class="char-suit">char08</div>
            <div class="char-suit">char09</div>
            <div class="char-suit">char10</div>
            <div class="char-suit">char11</div>
            <div class="char-suit">char12</div>
            <div class="char-suit">char13</div>
            <div class="char-suit">char14</div>
            <div class="char-suit">char15</div>
            <div class="char-suit">char16</div>
            <div class="char-suit">char17</div>
            <div class="char-suit">char18</div>
            <div class="char-suit">char19</div>
            <div class="char-suit">char20</div>
            <div class="char-suit">char21</div>
            <div class="char-suit">char22</div>
            <div class="char-suit">char23</div>
            <div class="char-suit">char24</div>
            <div class="char-suit">char25</div>
            <div class="char-suit">char26</div>
            <div class="char-suit">char27</div>
            <div class="char-suit">char28</div>
            <div class="char-suit">char29</div>
            <div class="char-suit">char30</div>
            <div class="char-suit">char31</div>
            <div class="char-suit">char32</div>
            <div class="char-suit">char33</div>
            <div class="char-suit">char34</div>
            <div class="char-suit">char35</div>
            <div class="char-suit">char36</div>
            <div class="char-suit">char37</div>
            <div class="char-suit">char38</div>
            <div class="char-suit">char39</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- end choose character -->

<!-- hidden form -->
<form action="" method="post" id="highscore-form">
  <input type="hidden" name="highscore" id="highscore-input" value="">
  <button class="btn-sm btn-success highscore-btn" type="submit">SUBMIT HIGHSCORE</button>
</form>
<!-- end hidden form -->

