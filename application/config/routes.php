<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'register' => [
		'controller' => 'main',
		'action' => 'register',
	],
	'profile' => [
		'controller' => 'main',
		'action' => 'profile',
	],
	'send/{wid:\d+}' => [
		'controller' => 'main',
		'action' => 'send',
	],
	'history/{wid:\d+}' => [
		'controller' => 'main',
		'action' => 'history',
	],
	'add/{type:\w+}/{testnet:\d+}' => [
		'controller' => 'main',
		'action' => 'addWallet',
	],
	'rates' => [
		'controller' => 'main',
		'action' => 'rates',
	],
	'logout' => [
		'controller' => 'main',
		'action' => 'logout',
	],

	'delivery' => [
		'controller' => 'main',
		'action' => 'delivery',
	],

	'sendmsg' => [
		'controller' => 'main',
		'action' => 'sendmsg',
	],

	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],

	'item/{category:\w+}/id/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'item',
	],

	'catalog/{category:\w+}' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'catalog/{category:\w+}/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'catalog' => [
		'controller' => 'main',
		'action' => 'catalog',
	],
	'search' => [
		'controller' => 'main',
		'action' => 'search',
	],
	'search/{category:\w+}' => [
		'controller' => 'main',
		'action' => 'search',
	],
	'shares' => [
		'controller' => 'main',
		'action' => 'shares',
	],
	
	'news' => [
		'controller' => 'main',
		'action' => 'news',
	],

	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],

	
	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{category:\w+}/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/editpost/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'editpost',
	],
	'admin/delete/{category:\w+}/{id:\w+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/items/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'items',
	],
	'admin/posts/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/posts' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/items' => [
		'controller' => 'admin',
		'action' => 'items',
	],
	'admin/info' => [
		'controller' => 'admin',
		'action' => 'info',
	],
	'admin/eindex' => [
		'controller' => 'admin',
		'action' => 'eindex',
	],
	'admin/addpost' => [
		'controller' => 'admin',
		'action' => 'addpost',
	],
	'admin/editbanner' => [
		'controller' => 'admin',
		'action' => 'editbanner',
	],
];