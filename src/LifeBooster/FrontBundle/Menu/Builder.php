<?php
 
namespace LifeBooster\FrontBundle\Menu;
 
use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
 
class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

 		$menu->setChildrenAttribute('class', 'page-sidebar-menu');
        $menu->addChild('navbar.home', array('route' => 'lifebooster_front_default_index'))->setAttribute('icon', 'icon-home');
		$menu->addChild('navbar.teacher', array('route' => 'lifebooster_front_teacher_index'))->setAttribute('icon', 'icon-users');
		$menu->addChild('navbar.homework', array('route' => 'lifebooster_front_homework_index'))->setAttribute('icon', 'icon-notebook');

        return $menu;
    }
}