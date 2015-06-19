<div class="widget-school-years">
	<h3 class="widget-title"><?php echo $instance['widget_school_years_title']; ?></h3>
	<ul>
	<?php		
	$dateDuJour = date("Ymd");
	$anneeDeRentree = date("Y");
	// Si on est avant le 01 aout
	if( $dateDuJour < ($anneeDeRentree."0801")):
		$anneeDeRentree = $anneeDeRentree-1;
	endif;
	if ($instance['widget_school_years_hide_current'] == "1") :
		$anneeDeRentree--;
	endif;
	$unAffichage = false;
	for ( $year_index = 0 ; $year_index < $instance['widget_school_years_nb_of_yers'] ; $year_index++ )
	{
		// WP_Query arguments
		$args = array (
			'date_query' => array(
				array(
					'after'     => array(
						'year'  => $anneeDeRentree,
						'month' => 7,
						'day'   => 31,
					),
					'before'    => array(
						'year'  => $anneeDeRentree+1,
						'month' => 8,
						'day'   => 1,
					),
					'inclusive' => true,
				),
			),
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'order'                  => 'ASC',
			'orderby'                => 'date',
		);
		// The Query
		//$postes_in_school_year = new WP_Query( $args );
		$myposts = get_posts( $args );
		if(count($myposts)>0) :
		$unAffichage = true;
		?>
		<li>
			<a href="<?php echo get_school_year_link($anneeDeRentree); ?>"><?php echo $anneeDeRentree; ?> - <?php echo $anneeDeRentree+1; ?></a>
		</li>
		<?php
		endif;
		wp_reset_postdata();
		$anneeDeRentree--;
	}
	if ($unAffichage == false) :
		?>
		<li>Aucune année scolaire à afficher</li>
		<?php
	endif;
	?>
	</ul>
</div>