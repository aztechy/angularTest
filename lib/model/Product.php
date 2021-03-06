<?php


/**
 * Skeleton subclass for representing a row from the 'products' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Nov  3 10:02:49 2012
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Product extends BaseProduct {

	/**
	 * Initializes internal state of Product object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	public function getPrice($criterias = null) {
	  if (is_null($criterias)) {
	    return parent::getPrice();
	  } else {
	    $hit = false;
	    foreach ($criterias as $c) {
  	    $customPrices = $this->getCustomProductPrices($c);  
  	    if (!empty($customPrices)) {
  	      $hit = true;
  	      break;
  	    }
	    }
  	  
  	  if (!$hit) {
  	    return parent::getPrice();
  	  } else {
  	    return current($customPrices)->getPrice();
  	  }	    
	  }
	}

} // Product
