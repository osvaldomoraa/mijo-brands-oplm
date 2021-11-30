<?php 

add_action( 'cmb2_init', 'recommendations_register_meta_boxes' );
function recommendations_register_meta_boxes() {

	$prefix = 'rmd_mb_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'recommendation-main',
		'title'        => __( 'Detalles de la recomendacion', 'cmb2' ),
		'object_types' => array( 'recommendation' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Tipo de recomensacion', 'cmb2' ),
		'id' => $prefix . 'recommendation_type',
		'type' => 'select',
		'options' => array(
			'video' => __( 'Video', 'cmb2' ),
			'articulo' => __( 'Artículo', 'cmb2' ),
		),
	) );	

	$cmb->add_field( array(
		'name' => __( 'Nombre del autor', 'cmb2' ),
		'id' => $prefix . 'author_name',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'URL externa', 'cmb2' ),
		'id' => $prefix . 'external_url',
		'type' => 'text_url',
	) );
}