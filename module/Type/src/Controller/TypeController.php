<?php

namespace Type\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Type\Form\Add;
use Type\Form\Edit;
use Type\InputFilter\AddType;
use Type\Entity\Type;

class TypeController extends AbstractActionController
{
  protected $typeService;

  public function __construct($typeService)
  {
    $this->typeService = $typeService;
  }

  public function indexAction()
  {
      $types = $this->typeService->fetch(
          $this->params()->fromRoute('page')
      );

      $variables = [
        'types' => $types
      ];

      return new ViewModel($variables);
  }

  public function addAction()
  {
    $form = new Add();

    $variables = [
      'form' => $form
    ];

    if ($this->request->isPost()) {
        $typePost = new Type();
        $form->bind($typePost);

        $form->setInputFilter(new AddType());

        $data = $this->request->getPost();
        $form->setData($data);

        if ($form->isValid()) {
          $this->typeService->save($typePost);

          return $this->redirect()->toRoute('type_home');
        }
    }

    return new ViewModel($variables);
  }

  public function showAction()
  {
    $type = $this->typeService->find(
      $this->params()->fromRoute('typeName')
    );

    if (is_null($type)) {
      $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
    }

    return new ViewModel(['type' => $type]);
  }

  public function deleteAction()
  {
    $this->typeService->delete($this->params()->fromRoute('typeId'));
    $this->redirect()->toRoute('type_home');
  }

  public function editAction()
  {
    $form = new Edit();
    $variables = ['form' => $form];

    if ($this->request->isPost()) {
      $typePost = new Type();
      $form->bind($typePost);
      $form->setInputFilter(new AddType());
      $data = $this->request->getPost();
      $form->setData($data);
      if ($form->isValid()) {
        $this->typeService->update($typePost);
        return $this->redirect()->toRoute('type_home');
      }
    }
    else
    {
        $type = $this->typeService
          ->findById(
            $this->params()->fromRoute('typeId')
        );
        if (is_null($type)) {
          $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
        } else {
          $form->bind($type);
          $form->get('name')->setValue($type->getName());
          $form->get('id')->setValue($type->getId());
        }
      }
    return new ViewModel($variables);
  }
}
