<?php

/**
 * medico actions.
 *
 * @package    clinicapp
 * @subpackage medico
 */
class medicoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->medicos = Doctrine_Core::getTable('Medico')
      ->createQuery('m')
      ->orderBy('m.apellido ASC, m.nombre ASC')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->medico = Doctrine_Core::getTable('Medico')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->medico);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MedicoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MedicoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($medico = Doctrine_Core::getTable('Medico')->find(array($request->getParameter('id'))));
    $this->form = new MedicoForm($medico);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($medico = Doctrine_Core::getTable('Medico')->find(array($request->getParameter('id'))));
    $this->form = new MedicoForm($medico);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($medico = Doctrine_Core::getTable('Medico')->find(array($request->getParameter('id'))));
    $medico->delete();

    $this->getUser()->setFlash('notice', 'El medico fue eliminado junto con sus citas.');
    $this->redirect('medico/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $esNuevo = $form->getObject()->isNew();
      $medico  = $form->save();

      $this->getUser()->setFlash('notice', $esNuevo ? 'Medico creado correctamente.' : 'Medico actualizado correctamente.');
      $this->redirect('medico/show?id='.$medico->getId());
    }
  }
}
