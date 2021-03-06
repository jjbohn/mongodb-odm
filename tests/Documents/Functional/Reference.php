<?php

namespace Documents\Functional;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Reference
{
    /** @ODM\Id */
    public $id;

    /** @ODM\String */
    public $name;
}