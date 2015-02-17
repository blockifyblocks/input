<?php

use \Blockify\Block;
use \Blockify\Element;
use \Blockify\VoidElement;

$type = $block->model['type'];
$id = $block->model['id'];
$name = $block->model['name'];
$required = $block->model['required'];
$placeholder = $block->model['placeholder'];
$label = array_key_exists('label', $block->model) ? 'true' : 'false';

// Create properties
$properties = array(
	'class' => 'form-control' . $block->model['class'],
	'type' => $type,
	'required' => $required,
	'name' => $name,
	'placeholder' => $placeholder,
	'label' => $label
);

// TODO: Add some element-specific attributes
// TODO: Handle other HTML5 types: color, date, datetime, datetime-local, month, range, search, tel, time, url, week
switch(true) {
  case ($type == 'text'):
	break;
	case ($type == 'button'):
    $properties['class'] = $block->model['class'] . 'btn';
	break;
  case ($type == 'email'):
	break;
  case ($type == 'number'):
  	$properties['max'] = $block->model['max'];
  	$properties['min'] = $block->model['min'];
	break;
	case ($type == 'hidden'):
	break;
	case ($type == 'submit'):
    $properties['class'] = $block->model['class'] . 'btn btn-primary';
    $properties['value'] = $block->model['value'];
	break;
}

echo $block->openTag('input', $properties);
