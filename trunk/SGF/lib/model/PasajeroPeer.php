<?php


/**
 * Skeleton subclass for performing query and update operations on the 'pasajero' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 05/09/10 10:59:25
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class PasajeroPeer extends BasePasajeroPeer {


    static public function getLuceneIndex()
{
  ProjectConfiguration::registerZend();
  $index = self::getLuceneIndexFile();
  if (file_exists($index))
  {
    return Zend_Search_Lucene::open($index);

  }
  else
  {
      return Zend_Search_Lucene::create($index);

  }
}

static public function getLuceneIndexFile()
{
  return sfConfig::get('sf_data_dir').'\pasajero.'.sfConfig::get('sf_environment').'.index';
}



static public function getForLuceneQuery($query)
{
//  $hits = self::getLuceneIndex()->find($query);
//  $pks = array();
//  foreach ($hits as $hit)
//  {
//    $pks[] = $hit->pk;
//  }
  $criteria = new Criteria();
  $criteria->add(self::NOMBRE, '%'.$query.'%', Criteria::LIKE);
//  $criteria->setLimit(20);

  return self::doSelect($criteria);
}

public static function doDeleteAll($con = null)
{
  if (file_exists($index = self::getLuceneIndexFile()))
  {
    sfToolkit::clearDirectory($index);
    rmdir($index);
  }

  return parent::doDeleteAll($con);
}

} // PasajeroPeer
