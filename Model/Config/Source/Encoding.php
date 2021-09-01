<?php
namespace MageReactor\SalesQRCode\Model\Config\Source;

use MageReactor\SalesQRCode\ViewModel\SalesQR;

class Encoding implements \Magento\Framework\Data\OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => SalesQR::ENCODING_UTF, 'label' => __('UTF-8')],
            ['value' => SalesQR::ENCODING_SHIFT_JIS, 'label' => __('Shift_JIS')],
            ['value' => SalesQR::ENCODING_ISO, 'label' => __('ISO-8859-1')]
        ];
    }
}
