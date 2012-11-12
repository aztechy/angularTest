<?php

/**
 * todo actions.
 *
 * @package    angularTest
 * @subpackage todo
 * @author     Neon Engfer
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class todoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeSanta(sfWebRequest $request)
  {
    
  }
  
  public function executeSantaData(sfWebRequest $request) 
  {
    if ($request->isMethod('get')) {
      $c = new Criteria();
      $santas = SecretSantaPeer::doSelect($c);
      $participants = array();
      foreach ($santas as $santa) {
        $participants[] = array(
          'id' => $santa->getId(), 
          'name' => $santa->getName(), 
          'matched' => $santa->getMatched(), 
          'matchName' => $santa->getMatchName()
        );
      }

      return $this->renderText(json_encode($participants));      
    } else if ($request->isMethod('post')) {
      $name = $request->getParameter('name'); 
      $this->forward404If(empty($name));
      
      $secretSanta = new SecretSanta();
      $secretSanta->setName($name);
      $secretSanta->save();
      
      $return = array('status' => 'success', 'id' => $secretSanta->getId());
      return $this->renderText(json_encode($return));
    } else if ($request->isMethod('put')) {
      $id = $request->getParameter('id');
      $mid = $request->getParameter('mid');
      $matchName = $request->getParameter('matchName');
      $matched = $request->getParameter('matched');
      
      $person = SecretSantaPeer::retrieveByPk($id);
      $person->setMatchName($matchName);
      $matchPerson = SecretSantaPeer::retrieveByPk($mid);
      $matchPerson->setMatched(true);
      
      $person->save();
      $matchPerson->save();
      
      $return = array('status' => 'success', 'id' => $person->getId());
      return $this->renderText(json_encode($return));
    } else if ($request->isMethod('delete')) {
      $id = $request->getParameter('id');
      if (empty($id)) {
        // Delete the whole table!!!  Kind of wreckless.
        $count = SecretSantaPeer::doDeleteAll();
        return $this->renderText(json_encode(array('status' => 'success', 'count' => $count)));
      } else {
        $santa= SecretSantaPeer::retrieveByPk($id);
        $santa->delete();
        return $this->renderText(json_encode(array('status' => 'success', 'count' => 1)));
      }
    }
    
    return sfView::NONE;
  }
}
