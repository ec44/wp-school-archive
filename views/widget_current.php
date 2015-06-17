<div class="widget-school-years">
	<div class="widget-school-years-title"><h1 class="widget-title"><?php echo $instance['widget_current_school_year_title']; ?></h1></div>
	<div class="widget-school-years-list">
		<ul>
		<?php
		$trans = array (
			'January'   => 'janvier',
			'February'  => 'février',
			'March'     => 'mars',
			'April'     => 'avril',
			'May'       => 'mai',
			'June'      => 'juin',
			'July'      => 'juillet',
			'August'    => 'août',
			'September' => 'septembre',
			'October'   => 'octobre',
			'November'  => 'novembre',
			'December'  => 'décembre',
		);
		$dateDuJour = date("Ymd");
		$anneeDeRentree = date("Y");
		// Si on est avant le 01 aout
		if( $dateDuJour < ($anneeDeRentree."0801")):
			$anneeDeRentree = $anneeDeRentree-1;
		endif;
		$dansLAnneeScolaire = true;
		$deltaMois = 0;
		while($dansLAnneeScolaire):
			$mktDebutMois = mktime(0, 0, 0, date("m")-$deltaMois, 1,   date("Y"));
			// WP_Query arguments
			$args = array (
				'date_query' => array(
					array(
						'after'     => array(
							'year'  => date("Y", $mktDebutMois),
							'month' => date("n", $mktDebutMois), //Mois sans les zéros initiaux
							'day'   => date("j", $mktDebutMois), //Jour du mois sans les zéros initiaux
						),
						'before'    => array(
							'year'  => date("Y", $mktDebutMois),
							'month' => date("n", $mktDebutMois),
							'day'   => date("t", $mktDebutMois), //Nombre de jours dans le mois
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
			$postes_in_school_month = new WP_Query( $args );
			if ($postes_in_school_month->have_posts() ):
			?>
			<li>
				<a href="<?php echo get_month_link(date("Y", $mktDebutMois),date("m", $mktDebutMois));?>"><?php echo $trans[date("F", $mktDebutMois)]; ?> <?php echo date("Y", $mktDebutMois); ?></a>
			</li>
			<?php
			endif;
			wp_reset_postdata();
			$deltaMois++;
			if(date("Ymd", $mktDebutMois) <= $anneeDeRentree."0801"){ // Si on est avant le premier aout de la rentrée scolaire
				$dansLAnneeScolaire = false;
			}
		endwhile;
		?>
		</ul>
	</div>
</div>