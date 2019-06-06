<?php
    ?>

	<header>
		<header>
			<div class="container">
				<h1>
					<a href="index.html">Association Medianet</a>
					<small>Projet de blog PHP en MVC</small>
				</h1>
				<div class="h_right">
					<form>
						<input type="text" placeholder="Search..."><button><a href="/projetMedianet/index.php">Deconnexion</a></button>
					</form>
				</div>
			</div>
		</header>
		<nav class="nav main-nav" id="menu">
			<div class="container">
				<ul>
					<li><a href="index.html">Accueil</a></li>
					<li><a href="#">Actualite</a></li>
					<li><a href="#">Services</a>
					<ul>
						<li><a href="#">Forum</a></li>
						<li><a href="#">Chat</a></li>
						<li><a href="#">Annuaire</a></li>
					</ul>
					</li>
					<li><a href="about.html">A propos</a></li>
				</ul>
			</div>
		</nav>
		<div class="container
		content">
		<div class="main block">
			<article class="post">
			<?php 
			foreach ($article as $post){
			    $resume = $post->getTexte();
			 echo "<h2>".$post->getTitre()."</h2>
                   <p class='meta'> Posté le: ".$post->getDate()."
                   <br>Ecrit par: ".$post->getNom()."</p> 
                   <p>".substr($resume, 0, 300)." ...</p>
                   <a class='button'href='#'>Lire Plus</a><br><br>";
			}
			?>

			</article>
            
		</div>
		<div class="side">
			<div class="block">
				<h3>News</h3>
				<p>Auteur de Game of Thrones, George R.R. Martin confirme avoir joué les consultants sur un jeu japonais</p>
				<a class="button">Lire Plus</a>
			</div>
		</div>
		<div>
			<div class="container">
				<footer class="main-footer">
					<div class="f_left">
						<p>&#169; 2017 - ASSOCIATION MEDIANET</p>
					</div>
					<div class="f_right">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="#">Services</a></li>
						</ul>
					</div>

				</footer>
			</div>
		</div>

    