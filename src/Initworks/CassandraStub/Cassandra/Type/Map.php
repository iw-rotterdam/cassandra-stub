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

final class Map implements \Cassandra\Type
{
    /**
     * Returns "map"
     * @return string "map"
     */
    public function name() {}

    /**
     * Returns type representation in CQL, e.g. `map<varchar, int>`
     * @return string Type representation in CQL
     */
    public function __toString() {}

    /**
     * Returns type of keys
     * @return \Cassandra\Type Type of keys
     */
    public function keyType() {}

    /**
     * Returns type of values
     * @return \Cassandra\Type Type of values
     */
    public function valueType() {}

    /**
     * Creates a new Cassandra\Map from the given values.
     *
     * @code{.php}
     * <?php
     * use Cassandra\Type;
     * use Cassandra\Uuid;
     *
     * $type = Type::map(Type::uuid(), Type::varchar());
     * $map = $type->create(new Uuid(), 'first uuid',
     *                      new Uuid(), 'second uuid',
     *                      new Uuid(), 'third uuid');
     *
     * var_dump($map);
     * @endcode
     *
     * @throws \Exception|\InvalidArgumentException when keys or values given are
     *                                            of a different type than what
     *                                            this map type expects.
     *
     * @param  mixed $value,... An even number of values, where each odd value
     *                          is a key and each even value is a value for the
     *                          map, e.g. `create(key, value, key, value)`.
     *                          When no values given, creates an empty map.
     * @return \Cassandra\Map    A set with given values.
     */
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
