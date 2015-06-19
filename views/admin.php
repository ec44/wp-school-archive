<p>
	<label for="<?php echo $this->get_field_id( 'widget_school_years_title' ); ?>">Titre :</label>
	<input type="text" id="<?php echo $this->get_field_id( 'widget_school_years_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_school_years_title' ); ?>" value="<?php echo $instance['widget_school_years_title']; ?>" style="width:100%;" />
</p>

<p>
	<?php
		$checked = " ";
		if($instance['widget_school_years_hide_current'] == "1"){
			$checked = " checked='checked' ";
		}
	?>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'widget_school_years_hide_current' ); ?>" name="<?php echo $this->get_field_name( 'widget_school_years_hide_current' ); ?>" value="1" <?php echo $checked;?> />
	<label for="<?php echo $this->get_field_id( 'widget_school_years_hide_current' ); ?>">Cacher l'année en cours</label>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'widget_school_years_nb_of_yers' ); ?>">Nombre d'années scolaires :</label>
	<input type="number" id="<?php echo $this->get_field_id( 'widget_school_years_nb_of_yers' ); ?>" name="<?php echo $this->get_field_name( 'widget_school_years_nb_of_yers' ); ?>" value="<?php echo $instance['widget_school_years_nb_of_yers']; ?>"/>
</p>