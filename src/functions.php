<?php

/*
 * This file is part of the XtreamRemoteList package, an XtreamCodes project.
 * File: functions.php
 * Date: 22/04/2020
 * Author: Mr.Robot
 */

function CheckFlood () {
  return false;
}

function UniqueID () {
  return substr(md5('HASH-HERE'), 0, 15);
}