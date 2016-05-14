<?php

namespace Drupal\commerce_shipping\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Rate base plugin plugin manager.
 */
class RateBasePluginManager extends DefaultPluginManager {


  /**
   * Constructor for RateBasePluginManager objects.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/RateBasePlugin', $namespaces, $module_handler, 'Drupal\commerce_shipping\Plugin\RateBasePluginInterface', 'Drupal\commerce_shipping\Annotation\RateBasePlugin');

    $this->alterInfo('commerce_shipping_rate_base_plugin_info');
    $this->setCacheBackend($cache_backend, 'commerce_shipping_rate_base_plugin_plugins');
  }

}
