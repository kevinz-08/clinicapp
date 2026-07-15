<?php

/**
 * paciente actions.
 *
 * @package    clinicapp
 * @subpackage paciente
 */
class pacienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pacientes = Doctrine_Core::getTable('Paciente')
      ->createQuery('p')
      ->orderBy('p.apellido ASC, p.nombre ASC')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->paciente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PacienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PacienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('id'))));
    $this->form = new PacienteForm($paciente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('id'))));
    $this->form = new PacienteForm($paciente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($paciente = Doctrine_Core::getTable('Paciente')->find(array($request->getParameter('id'))));
    $paciente->delete();

    $this->getUser()->setFlash('notice', 'El paciente fue eliminado junto con sus citas.');
    $this->redirect('paciente/index');
  }

  /**
   * Admision: registra el paciente y su primera cita en una sola vista.
   */
  public function executeAdmision(sfWebRequest $request)
  {
    $this->form = new PacienteAdmisionForm();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $paciente = $this->form->save();

        $this->getUser()->setFlash('notice', 'Paciente admitido y primera cita agendada.');
        $this->redirect('paciente/show?id='.$paciente->getId());
      }
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $esNuevo  = $form->getObject()->isNew();
      $paciente = $form->save();

      $this->getUser()->setFlash('notice', $esNuevo ? 'Paciente creado correctamente.' : 'Paciente actualizado correctamente.');
      $this->redirect('paciente/show?id='.$paciente->getId());
    }
  }
}
