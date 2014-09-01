<?php

namespace Alfred\InsightBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
  private function getSiteList($site)
  {
    $db = $this->get('database_connection');
    $sites = $db->fetchAll('SELECT * FROM sites WHERE database_name LIKE "' . $site . '"');

    foreach ($sites as &$site) {
      $site['modules'] = $db->fetchAll('SELECT * FROM modules JOIN modules_to_sites ON modules.id = modules_to_sites.id WHERE modules_to_sites.site_id = ' . $site['id']);
    }

    return $sites;
  }

  private function getModuleList($module)
  {

  }

  public function indexAction(Request $request)
  {
    $site = $request->query->get('site');
    $module = $request->query->get('module');

    return $this->render('AlfredInsightBundle:Dashboard:index.html.twig', array(
      'sites' => $this->getSiteList($site),
      'modules' => $this->getModuleList($module),
    ));
  }
}
