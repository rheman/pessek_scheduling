<?php

use Pessek\PessekScheduling\Bootstrap;

$composer_path = '';
if (is_dir(__DIR__ . '/vendor')) {
	$composer_path = __DIR__ . '/';
}

return [
	'bootstrap' => \Pessek\PessekScheduling\Bootstrap::class,
	'settings' => [
		'enable_attachment' => 'yes',
		'enable_relatedobjects' => 'yes',
	],
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'pessek_scheduling',
			'class' => PessekScheduling::class,
			'searchable' => true,
		],
		[
			'type' => 'object',
			'subtype' => 'pessek_scheduling_poll_slot',
			'class' => PessekSchedulingSlot::class,
			'searchable' => false,
		],
	],
	'actions' => [
		'pessek_scheduling/add' => [],
		'pessek_scheduling/del_attachedfile' => [],
		'pessek_scheduling/deleteattachment' => [],
		'pessek_scheduling/answer' => [],
		'pessek_scheduling/sendreminder' => [],
		'pessek_scheduling/exportanswer' => [],
		'pessek_scheduling/deletepessekscheduling' => [],
	],
	'routes' => [
		'view:object:pessek_scheduling' => [
			'path' => '/pessekscheduling/view/{guid}/{title?}',
			'resource' => 'pessek_scheduling/view',
		],
		'view:object:pessek_scheduling:filter' => [
			'path' => '/pessekscheduling/filter',
			'resource' => 'pessek_scheduling/filter',
		],
		'view:object:pessek_scheduling:processing' => [
			'path' => '/pessekscheduling/processing',
			'resource' => 'pessek_scheduling/filterprocessing',
		],
		'collection:object:pessek_scheduling:owner' => [
			'path' => '/pessekscheduling/owner/{username}',
			'resource' => 'pessek_scheduling/owner',
		],
		'collection:object:pessek_scheduling:all' => [
			'path' => '/pessekscheduling/all',
			'resource' => 'pessek_scheduling/all',
		],
		'collection:object:pessek_scheduling:friends' => [
			'path' => '/pessekscheduling/friends/{username}',
			'resource' => 'pessek_scheduling/friends',
			'required_plugins' => [
				'friends',
			],
		],
		'collection:object:pessek_scheduling:group' => [
			'path' => '/pessekscheduling/group/{guid}/all',
			'resource' => 'pessek_scheduling/owner',
			'required_plugins' => [
				'groups',
			],
		],
		'collection:object:pessek_scheduling:group:all' => [
			'path' => '/pessekscheduling/group/{guid}',
			'resource' => 'pessek_scheduling/owner',
			'required_plugins' => [
				'groups',
			],
		],
		'view:object:pessekscheduling:sidebar' => [
			'path' => '/pessek_scheduling/sidebar',
			'resource' => 'pessek_scheduling/sidebar',
		],
	],
	'views' => [
		'default' => [
			'chartjs.js' => $composer_path . 'vendor/npm-asset/chart.js/dist/Chart.min.js',
		],
	],
];
