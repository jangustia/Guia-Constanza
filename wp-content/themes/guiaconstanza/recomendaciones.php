<?php
/**
 * Template Name: Recomendaciones
 */

	get_header();

	$mysqli = new mysqli("localhost", "root", "root", "guia_constanza");
	// $mysqli = new mysqli("host", "user_name", "user_password", "database_name");
	// $mysqli = new mysqli("localhost", "jgarcia_wrdp1", "9kR089vVZxI9", "jgarcia_wrdp1");
	
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL! " . mysqli_connect_error();
	}

	$query = "SELECT * FROM `recommendations` ORDER BY `recommendations`.`id` DESC";
	$result = mysqli_query($mysqli, $query);
	$recommendations = array();

	while ($set = mysqli_fetch_object($result)) {
		array_push($recommendations, $set);
	}

	$mysqli->close();
	
	//print_r($recommendations);
?>

	<h1 id="subheader" class="wrap">
		<span><?php the_title(); ?></span>
		<div class="fullbanner to_right">
			<script type="text/javascript">
				<!--
					google_ad_client = "ca-pub-8397939586383038";
					/* 468x60, creado 1/06/10 */
					google_ad_slot = "4670795372";
					google_ad_width = 468;
					google_ad_height = 60;
				//-->
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
		</div>
	</h1>

	<div id="container" class="wrap" role="main">
		<div id="main_content">
			<ul class="breadcrumbs">
				<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
				<li>Recomendaciones</li>
			</ul>

			<div id="recommend">
				<section>
					<h2>Conozca las recomendaciones de quienes ya han visitado Constanza. <strong>Animate a compartir tu experiencia!</strong></h2>
					<ul class="all_recomendations">
						<?php foreach ($recommendations as $recommendation) : ?>
							<li>
								<div class="circled">
									<div class="inside">
										<img src="https://graph.facebook.com/<?php echo $recommendation->user_id; ?>/picture?width=50&height=50" alt="Recommend" />
									</div>
								</div>
								<span class="tip"></span>
								<div class="box">
									<h3><?php echo $recommendation->name; ?></h3>
									<p><?php echo $recommendation->post_info; ?></p>
									<span><?php echo time_passed(strtotime($recommendation->post_time)); ?></span>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					
					<div class="pages_area">
						<ul class="pagination">
							
						</ul>

						<a class="add_reco" href="#"><span>Añadir Recomendación</span></a>
					</div><!-- .pages_area -->
				</section>
			</div> <!-- #recommend -->
		</div><!-- #main_content -->

		<aside id="side_content" class="sideinfo">
			<?php get_sidebar("recommend"); ?>
			<div class="places-list">
				<?php // Get "Atractivos" section
				get_sidebar( 'atractivos' ); ?>
			</div><!-- .places-list -->

			<div class="fb_like_box">
				<div class="fb-like-box" data-href="https://www.facebook.com/guiaconstanza" data-width="406" data-show-faces="true" data-stream="false" data-show-border="true" data-header="true"></div>
			</div>
		</aside>

<?php get_footer(); ?>