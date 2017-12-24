<?php

namespace Tienlh\TokyoTyrantDriver\Session;

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
        $this->client = new TokyoTyrant(
            $config['host'], // HOST
            $config['port'], // PORT
            $config['options']// OPTIONS
        );

        if (isset($options['gc_maxlifetime'])) {
            $this->ttl = (int) $options['gc_maxlifetime'];
        } else {
            $this->ttl = ini_get('session.gc_maxlifetime');
        }
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
    public function destroy(string $session_id)
    {
        //
    }

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
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function read($session_id)
    {
        return $this->client->get($session_id);
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
