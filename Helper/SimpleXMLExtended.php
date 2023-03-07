<?php
/**
 * SimpleXMLExtended.php
 *
 * @copyright Copyright © 2021 Onecode  All rights reserved.
 * @author   Onecode P.C {support@onecode.gr}
 */

namespace Onecode\Base\Helper;

use Magento\Framework\Simplexml\Element;

class SimpleXMLExtended extends Element
{
    public function addCData($cdata_text)
    {
        $node = dom_import_simplexml($this);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection((string)$cdata_text));
    }
}
