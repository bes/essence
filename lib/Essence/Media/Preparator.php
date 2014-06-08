<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Media;

use Essence\Media;
use Essence\Utility\Template;



/**
 *
 *
 *	@package Essence.Media
 */

class Preparator {

	/**
	 *
	 */

	const generic = 'generic';



	/**
	 *
	 */

	protected $_defaults = [
		'width' => 640,
		'height' => 490,
		'templates' => [
			'photo' => '<img src=":url" alt=":description" width=":width" height=":height" />',
			'video' => '<iframe src=":url" width=":width" height=":height" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen />',
			self::generic => '<a href=":url" alt=":description">:title</a>'
		]
	];



	/**
	 *	Builds an HTML code from the given media's properties to fill its
	 *	'html' property.
	 *
	 *	@param Essence\Media $Media A reference to the Media.
	 *	@param array $options Options.
	 */

	public function complete( Media $Media, array $options = [ ]) {

		if ( $Media->has( 'html' )) {
			return;
		}

		$options += $this->_defaults;

		$Media->setDefault( 'title', $Media->get( 'url' ));
		$Media->setDefault( 'description', $Media->get( 'title' ));
		$Media->setDefault( 'width', $options['width']);
		$Media->setDefault( 'height', $options['height']);

		$type = $Media->get( 'type' );

		if ( !isset( $options['templates'][ $type ])) {
			$type = self::generic;
		}

		$Media->set( 'html', Template::compile(
			$options['templates'][ $type ],
			$Media->properties( )
		));
	}
}
