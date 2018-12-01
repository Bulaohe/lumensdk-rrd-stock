<?php

namespace Ssdk\Stock;

/**
 * Class StockService
 *
 * {@inheritdoc}
 *
 * 库存服务
 *
 * @package Ssdk\Stock
 */
class StockService
{
    //商品库存创建
    const SERVICE_STOCK_ADD = 'service.stock.add';
    //商品库存修改
    const SERVICE_STOCK_CHANGE = 'service.stock.change';
    //商品库存获取
    const SERVICE_STOCK_GET = 'service.stock.get';
    //商品库存删除
    const SERVICE_STOCK_DELETE = 'service.stock.delete';
    //锁定库存创建、修改、删除
    const SERVICE_STOCK_LOCK_CHANGE = 'service.stock.lock.change';
    //锁定库存获取
    const SERVICE_STOCK_LOCK_GET = 'service.stock.lock.get';

    /** @var Client */
    private $client;

    /**
     * StockService constructor.
     *
     * {@inheritdoc}
     *
     * 初始化client
     *
     */
    public function __construct()
    {
        $this->client = app(Client::class);
    }

    /**
     * 商品库存初始化
     *
     * @param array $datainfo 货品
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6886975
     */
    public function set(array $datainfo)
    {
        $datainfo = json_encode($datainfo);
        return $this->client->performRequest(self::SERVICE_STOCK_ADD, compact('datainfo'));
    }

    /**
     * 商品库存获取
     *
     * @param array $goods_ids 商品id列表
     * @param array $product_ids 指定返回的规格id列表
     * @param int $lock 是否返回锁定库存
     * @param int $has_sku 是否返回所有规格库存
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6886994
     */
    public function get(array $goods_ids, array $product_ids = [], $lock = 0, $has_sku = 0)
    {
        return $this->client->performRequest(self::SERVICE_STOCK_GET, compact(
            'goods_ids',
            'product_ids',
            'lock',
            'has_sku'
        ));
    }

    /**
     * 商品库存增减
     *
     * @param int $stock 库存
     * @param int $goods_id 商品id
     * @param string $type 修改类型 inc 增加库存 dec 减少库存
     * @param int $is_sku 是否多规格商品
     * @param int $product_id 规格id
     * @param string $remark 库存变更备注
     * @param int $scene_id 修改场景id
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887076
     */
    public function change($stock, $goods_id, $type, $is_sku = 0, $product_id = 0, $remark = '', $scene_id = 0)
    {
        $params = compact(
            'stock',
            'goods_id',
            'type',
            'is_sku',
            'product_id',
            'scene_id'
        );
        if ($remark) {
            $params['remark'] = $remark;
        }
        return $this->client->performRequest(self::SERVICE_STOCK_CHANGE, $params);
    }

    /**
     * 商品库存增加
     *
     * @param int $stock 库存
     * @param int $goods_id 商品id
     * @param int $is_sku 是否多规格商品
     * @param int $product_id 规格id
     * @param string $remark 库存变更备注
     * @param int $scene_id 修改场景id
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887076
     */
    public function incr($stock, $goods_id, $is_sku = 0, $product_id = 0, $remark = '', $scene_id = 0)
    {
        return $this->change($stock, $goods_id, 'inc', $is_sku, $product_id, $remark, $scene_id);
    }

    /**
     * 商品库存减少
     *
     * @param int $stock 库存
     * @param int $goods_id 商品id
     * @param int $is_sku 是否多规格商品
     * @param int $product_id 规格id
     * @param string $remark 库存变更备注
     * @param int $scene_id 修改场景id
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887076
     */
    public function decr($stock, $goods_id, $is_sku = 0, $product_id = 0, $remark = '', $scene_id = 0)
    {
        return $this->change($stock, $goods_id, 'dec', $is_sku, $product_id, $remark, $scene_id);
    }

    /**
     * 商品库存删除
     *
     * @param array $datainfo 货品
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887031
     */
    public function delete(array $datainfo)
    {
        $datainfo = json_encode($datainfo);
        return $this->client->performRequest(self::SERVICE_STOCK_DELETE, compact('datainfo'));
    }

    /**
     * 锁定库存修改
     *
     * @param array $data 锁定
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887128
     */
    public function changeLock(array $data)
    {
        return $this->client->performRequest(self::SERVICE_STOCK_LOCK_CHANGE, compact('data'));
    }

    /**
     * 锁定库存获取
     *
     * @param int $goods_id 商品id
     * @param string $source 业务场景
     * @param int $source_id 业务id
     * @param int $product_id 规格id
     * @return mixed
     * @throws \Exception
     * @see http://docs.corp.dodoca.com/pages/viewpage.action?pageId=6887101
     */
    public function getLock($goods_id, $source, $source_id, $product_id = 0)
    {
        $params = compact(
            'goods_id',
            'source',
            'source_id'
        );
        if ($product_id > 0) {
            $params['product_id'] = $product_id;
        }
        return $this->client->performRequest(self::SERVICE_STOCK_LOCK_GET, $params);
    }
}
