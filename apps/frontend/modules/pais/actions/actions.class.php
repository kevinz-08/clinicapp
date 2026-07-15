<?php

/**
 * pais actions: vista de consulta de la API publica del Banco Mundial.
 *
 * @package    clinicapp
 * @subpackage pais
 */
class paisActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $cliente = new WorldBankApiClient();

    try
    {
      $this->paises = $cliente->listarPaises();
    }
    catch (sfException $e)
    {
      $this->paises = array();
      $this->getUser()->setFlash('error', 'No fue posible consultar la API externa: '.$e->getMessage());
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $cliente = new WorldBankApiClient();

    $this->pais = $cliente->obtenerPais($request->getParameter('codigo'));
    $this->forward404Unless($this->pais, 'Pais no encontrado en la API.');
  }
}
