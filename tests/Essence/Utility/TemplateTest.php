<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence\Utility;

use PHPUnit_Framework_TestCase;



/**
 *	Test case for Template.
 */

class TemplateTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 */

	public function testCompile( ) {

		$template = Template::compile( 'Hello :who!', [
			'who' => 'world'
		]);

		$this->assertEquals( 'Hello world!', $template );
	}
}
