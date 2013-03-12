<?php 

/*Это точка входа в сам компонент */

//Защита от прямого обращения к скрипту
defined('_JEXEC') or die ('Restricted access');

//Подключение файла контроллера
require_once ( JPATH_COMPONENT.DS.'controller.php');

//Проверка или требуется определённый контроллер
if($controller = JRequest::getVar('controller')) {
require_once ( JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

//Создание класса компонента
$classname = 'OrderaccController'.$controller;
$controller = new $classname ();

//Выполнить задачу запроса
$controller->execute(JRequest::getVar ('task'));

//Переадресация
$controller->redirect();

?>