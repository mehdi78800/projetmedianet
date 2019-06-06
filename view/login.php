
		<div class="container
		content">
		<div class="main block">
			<article class="post">
				<h2>Connexion</h2>
				<p class="meta"></p>
				<p>
			    <form action="/projetMedianet/index.php/login" method="GET">
			    	 <p><label for="login">login</label> <input type="text" name="login" id="login"/></p>
			    	 <p><label for="password">password</label> <input type="password" name="password" id="password"/></p>
			    	 <input type="hidden" value="login" name="action">
			    	 <?php if ($existe==0){ ?>
			    	  <h3>Login ou mot de passe incorrect</h3>			    	 
			    	 <a href="/projetMedianet/index.php/enregistrer">Enregistrez vous</a>
			    	 <?php } ?>
			    	 <p><input type="submit" value="Connexion" /></p>
			    </form>
				</p>
			<div>
			<div class="container">
				<footer class="main-footer">
					<div class="f_left">
						<p>&#169; 2017 - Association Medianet</p>
					</div>
				</footer>
			</div>
		</div>
