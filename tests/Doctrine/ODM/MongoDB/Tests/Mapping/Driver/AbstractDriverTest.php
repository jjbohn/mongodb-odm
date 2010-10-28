<?php

namespace Doctrine\ODM\MongoDB\Tests\Mapping\Driver;

use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;

require_once 'fixtures/User.php';
require_once 'fixtures/EmbeddedDocument.php';

/**
 * @author Bulat Shakirzyanov <bulat@theopenskyproject.com>
 */
abstract class AbstractDriverTest extends \PHPUnit_Framework_TestCase
{
    protected $driver;

    public function setUp()
    {
        // implement driver setup and metadata read
    }

    public function tearDown()
    {
        unset ($this->driver);
    }

    public function testDriver()
    {

        $classMetadata = new ClassMetadata('TestDocuments\User');
        $this->driver->loadMetadataForClass('TestDocuments\User', $classMetadata);

        $this->assertEquals(array(
            'fieldName' => 'id',
            'id' => true,
            'name' => 'id',
            'type' => 'id',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false
        ), $classMetadata->fieldMappings['id']);

        $this->assertEquals(array(
            'fieldName' => 'username',
            'name' => 'username',
            'type' => 'string',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false
        ), $classMetadata->fieldMappings['username']);

        $this->assertEquals(array(
            'fieldName' => 'createdAt',
            'name' => 'createdAt',
            'type' => 'date',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false
        ), $classMetadata->fieldMappings['createdAt']);

        $this->assertEquals(array(
            'fieldName' => 'tags',
            'name' => 'tags',
            'type' => 'collection',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['tags']);

        $this->assertEquals(array(
            'fieldName' => 'address',
            'name' => 'address',
            'type' => 'one',
            'embedded' => true,
            'targetDocument' => 'Documents\Address',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['address']);

        $this->assertEquals(array(
            'fieldName' => 'phonenumbers',
            'name' => 'phonenumbers',
            'type' => 'many',
            'embedded' => true,
            'targetDocument' => 'Documents\Phonenumber',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => true,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['phonenumbers']);

        $this->assertEquals(array(
            'fieldName' => 'profile',
            'name' => 'profile',
            'type' => 'one',
            'reference' => true,
            'targetDocument' => 'Documents\Profile',
            'isCascadeCallbacks' => true,
            'isCascadeDetach' => true,
            'isCascadeMerge' => true,
            'isCascadePersist' => true,
            'isCascadeRefresh' => true,
            'isCascadeRemove' => true,
            'nullable' => false,
            'orphanRemoval' => false,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['profile']);

        $this->assertEquals(array(
            'fieldName' => 'account',
            'name' => 'account',
            'type' => 'one',
            'reference' => true,
            'targetDocument' => 'Documents\Account',
            'isCascadeCallbacks' => true,
            'isCascadeDetach' => true,
            'isCascadeMerge' => true,
            'isCascadePersist' => true,
            'isCascadeRefresh' => true,
            'isCascadeRemove' => true,
            'nullable' => false,
            'orphanRemoval' => false,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['account']);

        $this->assertEquals(array(
            'fieldName' => 'groups',
            'name' => 'groups',
            'type' => 'many',
            'reference' => true,
            'targetDocument' => 'Documents\Group',
            'isCascadeCallbacks' => true,
            'isCascadeDetach' => true,
            'isCascadeMerge' => true,
            'isCascadePersist' => true,
            'isCascadeRefresh' => true,
            'isCascadeRemove' => true,
            'nullable' => false,
            'orphanRemoval' => false,
            'strategy' => 'pushPull',
        ), $classMetadata->fieldMappings['groups']);

        $this->assertEquals(array(
            'postPersist' => array('doStuffOnPostPersist', 'doOtherStuffOnPostPersist'),
            'prePersist' => array('doStuffOnPrePersist')
            ),
            $classMetadata->lifecycleCallbacks
        );

        $classMetadata = new ClassMetadata('TestDocuments\EmbeddedDocument');
        $this->driver->loadMetadataForClass('TestDocuments\EmbeddedDocument', $classMetadata);

        $this->assertEquals(array(
            'fieldName' => 'name',
            'name' => 'name',
            'type' => 'string',
            'isCascadeCallbacks' => false,
            'isCascadeDetach' => false,
            'isCascadeMerge' => false,
            'isCascadePersist' => false,
            'isCascadeRefresh' => false,
            'isCascadeRemove' => false,
            'nullable' => false,
            'orphanRemoval' => false,
        ), $classMetadata->fieldMappings['name']);
    }

}