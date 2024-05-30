<?php
/**
 * @copyright Copyright (c) 2023 - present Onecode P.C. All rights reserved.
 * @author Onecode P.C. {support@onecode.gr}
 */

namespace Onecode\Base\Ui\Component\Listing\Columns\Website;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Store\Model\ResourceModel\Website\CollectionFactory as WebsiteCollectionFactory;

class Options implements OptionSourceInterface
{

    protected $options = null;
    private $collectionFactory;

    public function __construct(WebsiteCollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray(): array
    {
        if ($this->options === null) {
            $options = $this->collectionFactory->create()->toOptionArray();
            $this->options = $options;
        }
        return $this->options;

    }
}
