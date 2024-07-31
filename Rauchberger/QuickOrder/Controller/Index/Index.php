<?php
namespace Rauchberger\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Catalog\Model\ProductFactory;


class Index extends Action
{
    protected $jsonFactory;
    protected $productFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        ProductFactory $productFactory
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $sku = $this->getRequest()->getParam('sku');
        $response = ['success' => false];

        if ($sku) {
            $product = $this->productFactory->create()->loadByAttribute('sku', $sku);
            if ($product) {
                try {
                    $cart = $this->_objectManager->get(\Magento\Checkout\Model\Cart::class);
                    $cart->addProduct($product, ['qty' => 1]);
                    $cart->save();
                    $response['success'] = true;
                } catch (\Exception $e) {
                    $response['error'] = $e->getMessage();
                }
            } else {
                $response['error'] = __('Product not found.');
            }
        } else {
            $response['error'] = __('SKU parameter is required.');
        }

        $resultJson = $this->jsonFactory->create();
        return $resultJson->setData($response);
    }
}

?>