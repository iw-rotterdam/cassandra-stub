<?php

/**
 * Copyright 2015 DataStax, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Cassandra\Type;

final class Scalar implements \Cassandra\Type
{
    public function name() {}
    public function __toString() {}
    public function create($value = null) {}

    /**
     * @inheritDoc
     */
    final static function varchar() {}

    /**
     * @inheritDoc
     */
    final static function text() {}

    /**
     * @inheritDoc
     */
    final static function blob() {}

    /**
     * @inheritDoc
     */
    final static function ascii() {}

    /**
     * @inheritDoc
     */
    final static function bigint() {}

    /**
     * @inheritDoc
     */
    final static function counter() {}

    /**
     * @inheritDoc
     */
    final static function int() {}

    /**
     * @inheritDoc
     */
    final static function varint() {}

    /**
     * @inheritDoc
     */
    final static function boolean() {}

    /**
     * @inheritDoc
     */
    final static function decimal() {}

    /**
     * @inheritDoc
     */
    final static function double() {}

    /**
     * @inheritDoc
     */
    final static function float() {}

    /**
     * @inheritDoc
     */
    final static function inet() {}

    /**
     * @inheritDoc
     */
    final static function timestamp() {}

    /**
     * @inheritDoc
     */
    final static function uuid() {}

    /**
     * @inheritDoc
     */
    final static function timeuuid() {}

    /**
     * @inheritDoc
     */
    final static function collection(\Cassandra\Type $type) {}

    /**
     * @inheritDoc
     */
    final static function map(\Cassandra\Type $key_type, \Cassandra\Type $value_type) {}

    /**
     * @inheritDoc
     */
    final static function set(\Cassandra\Type $type) {}
}
