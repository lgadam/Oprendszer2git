<?php 

if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) 
{
	case 'home': require_once PROTECTED_DIR.'global/home.php'; break; //global

	case 'news': IsUserLoggedIn() ? require_once PROTECTED_DIR.'news/news.php' : header('Location: index.php'); break; //news
	case 'add_content': IsUserLoggedIn() ? require_once PROTECTED_DIR.'news/addcontent.php' : header('Location: index.php'); break;
	case 'content': IsUserLoggedIn() ? require_once PROTECTED_DIR.'news/content.php' : header('Location: index.php'); break;

	case 'profile': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/profile.php' : header('Location: index.php'); break; //user
	case 'user_list': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;
	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;
	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'global/404.php'; break;
}
?>