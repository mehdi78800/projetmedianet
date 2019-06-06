<?php
    ?>

		<div class="container
		content">
		<div class="main block">
			<article class="post">
				<h2>Enregistrement</h2>
				<p class="meta"></p>
				<p>
			    <form action="/projetMedianet/index.php/create" method="GET">
			    	 <p><label for="nom">Nom</label> <input type="text" name="nom" id="nom"/></p>
			    	 <p><label for="prenom">Prenom</label> <input type="text" name="prenom" id="prenom"/></p>
			    	 <p><label for="datenaissance">Date de naissance</label> <input type="text" name="datenaiss" id="datenaiss"/></p>
			    	 <p><label for="login">Login</label> <input type="text" name="login" id="login"/></p>
			    	 <p><label for="password">Password</label> <input type="text" name="password" id="password"/></p>
			    	 <p><label for="email">Email</label> <input type="text" name="email" id="email"/></p>
			    	 <input type="hidden" value="create" name="action">
			    	 <p><input type="submit" value="enregistrer" /></p>
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
