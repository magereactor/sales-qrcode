<?php
namespace MageReactor\SalesQRCode\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\UrlInterface;
use Magento\Sales\Model\OrderRepositoryFactory;

class SalesQR implements ArgumentInterface
{
    const INCREMENT_ID = 1;
    const ORDER_URL = 2;
    const ORDER_PRINT_URL = 3;

    const ENCODING_UTF = 'UTF-8';
    const ENCODING_SHIFT_JIS = 'Shift_JIS';
    const ENCODING_ISO = 'ISO-8859-1';

    const XML_PATH_SALES_QR_CODE = 'salesqrcode/general/';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    protected $orderRepository;

    /**
     * SalesQR constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        UrlInterface $url,
        ScopeConfigInterface $scopeConfig,
        OrderRepositoryFactory $orderRepository
    ){
        $this->url = $url;
        $this->scopeConfig = $scopeConfig;
        $this->orderRepository = $orderRepository->create();
    }

    public function getGeneralConfig($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SALES_QR_CODE.$field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getQrCodeUrl($data = null)
    {
        if($data) {
            $data = $this->getQRCodeData($data);
            return 'https://chart.googleapis.com/chart?chs='.$this->getGeneralConfig('width').'x'.$this->getGeneralConfig('height').'&cht=qr&chl='.$data.'&choe='.$this->getGeneralConfig('encoding');
        }
        return null;
    }

    private function getQRCodeData($data)
    {
        if($this->getGeneralConfig('qr_data') == self::ORDER_URL) {
            return $this->url->getUrl('sales/order/view', array('order_id' => $data));
        } elseif($this->getGeneralConfig('qr_data') == self::ORDER_PRINT_URL) {
            return $this->url->getUrl('sales/order/print', array('order_id' => $data));
        }

        try {
            $data = $this->orderRepository->get($data)->getIncrementId();
        } catch(\Exception $e) {
            return null;
        }
        return $data;
    }
}
