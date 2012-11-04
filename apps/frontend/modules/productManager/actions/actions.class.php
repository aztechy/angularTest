<?php

/**
 * productManager actions.
 *
 * @package    angularTest
 * @subpackage productManager
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productManagerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }
  
  public function executeManageProducts(sfWebRequest $request)
  {
    $action = $request->getParameter('do', null);
    if (is_null($action)) {
      $c = new Criteria();

      $products = ProductPeer::doSelect($c);

      $pubProducts = $this->buildProducts($products);

      return $this->renderText(json_encode($pubProducts));
    } else {
      switch ($action) {
        case 'getCategories':
          return $this->getCategories();
          break;
        case 'getProducts':
          return $this->getProducts($request);
      }
    }
  }
  
  public function buildProducts($products, $criteria = null)
  {
    $pubProducts = array();
    
    if (is_null($criteria)) {
      $priceCriteria = null;  
    } else {
      $priceCriteria = $criteria;
    }

    foreach ($products as $k => $product) {
      $pubProducts[$k]['id'] = $product->getId();
      $pubProducts[$k]['price'] = $product->getPrice($priceCriteria);
      $pubProducts[$k]['name'] = $product->getName();
    }    
    return $pubProducts;
  }
  
  public function getProducts(sfWebRequest $request) 
  {
    $products = ProductPeer::doSelect(new Criteria);
    $categoryId = $request->getParameter('category');
    $subcategoryId = $request->getParameter('subcategory');
    
    $subcriteria = new Criteria;
    $subcriteria->add(CustomProductPricePeer::FIELD_ID, $subcategoryId);
    
    $parentCriteria = new Criteria;
    $parentCriteria->add(CustomProductPricePeer::FIELD_ID, $categoryId);
    $criterias = array(
      $subcriteria,
      $parentCriteria
    );
    return $this->renderText(json_encode($this->buildProducts($products, $criterias)));
    
  }
  
  public function getCategories()
  {
    $c = new Criteria();
    $c->add(FieldPeer::FIELD_TYPE_ID, array(1,2), Criteria::IN);
    $fields = FieldPeer::doSelect($c);
    
    $pubFields = array();
    foreach($fields as $key => $field) {
      if (is_null($field->getParentId())) {
        $pubFields[$field->getId()] = array('parentName' => $field->getToken());
      } else {
        $pubFields[$field->getParentId()]['sub'][] =  array('id' => $field->getId(), 'token' => $field->getToken());
      }
    }
    
    return $this->renderText(json_encode($pubFields));
  }
}

