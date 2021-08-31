<?php
namespace MageReactor\SalesQRCode\Model\Config\Source;

use MageReactor\SalesQRCode\ViewModel\SalesQR;

class Data implements \Magento\Framework\Data\OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => SalesQR::INCREMENT_ID, 'label' => __('Add Order Increment ID')],
            ['value' => SalesQR::ORDER_URL, 'label' => __('Add Order Url')],
            ['value' => SalesQR::ORDER_PRINT_URL, 'label' => __('Print Order Url')]
        ];
    }
}
