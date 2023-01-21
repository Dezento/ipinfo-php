<?php

namespace ipinfo\ipinfo\cache;

use Illuminate\Support\Facades\Cache;

/**
 * Default implementation of the CacheInterface. Provides in-memory caching.
 */
class DefaultCache implements CacheInterface
{


  public $ttl;

  public function __construct(int $ttl)
  {
    $this->ttl = $ttl;
  }

  /**
   * Tests if the specified IP address is cached.
   * @param  string  $ip_address IP address to lookup.
   * @return boolean Is the IP address data in the cache.
   */
  public function has(string $name)
  {
    return Cache::has($name);
  }

  /**
   * Set the IP address key to the specified value.
   * @param string $ip_address IP address to cache data for.
   * @param mixed $value Data for specified IP address.
   */
  public function set(string $name, $value)
  {
    Cache::put($name, $value, $this->ttl);
  }

  /**
   * Get data for the specified IP address.
   * @param  string $ip_address IP address to lookup in cache.
   * @return mixed IP address data.
   */
  public function get(string $name)
  {
    return Cache::get($name);
  }


}
