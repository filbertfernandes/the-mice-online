const game = document.getElementById('game');
const character = document.getElementById('character');
const block = document.getElementById('block');
const light = document.getElementById('light');
const flyingBlock = document.getElementById('flying-block');
const gun = document.getElementById('gun');
const gunfire = document.getElementById('gunfire');
const progressBar = document.querySelector('.progress-bar');
const fatBlock = document.getElementById('fat-block');
const highscoreInput = document.getElementById('highscore-input');
const highscoreForm = document.getElementById('highscore-form');
const nickname = document.getElementById('nickname');

// action
	// 1. jump w/ click
	function jump() {
		if(character.classList != 'animate') {
			character.classList.add('animate');
			jumpSfx();
			gun.style.opacity = '0';
			gunfire.style.opacity = '0';
		}
		setTimeout(function() {
			character.classList.remove('animate');
		}, 500);
	}

	$('body').on('click', function() {
		jump();
	})

	// 2. jump w/ arrow key
	$(window).keydown(function(event) {
		if( event.which == 38 ) {
			jump();
		}
	})

	// 3. light
	$(window).keyup(function(event) {
		if( event.which == 17 ) {
			light.style.opacity = '.5';
			setTimeout(function() {
				light.style.opacity = '0';
			}, 1500)
		}
	})

	// 3. gun
	$(window).keyup(function(event) {
		let flyingBlockLeft = parseInt(window.getComputedStyle(flyingBlock).getPropertyValue("left"));
		let fatBlockLeft = parseInt(window.getComputedStyle(fatBlock).getPropertyValue("left"))
		if( event.which == 88 ) {
			if( character.classList.contains('animate') || progressBar.classList.contains('reload') ) {
				return;
			} else {
				gunshotSfx();
				
				gun.style.opacity = '1';
				progressBar.classList.add('reload');
				setTimeout(function() {
					gun.style.opacity = '0';
					progressBar.classList.remove('reload');
				}, 1200)
				gunfire.style.opacity = '1';
				setTimeout(function() {
					gunfire.style.opacity = '0';
				}, 200)

				if( flyingBlockLeft > 550 && fatBlockLeft > 550) return;

				if( flyingBlockLeft <= fatBlockLeft ) {
					let flyingDelay = Math.floor(Math.random() * 10000);
					flyingBlock.classList.remove('flying-start');
					flyingBlock.style.left = `${flyingBlockLeft}px`;
					flyingBlock.classList.add('flying-block-dead');
					setTimeout(function() {
						flyingBlock.style.left = '600px';
					}, 500)
					setTimeout(function() {
						if( block.classList.contains('start') ) {
							flyingBlock.classList.remove('flying-block-dead');
							flyingBlock.classList.add('flying-start');
						}
					}, flyingDelay)
				} else if( fatBlockLeft < flyingBlockLeft ) {
					let fatDelay = Math.floor(Math.random() * 15000);
					fatBlock.classList.remove('fat-start');
					fatBlock.style.left = `${fatBlockLeft}px`;
					fatBlock.classList.add('fat-block-dead');
					setTimeout(function() {
						fatBlock.style.left = '600px';
					}, 500)
					setTimeout(function() {	
						if( block.classList.contains('start') ) {
							fatBlock.classList.remove('fat-block-dead');
							fatBlock.classList.add('fat-start');
						}
					}, fatDelay)
				}

			}
		}
	})


// mute
	let muteButton = document.querySelector('.muteButton');
	let mute = 'no';
	muteButton.addEventListener('click', function() {
		if(mute == 'no') {
			mute = 'yes';
			muteButton.style.textDecorationLine = 'line-through';
		} else if(mute == 'yes') {
			mute = 'no';
			muteButton.style.textDecorationLine = 'none';
		}
	})


// score system
	let score = document.querySelector(".score");
	let scoreNum = 0;
	let highscore = document.querySelector('.highscore span');
	let scoreSystem = setInterval(function() {
			score.innerHTML = scoreNum++;
		},100)


// check dead
	let checkDead = setInterval(function() {
		let characterTop = parseInt(window.getComputedStyle(character).getPropertyValue("top"));
		let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));
		let flyingBlockLeft = parseInt(window.getComputedStyle(flyingBlock).getPropertyValue("left"));
		let flyingBlockTop = parseInt(window.getComputedStyle(flyingBlock).getPropertyValue("top"));
		let fatBlockLeft = parseInt(window.getComputedStyle(fatBlock).getPropertyValue("left"));
		function die() {
			block.classList.remove('start');
			block.style.left = `${blockLeft}px`;
			flyingBlock.classList.remove('flying-start');
			flyingBlock.style.left = `${flyingBlockLeft}px`;
			fatBlock.classList.remove('fat-start');
			fatBlock.style.left = `${fatBlockLeft}px`;
			deadSfx();
		}
		function retry() {
			flyingBlock.classList.remove('flying-block-dead');
			fatBlock.classList.remove('fat-block-dead');
			block.style.left = '550px';
			flyingBlock.style.left = '600px';
			fatBlock.style.left = '600px';
			if( parseInt(highscore.innerHTML) <= scoreNum ) {
				highscoreInput.value = `${scoreNum-1}`;
				highscoreForm.submit();
			}
			scoreNum = 0;
		}
		if( blockLeft < 40 && blockLeft > -20 && characterTop >= 96 ) {
			die();
			let tryAgain = confirm("GAME OVER!\n   Try again?");
			if( tryAgain == true ) {
				retry();
			}
		} else if( flyingBlockLeft < 40 && flyingBlockLeft > -40 && characterTop <= 98 ) {
			flyingBlock.classList.add('flying-block-dead');
			die();
			let tryAgain = confirm("GAME OVER!\n   Try again?");
			if( tryAgain == true ) {
				retry();
			}
		} else if( flyingBlockLeft < 40 && flyingBlockLeft > -40 && flyingBlockTop >= 100 ) {
			die();
			let tryAgain = confirm("GAME OVER!\n   Try again?");
			if( tryAgain == true ) {
				retry();
			}
		} else if( fatBlockLeft < 40 && fatBlockLeft > -40 && characterTop >= 76 ) {
			die();
			let tryAgain = confirm("GAME OVER!\n   Try again?");
			if( tryAgain == true ) {
				retry();
			}
		}
	},10)
	

// change background within a certain time 
	let time1 = Math.floor(Math.random() *10000) +8000;
	let time2 = Math.floor(Math.random() *20000) +8000;

	setInterval(function() {
		game.style.backgroundColor = 'black';
		nickname.style.color = 'white';
	}, time1);
	setInterval(function() {
		game.style.backgroundColor = 'white';
		nickname.style.color = 'black';
	}, time2);


// choose character
	const charSuit = document.querySelectorAll('.char-suit');
	for( let i = 0; i < charSuit.length; i++ ) {
		charSuit[i].addEventListener('click', function() {
			character.style.background = `url(assets/game/img/chars/char${i + 1}.png) no-repeat top`;
		})
	}
	$('.char-suit').on('click', function() {
		$('.char-suit').removeClass('active');
		$(this).addClass('active');
	})


// pause
	function pause() {
		block.classList.remove('start')
		flyingBlock.classList.remove('flying-start');
		fatBlock.classList.remove('fat-start')
		startButton.innerHTML = 'START';
		scoreNum = 0;
	}
	function start() {
		block.classList.add('start')
		flyingBlock.classList.add('flying-start');
		fatBlock.classList.add('fat-start')
		startButton.innerHTML = 'PAUSE';
		scoreNum = 0;
	}
	
	// space
	$(window).keydown(function(event) {
		if( event.which == 32 ) {
			if( block.classList.contains('start') ) {
				pause();
			} else if( !block.classList.contains('start') ) {
				start();
			}
		}
	})

	// button
	let startButton = document.querySelector('.startButton');
	startButton.addEventListener('click', function() {
		if( block.classList.contains('start') ) {
			pause();
		} else if( !block.classList.contains('start') ) {
			start();
		}
	})


// sound effects
	// dead sfx
	function deadSfx() {
		if( mute == 'no' ) {
			let death = new Audio("assets/game/sfx/death.mp3");
			death.play();
		}
	}

	// jump sfx
	function jumpSfx() {
		if( mute == 'no' ) {
			let jump = new Audio("assets/game/sfx/jump.mp3");
			jump.play();
		}
	}

	// gunshot sfx
	function gunshotSfx() {
		if( mute == 'no' ) {
			let gunshot = new Audio("assets/game/sfx/gunshot.mp3");
			gunshot.play();
		}
	}



	



	


