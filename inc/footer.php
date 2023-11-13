
</main>

<style>
	.confirm, .congrats{
		box-shadow: 0 0 5px #3d3d3d;
		border-radius: 6px;
		font-size: 1.3em;
		padding: 1em;
		border: 1px solid #adadad;
		margin: 0 auto;
		max-width: 800px;
		min-height: 200px;
		display: flex;
		justify-content: center;
		align-content: center;
		background: #f7f7f7;
		font-family: arial;
	}
	.confirm p, .congrats p{
		font-weight: 100;
		line-height: 1.5em;
		margin-bottom: 1em;
	}
	.confirm form{
		display: inline;
		background: transparent;
		padding: 0;
		margin: 0;
		box-shadow: none;
		border: none;
	}
	.confirm button{
		background: #0000ff;
		color: #ffffff;
		border-radius: 2px;
		box-shadow: 0 0 2px #333;
		padding: .5em;
		font-size: .8em;
		cursor: pointer;
	}
	.confirm a, .congrats a{
		text-decoration: none;
		background: #f78acf;
		color: #f9f9f9;
		padding: .5em;
		font-size: 1em;
		border-radius: 2px;
		cursor: pointer;
	}
	.congrats a{
		background: #0000ff;
	}
</style>


<script href="<?= SITE ?>/script/jquery-3.4.0-jquery.min.js"></script>
<!-- <script href="script/main.js"></script> -->
<script>

function trackState(){
	let st = document.querySelector('[name=state]');
	let lg = document.querySelector('[name=lga]');
	st.onchange = function(e){
		console.log(e)
		// e.preventDefault();
		$.ajax({
			type: 'get',
			url: 'inc.load.data.php?id='+e.target.value,
			success: function(data){
				lg.innerHTML = data;
				console.log(data)
			}
		});

		lg.innerHTML = `
		<option>Select L.G.A.</option>
		<option>Dutse</option>
		<option>Gumel</option>`;
	}
}

function func(){
	trackState();
}
window.load = func();
</script>
</body>
</html>

<!-- ======	CONTACT ME	=======
	UMAR TAHIR BAKO

	I Offer the following:-

	Web Development,
	Type Setting,
	Graphics Design,
	Prointing; and
	Photocopy e.t.c

	For more of this services and creations kindly contact me on
	
	Tel:	+234 (0)8131168825,
			+234 (0)9024066380

	MyEmail: umartahirbako@gmail.com

	MyFullName: 	Umar Tahir Bako
	Facebook: 		www.facebook.com/profile.php?id=100008707058344
	FacebookPage: 	www.facebook.com/profile.php?id=100090410096079
	
	WhatsApp: wa.me/2348131168825
	WhatsApp: wa.me/2349024066380

--- ====================================== -->
<?php die(); ?>