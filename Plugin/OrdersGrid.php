<?php

namespace Onecode\Base\Plugin;

use Magento\Framework\Data\Collection;
use Magento\Framework\View\Element\UiComponent\DataProvider\CollectionFactory;
use Onecode\Base\Helper\Config;
class OrdersGrid
{

    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    /**
     * @param CollectionFactory $subject
     * @param Collection $result
     * @param string $requestName
     * @return Collection
     */
    public function afterGetReport(CollectionFactory $subject, Collection $result, $requestName): Collection
    {
        if ($requestName !== 'sales_order_grid_data_source') {
            return $result;
        }
        if(!$this->config->isModuleOutputEnabled('Onecode_TaxydromikiVoucherCreator') &&
            !$this->config->isModuleOutputEnabled('Onecode_SpeedexVoucherCreator')) {
            return $result;
        }

        if ($result->getMainTable() === $result->getResource()->getTable('sales_shipment_grid')) {
            $storesTable = $result
                ->getResource()
                ->getTable('store');
            $result->getSelect()->joinLeft(
                ['st' => $storesTable],
                'st.store_id = main_table.store_id',
                ["website_id"]
            );
            $result->getSelect()->group('main_table.entity_id');
        }
        return $result;
    }
}
