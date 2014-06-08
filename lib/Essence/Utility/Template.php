<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Utility;



/**
 *	A simple template compiler.
 *
 *	@package Essence.Utility
 */

class Template {

	/**
	 *	Compiles the given template.
	 *
	 *	@param string $template Template.
	 *	@param array $variables Variables.
	 *	@return string Compiled template.
	 */

	public static function compile( $template, array $variables ) {

		return preg_replace_callback(
			'/:(?<variable>[a-z0-9_]+)/i',
			function( $matches ) use ( $variables ) {
				return isset( $variables[ $matches['variable']])
					? $variables[ $matches['variable']]
					: $matches[0];
			},
			$template
		);
	}
}
