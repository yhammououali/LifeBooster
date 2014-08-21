<?php

namespace LifeBooster\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use LifeBooster\FrontBundle\Form\Type\TeacherType;
use LifeBooster\FrontBundle\Entity\Teacher;

class TeacherController extends Controller
{
    /**
     * @Route("/teacher")
     * @Template
     */
    public function indexAction()
    {
        $teachers = $this->getDoctrine()->getRepository('LifeBoosterFrontBundle:Teacher')->findAll();

        return array('teachers' => $teachers);
    }

    /**
     * @Route("/teacher/create")
     * @Template("LifeBoosterFrontBundle:Teacher:edit.html.twig")
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();
        $teacher = new Teacher();
        $form = $this->createForm(new TeacherType(), $teacher);
        if($this->get('request')->isMethod('POST')) {
            $form->bind($this->get('request'));
            if ($form->isValid()) {
                $em->persist($teacher);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Professeur créé avec succès');

                return $this->redirect($this->generateUrl('lifebooster_front_teacher_index', array()));
            }
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("/teacher/edit/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("teacher", class="LifeBoosterFrontBundle:Teacher")
     * @Template
     */
    public function editAction($teacher)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new TeacherType(), $teacher);
        if($this->get('request')->isMethod('POST')) {
            $form->bind($this->get('request'));
            if ($form->isValid()) {
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Professeur modifié avec succès');

                return $this->redirect($this->generateUrl('lifebooster_front_teacher_index', array()));
            }
        }
        return array('teacher' => $teacher, 'form' => $form->createView());
    }

    /**
     * @Route("/teacher/delete/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("teacher", class="LifeBoosterFrontBundle:Teacher")
     * @Template
     */
    public function deleteAction($teacher)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($teacher);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Professeur supprimé avec succès');

        return $this->redirect($this->generateUrl('lifebooster_front_teacher_index', array()));
    }

    /**
     * @Route("/teacher/show/{id}", requirements={"id" = "\d+"})
     * @ParamConverter("teacher", class="LifeBoosterFrontBundle:Teacher")
     * @Template("LifeBoosterFrontBundle:Teacher:show.html.twig")
     */
    public function showAction($teacher)
    {
        return array('teacher' => $teacher);
    }
}
