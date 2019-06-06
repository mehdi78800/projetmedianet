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
			    $idArticle = $post->getId();
			 echo "<h2>".$post->getTitre()."</h2>
                   <p class='meta'> Posté le: ".$post->getDate()."
                   <br>Ecrit par: ".$post->getNom()."</p> 
                   <p>".substr($resume, 0, 300)." ...</p>
                   <a class='button'href='".$idArticle."'>Lire Plus</a><br><br>";
			}
			?>
<!-- 				<h2>Blog Post 1</h2> -->
<!-- 				<p class="meta">Posted at 11:00 on May 9 by admin</p> -->
<!-- 				<p> -->
<!-- 					Lorem Ipsum -->
<!-- 					"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..." -->
<!-- 					"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..." -->

<!-- 					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius risus sit amet eros bibendum, quis pharetra augue euismod. Mauris in euismod orci, nec pulvinar dolor. Vivamus auctor varius ex aliquam eleifend. Cras mattis vitae purus at tempor. Cras justo elit, aliquam vitae ex vestibulum, blandit ultricies est. Pellentesque eget nunc elementum, interdum magna sed, finibus mi. Nunc rutrum ex quis eros ullamcorper congue. In in vulputate ante. Donec euismod ac diam eget placerat. Donec porttitor eget eros gravida cursus. Sed vel mi tincidunt, maximus tortor vel, fermentum dolor. Donec aliquet dapibus odio vel imperdiet. Fusce tempus elit nibh, eget consequat ligula blandit mollis. -->
<!-- 				</p> -->
<!-- 				<a class="button" -->
<!-- 				href="#">Read More</a> -->
<!-- 				<h2>Blog Post 1</h2> -->
<!-- 				<p class="meta">Posted at 11:00 on May 9 by admin</p> -->
<!-- 				<p> -->
<!-- 					Lorem Ipsum -->
<!-- 					"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..." -->
<!-- 					"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..." -->

<!-- 					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius risus sit amet eros bibendum, quis pharetra augue euismod. Mauris in euismod orci, nec pulvinar dolor. Vivamus auctor varius ex aliquam eleifend. Cras mattis vitae purus at tempor. Cras justo elit, aliquam vitae ex vestibulum, blandit ultricies est. Pellentesque eget nunc elementum, interdum magna sed, finibus mi. Nunc rutrum ex quis eros ullamcorper congue. In in vulputate ante. Donec euismod ac diam eget placerat. Donec porttitor eget eros gravida cursus. Sed vel mi tincidunt, maximus tortor vel, fermentum dolor. Donec aliquet dapibus odio vel imperdiet. Fusce tempus elit nibh, eget consequat ligula blandit mollis. -->
<!-- 				</p> -->
<!-- 				<a class="button" -->
<!-- 				href="#">Read More</a> -->
<!-- 				<h2>Blog Post 1</h2> -->
<!-- 				<p class="meta">Posted at 11:00 on May 9 by admin</p> -->
<!-- 				<p> -->
<!-- 					Lorem Ipsum -->
<!-- 					"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..." -->
<!-- 					"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..." -->

<!-- 					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam varius risus sit amet eros bibendum, quis pharetra augue euismod. Mauris in euismod orci, nec pulvinar dolor. Vivamus auctor varius ex aliquam eleifend. Cras mattis vitae purus at tempor. Cras justo elit, aliquam vitae ex vestibulum, blandit ultricies est. Pellentesque eget nunc elementum, interdum magna sed, finibus mi. Nunc rutrum ex quis eros ullamcorper congue. In in vulputate ante. Donec euismod ac diam eget placerat. Donec porttitor eget eros gravida cursus. Sed vel mi tincidunt, maximus tortor vel, fermentum dolor. Donec aliquet dapibus odio vel imperdiet. Fusce tempus elit nibh, eget consequat ligula blandit mollis. -->
<!-- 				</p> -->
<!-- 				<a class="button" -->
<!-- 				href="#">Read More</a> -->
			</article>
            <form action="/projetMedianet/index.php/addArticle" method="GET">
            <p><label for="titre">Titre</label> <input type="text" name="titre" id="titre"/></p>
            <p><label for="article">Article</label> <textarea rows="15" cols="50" name="article" id="article"/></textarea></p>
            <input type="hidden" value="create" name="action">
            <p><input type="submit" value="Poster" /></p>
            </form>
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

    