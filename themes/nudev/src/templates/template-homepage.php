<?php

	/* Template Name: Homepage */

	get_header();

?>

	<main id="nu__homepage" role="main" aria-label="content" class="smooth">

		<?php // get_template_part('loops/loop-homepagestories'); ?>



		<div id="nu__stories">


			<div id="prev" title="Click here to go to the previous slide">
		    <svg viewbox="0 0 100 100">
		      <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)" />
		   </svg>
		  </div>
		  <div id="next" title="Click here to go to the next slide">
		    <svg viewbox="0 0 100 100">
		      <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform="translate(85,100) rotate(180)" />
		    </svg>
		  </div>


			<section class="panel-1">
	      <article style="background-image: url('/wp-content/uploads/homepagetest/exp_learn.jpg');" >
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>this will be the caption for Experiental Learning -></p>
	        </a>
	        <h2>Experiental Learning</h2>
	      </article>

	      <article style="background-image: url('/wp-content/uploads/homepagetest/lifelong_learn.jpg');">
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>this will be the caption for Lifelong Learning -></p>
	        </a>
	        <h2>Lifelong Learning</h2>
	      </article>

	      <article style="background-image: url('/wp-content/uploads/homepagetest/leadership.jpg');">
	        <a href="/university-administration" title="Click here now to learn more">
	          <p>this will be the caption for Leadership -></p>
	        </a>
	        <h2>Leadership</h2>
	      </article>

	      <article class="nu__block-rotator">
	        <a href="/northeastern-experience" style="background-image: url('/wp-content/uploads/homepagetest/image-1.jpg');">
	          <h2>Caption 1</h2>
	        </a>
	        <div class="slider_prev" title="Click here to view the previous slide">
	           <svg viewbox="0 0 100 100">
	             <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)" />
	          </svg>
	        </div>
	        <div class="slider_next" title="Click here to view the next slide">
	          <svg viewbox="0 0 100 100">
	            <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform="translate(85,100) rotate(180) " />
	          </svg>
	         </div>
	        <div class="nu__rotator-logo"></div>
	      </article>

	      <article style="background-image: url('/wp-content/uploads/homepagetest/research.jpg');">
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>this will be the caption for Research -></p>
	        </a>
	        <h2>Research</h2>
	      </article>

	    </section>

	    <section class="panel-2">
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>2-1</h2>
	      </article>
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>2-2</h2>
	      </article>
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>2-3</h2>
	      </article>
	      <article class="nu__block-rotator">
	        <a href="javascript:void(0)" style="background-image: url('/wp-content/uploads/homepagetest/image-1.jpg');">
	          <!-- <h2>Caption 1</h2> -->
	        </a>
	        <!-- <div class="slider_prev" title="Click here to view the previous slide"> < </div>
	        <div class="slider_next" title="Click here to view the next slide"> > </div> -->
	        <div class="nu__rotator-logo"></div>
	      </article>
	    </section>


	    <section class="panel-3">
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>3-1</h2>
	      </article>
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>3-2</h2>
	      </article>
	      <article class="nu__block-rotator">
	        <a href="javascript:void(0)">

	        </a>
	        <!-- <div class="slider_prev" title="Click here to view the previous slide"> < </div>
	        <div class="slider_next" title="Click here to view the next slide"> > </div> -->
	        <div class="nu__rotator-logo"></div>
	      </article>
	      <article>
	        <a href="/northeastern-experience" title="Click here now to learn more">
	          <p>Caption -></p>
	        </a>
	        <h2>3-4</h2>
	      </article>
	    </section>

		</div>



	</main>

<?php get_footer(); ?>
