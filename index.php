<?php
/**
 * System start point:
 * - Read Request
 * - Write Responce
 *
 * @file index.php
 */

require_once 'Core/includes/bootstrap.php';

/**
 * @var GUI $GUI
 */
$GUI = IocContainer::init('GUI');
$GUI->WriteResponce();
