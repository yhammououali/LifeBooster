<?php

namespace LifeBooster\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use LifeBooster\FrontBundle\Form\Type\HomeworkType;
use LifeBooster\FrontBundle\Entity\Homework;

class HomeworkController extends Controller
{
    /**
     * @Route("/homework")
     * @Template
     */
    public function indexAction()
    {
        $homeworks = $this->getDoctrine()->getRepository('LifeBoosterFrontBundle:Homework')->findAll();

        return array('homeworks' => $homeworks);
    }

    /**
     * @Route("/homework/create")
     * @Template("LifeBoosterFrontBundle:Homework:edit.html.twig")
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $homework = new Homework();
        $form = $this->createForm(new HomeworkType(), $homework);
        if($this->get('request')->isMethod('POST')) {
            $form->bind($this->get('request'));
            if ($form->isValid()) {
                $em->persist($homework);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Devoir créé avec succès');

                return $this->redirect($this->generateUrl('lifebooster_front_homework_index', array()));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/homework/edit/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("homework", class="lifeBoosterFrontBundle:Homework")
     * @Template
     */
    public function editAction()
    {
        return $this->render('LifeBoosterFrontBundle:Default:index.html.twig');
    }

    /**
     * @Route("/homework/delete/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("homework", class="lifeBoosterFrontBundle:Homework")
     * @Template
     */
    public function deleteAction()
    {
        return $this->render('LifeBoosterFrontBundle:Default:index.html.twig');
    }

    /**
     * @Route("/homework/show/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("homework", class="lifeBoosterFrontBundle:Homework")
     * @Template("LifeBoosterFrontBundle:Homework:show.html.twig")
     */
    public function showAction()
    {
        return $this->render('LifeBoosterFrontBundle:Default:index.html.twig');
    }
}
