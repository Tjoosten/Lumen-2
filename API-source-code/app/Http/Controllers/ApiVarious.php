<?php

namespace App\Http\Controllers;

/**
 * Controller for various API outputs.
 *
 * @author  Tim Joosten
 * @license MIT
 * @version 1.0.0
 * @package API
 */

Class ApiVarious extends Controller {

  /**
   * frontapge controller & returns API info
   *
   * @access public
   * @link   GET /{parse}
   * @return Response.
   */
  public function frontpage() {

    // Set constant to variables.
    $information = [
        'name'      => ApiVarious::NAME,
        'version'   => ApiVarious::VERSION,
        'developer' => ApiVarious::DEVELOPER,
        'email'     => ApiVarious::EMAIL,
        'git'       => ApiVarious::GIT,
        'license'   => ApiVarious::LICENSE,
        'docsCode'  => ApiVarious::DOCS_CODE,
        'docsUsage' => ApiVarious::DOCS_USAGE,
      ];

      return response()->json([
        'Name'           => $information['name'],
        'Version'        => $information['version'],
        'Developer'      => $information['developer'],
        'Email'          => $information['email'],
        'GitHub'         => $information['git'],
        'license'        => $information['license'],
        'documentation'  => [ $information['docsCode'], $information['docsUsage'] ],
      ], 200)->header('Content-Type', 'application/json');
  }
}
