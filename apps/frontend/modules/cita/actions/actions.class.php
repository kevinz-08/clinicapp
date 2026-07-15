<?php

/**
 * cita actions.
 *
 * @package    clinicapp
 * @subpackage cita
 */
class citaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    // Filtros adicionales del listado (ademas de la busqueda de DataTables)
    $this->filtros = array(
      'medico_id' => $request->getParameter('medico_id'),
      'estado'    => $request->getParameter('estado'),
      'desde'     => $request->getParameter('desde'),
      'hasta'     => $request->getParameter('hasta'),
    );

    $this->citas = Doctrine_Core::getTable('Cita')
      ->getQueryFiltrada($this->filtros)
      ->execute();

    $this->medicos = Doctrine_Core::getTable('Medico')
      ->createQuery('m')
      ->orderBy('m.apellido ASC')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cita = Doctrine_Core::getTable('Cita')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->cita);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CitaForm();

    // Permite agendar desde la ficha de un paciente: /cita/new?paciente_id=N
    if ($pacienteId = $request->getParameter('paciente_id'))
    {
      $this->form->setDefault('paciente_id', $pacienteId);
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CitaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cita = Doctrine_Core::getTable('Cita')->find(array($request->getParameter('id'))));
    $this->form = new CitaForm($cita);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cita = Doctrine_Core::getTable('Cita')->find(array($request->getParameter('id'))));
    $this->form = new CitaForm($cita);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cita = Doctrine_Core::getTable('Cita')->find(array($request->getParameter('id'))));
    $cita->delete();

    $this->getUser()->setFlash('notice', 'La cita fue eliminada.');
    $this->redirect('cita/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $esNueva = $form->getObject()->isNew();
      $cita    = $form->save();

      $this->getUser()->setFlash('notice', $esNueva ? 'Cita agendada correctamente.' : 'Cita actualizada correctamente.');
      $this->redirect('cita/show?id='.$cita->getId());
    }
  }
}
