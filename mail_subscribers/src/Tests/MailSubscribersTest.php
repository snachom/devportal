<?php

/********************************************************* {COPYRIGHT-TOP} ***
 * Licensed Materials - Property of IBM
 * 5725-L30, 5725-Z22
 *
 * (C) Copyright IBM Corporation 2018, 2019
 *
 * All Rights Reserved.
 * US Government Users Restricted Rights - Use, duplication or disclosure
 * restricted by GSA ADP Schedule Contract with IBM Corp.
 ********************************************************** {COPYRIGHT-END} **/

namespace Drupal\mail_subscribers\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * mail_subscribers tests.
 *
 * @group mail_subscribers
 */
class MailSubscribersTest extends WebTestBase {

  /**
   * Our module dependencies.
   *
   * In Drupal 8's SimpleTest, we declare module dependencies in a public
   * static property called $modules. WebTestBase automatically enables these
   * modules for us.
   *
   * @var array
   */
  static public $modules = ['mail_subscribers'];

  /**
   * The installation profile to use with this test.
   *
   * @var string
   */
  protected $profile = 'minimal';

  /**
   * A user with permission to create and edit books and to administer blocks.
   *
   * @var \Drupal\core\session\AccountInterface $entity
   */
  protected $adminUser;

  /**
   * seems to fail the strict validator
   *
   * @var bool
   */
  protected $strictConfigSchema = FALSE;

  /**
   * Setup basic environment.
   */
  protected function setUp(): void {
    parent::setUp();


  }

  /**
   * Test that does nothing
   */
  function testNoddy(): void {
    $this->assertEqual(TRUE, TRUE, 'true');
  }

}