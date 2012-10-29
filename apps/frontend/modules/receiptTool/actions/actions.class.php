<?php

/**
 * receiptTool actions.
 *
 * @package    angularTest
 * @subpackage receiptTool
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class receiptToolActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeGetBillItems(sfWebRequest $request)
  {
    $billItems = array(
      array(
        'name' => 'Chicken Soup',
        'price' => 9,
        'done' => false,
      ),
      array(
        'name' => 'Turkey Sandwhich',
        'price' => 12,
        'done' => false,
      )
    );
    
    return $this->renderText(json_encode($billItems));
  }
}
