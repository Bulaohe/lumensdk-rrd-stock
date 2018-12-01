<?php

namespace Ssdk\Stock;

use Illuminate\Support\Facades\Facade;

/**
 * Class StockServiceFacade
 *
 * {@inheritdoc}
 *
 * 库存服务门面
 *
 * @package Ssdk\Stock
 */
class StockServiceFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        //返回依赖注入名称
        return StockService::class;
    }
}
