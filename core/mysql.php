<?php

/*
 * This file is part of the XtreamRemoteList package, an XtreamCodes project.
 * File Class: mysql.php
 * Date: 22/04/2020
 * Author: Mr.Robot
 */

namespace Core;

class Mysql {
  var $lastQuery;
  public $result;
  public $dbh;
  protected $username;
  protected $password;
  protected $databaseName;
  protected $host;
  protected $pconnect = false;
  protected $connected = false;
  function __construct($username, $password, $databaseName, $host, $port = 7999, $pconnect = false, $configStatus = false) {
    $this->dbh = false;
    if (!$configStatus) {
      $this->username = $username;
      $this->password = $password;
      $this->databaseName = $databaseName;
      $this->host = $host;
      $this->pconnect = $pconnect;
      $this->dbport = $port;
    }
  }

  /**
   * Close connection mysql
   */
  function CloseMysqlConnection () {
    if ($this->connected && !$this->pconnect) {
      $this->connected = false;
      $this->dbh->close();
    }
    return true;
  }

  function __destruct () {
    $this->CloseMysqlConnection();
  }

  /**
   * Connect mysql
   */
  function Connect () {
    if ($this->connected && $this->dbh) {
      return true;
    }
    $this->dbh = mysqli_init();
    $this->dbh->options(MYSQLI_OPT_CONNECT_TIMEOUT, 4);
    if ($this->pconnect) {
      $this->dbh->real_connect('p:' . $this->host, $this->username, $this->password, $this->databaseName, $this->dbport);
    } else {
      $this->dbh->real_connect($this->host, $this->username, $this->password, $this->databaseName, $this->dbport);
    }
    if (!empty($this->dbh->error)) {
      die(json_encode(array('error' => 'MySQL: ' . $this->dbh->error)));
    }
    $this->connected = true;
    mysqli_set_charset($this->dbh, 'utf8');
    return true;
  }

  /**
   * Returns an array of stylesheet URLs.
   *
   * @param string $query  Query mysql
   * @param boolean $buffered Buffer status
   *
   * @return boolean True or false
   */
  function query($query, $buffered = false) {
    return true;
  }
}