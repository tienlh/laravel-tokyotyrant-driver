<?php

namespace Tienlh\Session;

class TokyoTyrantHandler implements \SessionHandlerInterface
{

    protected $client;
    protected $config;
    protected $ttl;

    /**
     * Create a new session handler using TokyoTyrant APIs
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function destroy(string $session_id) {}

    /**
     * {@inheritdoc}
     */
    public function gc($maxlifetime)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function open($save_path, $session_name)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function read($session_id)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function write($session_id, $session_data)
    {
        return true;
    }

    public function getMaxLifeTime()
    {
        return $this->ttl;
    }
}
