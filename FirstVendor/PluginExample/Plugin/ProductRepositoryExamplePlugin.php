<?php declare(strict_types=1);

namespace FirstVendor\PluginExample\Plugin;

use Psr\Log\LoggerInterface;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductRepositoryExamplePlugin {
    private $logger;

    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    public function beforegetById (
        ProductRepositoryInterface $subject,
        $productId,
        $editMode = false,
        $storeId = null,
        $forceReload = false
    ) {
        $this->logger->info('Before plugin is called ' . $productId);
        return [$productId, $editMode, $storeId, $forceReload];
    }
    public function aroundgetById (
        ProductRepositoryInterface $subject,
        callable $proceed,
        $productId,
        $editMode = false,
        $storeId = null,
        $forceReload = false
    ) {
        $this->logger->info('Around before getById ' . $productId);
        $result = $proceed($productId, $editMode, $storeId, $forceReload);
        $this->logger->info('Around after getById ' . $productId);
        return $result;
    }
    public function aftergetById (
        ProductRepositoryInterface $subject,
        ProductInterface $result,
        $productId,
        $editMode = false,
        $storeId = null,
        $forceReload = false
    ) {
        $this->logger->info('After plugin is called ' . $productId);
        return $result;
    }
    
}