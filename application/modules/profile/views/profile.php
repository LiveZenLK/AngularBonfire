<h1></h1>

<!-- // Load the Account section routing module -->


  <section class="container">
    <div class="row">
      <nav class="col-12 col-desktop-3">
        <h3 class="na v-title"><?php echo $username;?>'s Interests</h3>
        <ul class="vertical-nav list-unstyled">
          <li class="active article-title"><a href="#">Article Title 1</a></li>
          <li class="active article-title"><a href="#">Article Title 2</a></li>
          <li class="active article-title"><a href="#">Article Title 3</a></li>
          <li class="active article-title"><a href="#">Article Title 4</a></li>
          <li class="active article-title"><a href="#">Article Title 5</a></li>
          <li class="active article-title"><a href="#">Article Title 6</a></li>
          <li class="active article-title"><a href="#">Article Title 7</a></li>
          <li class="active article-title"><a href="#">Article Title 8</a></li>
        </ul>
		<?php echo Modules::run('profile/widget', 1); ?>
      </nav>



      <main class="col-12 col-desktop-9">
        <div class="home-page-image">
			<?php print_r($abilities);?>

          <article class="current-article">
            <img src="img/hiviz.png" alt="Man in hi-viz vest"/>
            <!-- <div class="wrap-content"> -->
              <h1 class="article-title">Test article title</h1>
              <h4 class="article-author">By Joe Bloggs</h4>
              <hr/>
              <p class="article-intro">Etiam no ipsum nec tellus iaculis convallis. Nulla ac augue eget risus porttitor aliquest sed elementum neque. Pellentesque nibh nulla, interdum eget pellentesque eget, tempus sit amet ante.</p>
              <p class="article-paragraph">Integer nec sapien purus . Nulla non linero id tortor volutpat egestas no vitae risus. 
              Nullam aliquet porttitor massa, in pharetra est dapibus... <a href="test-article-title.php" alt="go to article">read the full article &gt;</a></p>
            <!-- </div> -->
          </article>
        
        </div>          
      </main>
    </div>
  </section>