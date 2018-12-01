<?php

namespace Ssdk\Stock;

class Log
{
    /**
     * @var 日志目录
     */
    private $log_path;

    /**
     * @var 日志名称
     */
    private $log_name;

    /**
     * @var 日志开关
     */
    private $switch;

    /**
     * @return 日志目录
     */
    public function getLogPath()
    {
        return $this->log_path;
    }

    /**
     * @param 日志目录 $log_path
     * @return $this
     */
    public function setLogPath($log_path)
    {
        $this->log_path = $log_path;
        return $this;
    }

    /**
     * @return 日志名称
     */
    public function getLogName()
    {
        return $this->log_name;
    }

    /**
     * @param 日志名称 $log_name
     * @return $this
     */
    public function setLogName($log_name)
    {
        $this->log_name = $log_name;
        return $this;
    }

    /**
     * 获取日志开关
     *
     * @return 日志开关
     */
    public function getSwitch()
    {
        return $this->switch;
    }

    /**
     * 设置日志开关
     *
     * @param 日志开关 $switch
     * @return $this
     */
    public function setSwitch($switch)
    {
        $this->switch = $switch;
        return $this;
    }

    public function __construct($config)
    {
        $this->setLogPath($config['log_path']);
        $this->setLogName($config['log_name']);
        $this->setSwitch(boolval($config['log_switch']));
    }

    /**
     * 写日志
     *
     * @param $data 日志数据
     */
    public function write($data)
    {
        //开关关闭时不记录日志
        if (!$this->getSwitch()) {
            return;
        }

    }
}
