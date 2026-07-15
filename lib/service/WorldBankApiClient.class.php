<?php

/**
 * api publica del Banco Mundial
 *
 * Las respuestas se cachean en disco para no consultar
 *
 * @package    clinicapp
 * @subpackage service
 */
class WorldBankApiClient
{
  const BASE_URL = 'https://api.worldbank.org/v2';

  protected $cache;

  public function __construct()
  {
    $this->cache = new sfFileCache(array(
      'cache_dir' => sfConfig::get('sf_cache_dir').'/worldbank',
      'lifetime'  => 3600,
    ));
  }

  /**
   * listado de paises
   *
   * @return array
   */
  public function listarPaises()
  {
    $datos = $this->getJson('/country?format=json&per_page=400');

    // La respuesta es [metadatos, registros]
    $registros = isset($datos[1]) ? $datos[1] : array();

    $paises = array();
    foreach ($registros as $registro)
    {
      if ('Aggregates' === $registro['region']['value'])
      {
        continue;
      }
      $paises[] = $registro;
    }

    return $paises;
  }

  /**
   * detalle de un pais por su codigo ISO alfa-3
   *
   * @param  string $codigo
   * @return array|null
   */
  public function obtenerPais($codigo)
  {
    try
    {
      $datos = $this->getJson('/country/'.strtoupper($codigo).'?format=json');
    }
    catch (sfException $e)
    {
      return null;
    }

    return isset($datos[1][0]) ? $datos[1][0] : null;
  }

  protected function getJson($path)
  {
    $cacheKey = md5($path);

    if ($this->cache->has($cacheKey))
    {
      return unserialize($this->cache->get($cacheKey));
    }

    $ch = curl_init(self::BASE_URL.$path);
    curl_setopt_array($ch, array(
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_TIMEOUT        => 20,
      CURLOPT_USERAGENT      => 'clinicapp/1.0',
      CURLOPT_CAINFO         => sfConfig::get('sf_data_dir').'/cacert.pem',
    ));

    $respuesta = curl_exec($ch);
    $status    = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error     = curl_error($ch);
    curl_close($ch);

    if (false === $respuesta)
    {
      throw new sfException('No fue posible conectar con la API del Banco Mundial: '.$error);
    }

    if (200 !== $status)
    {
      throw new sfException(sprintf('La API del Banco Mundial respondio con codigo HTTP %s.', $status));
    }

    $datos = json_decode($respuesta, true);

    if (!is_array($datos))
    {
      throw new sfException('La API del Banco Mundial devolvio una respuesta invalida.');
    }

    $this->cache->set($cacheKey, serialize($datos));

    return $datos;
  }
}
