<?php
/**
 * SimpleXMLExtended.php
 *
 * @copyright Copyright © 2021 Onecode  All rights reserved.
 * @author    Spyros Bodinis {spyros@onecode.gr}
 */

namespace Onecode\Base\Helper;

use Magento\Framework\Simplexml\Element;

/**
 * Class SimpleXmlExtended
 * @package Onecode\ShopFlixConnector\Library
 */
class SimpleXMLExtended extends Element
{
    public function addCData($cdata_text)
    {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($cdata_text));
    }
}
