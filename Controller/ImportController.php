<?php

namespace Alfred\InsightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImportController extends Controller
{

  /**
   * Get the sites healthcheck data.
   *
   * @return array
   *   Converted JSON array.
   */
  public function getSitesData()
  {
    $file = \file_get_contents(\dirname(__FILE__) . '/../../../../stub.json');
    return json_decode($file, TRUE);
  }

  /**
   * Adds a site to the database if it has not been added.
   *
   * @param array $site
   *   An array of site information.
   * @param database_connection $db
   *   The DB connection that gets
   *
   * @return integer
   *   The ID of the site.
   */
  private function addsite($site, $db)
  {
    $added = $db->fetchAll("SELECT id FROM sites WHERE url = '{$site['name']}'");

    if ((bool) $added) {
      return array_shift($added);
    }

    $db->insert('sites', array(
      'name' => $site['name'],
      'url' => $site['url'],
      'database_name' => 'fcau',
    ));

    return $db->lastInsertId();
  }

  /**
   * Make an API request to attempt to get a modules version.
   *
   * @param string $module_name
   *   A module name.
   *
   * @return string
   *   The latest module version from Drupal.org.
   */
  private function getDrupalVersion($module_name) {
    return '7.x-1.0';
  }

  public function processAction()
  {
    // Get the database connection so we can make direct queries to the database
    // to insert our data.
    $db = $this->get('database_connection');
    $data = $this->getSitesData();

    // Add the site if it is not present in the database.
    $site_id = $this->addsite(array(
      'url' => 'http://www.flightcentre.com.au',
      'name' => 'Flight Centre AU',
    ), $db);

    foreach ($data as $module) {
      $enabled = $module['status'];
      unset($module['status']);

      // Attempt to get the latest module versions from Drupal.org.
      $module['drupal_version'] = $this->getDrupalVersion($module['alias']);
      $_module = $db->insert('modules', $module);

      // Get the modules ID.
      $module_id = $db->lastInsertId();

      $db->insert('modules_to_sites', array(
        'site_id' => $site_id,
        'module_id' => $module_id,
        'status' => $enabled,
      ));
    }

    echo json_encode(array('status' => 'success', 'messsage' => 'Successfully saved ' . $site_id));
    exit;
  }

}
