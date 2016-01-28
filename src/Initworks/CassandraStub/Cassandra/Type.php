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

namespace Cassandra;

/**
 * Cluster object is used to create Sessions.
 */
interface Type
{
    /**
     * Get representation of cassandra varchar type
     * @return \Cassandra\Type varchar type
     */
    static function varchar();

    /**
     * Get representation of cassandra varchar type
     * @return \Cassandra\Type varchar type
     */
    static function text();

    /**
     * Get representation of cassandra varchar type
     * @return \Cassandra\Type varchar type
     */
    static function blob();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function ascii();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function bigint();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function counter();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function int();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function varint();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function boolean();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function decimal();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function double();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function float();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function inet();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function timestamp();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function uuid();

      /**
       * Get representation of cassandra varchar type
       * @return \Cassandra\Type varchar type
       */
     static function timeuuid();

    /**
     * Initialize a Collection type
     * @code{.php}
     * <?php
     * use \Cassandra\Type;
     *
     * $collection = Type::collection(Type::int())
     *                   ->create(1, 2, 3, 4, 5, 6, 7, 8, 9);
     *
     * var_dump($collection);
     * @endcode
     * @param  Type $type The type of values
     * @return Type       The collection type
     */
     static function collection(Type $type);

    /**
     * Initialize a map type
     * @code{.php}
     * <?php
     * use \Cassandra\Type;
     *
     * $map = Type::map(Type::int(), Type::varchar())
     *            ->create(1, "a", 2, "b", 3, "c", 4, "d", 5, "e", 6, "f")
     *
     * var_dump($map);
     * @endcode
     * @param  Type $key_type   The type of keys
     * @param  Type $value_type The type of values
     * @return Type             The map type
     */
     static function map(Type $key_type, Type $value_type);

    /**
     * Initialize a set type
     * @code{.php}
     * <?php
     * use \Cassandra\Type;
     *
     * $set = Type::set(Type::varchar)
     *            ->create("a", "b", "c", "d", "e", "f", "g", "h", "i", "j");
     *
     * var_dump($set);
     * @endcode
     * @param Type $type [description]
     */
     static function set(Type $type);

    /**
     * Returns the name of this type as string.
     * @return string Name of this type
     */
    function name();

    /**
     * Returns string representation of this type.
     * @return string String representation of this type
     */
    function __toString();

    /**
     * Instantiate a value of this type from provided value(s).
     *
     * @throws Exception\InvalidArgumentException when values given cannot be
     *                                            represented by this type.
     *
     * @param  mixed $value,... one or more values to coerce into this type
     * @return mixed            a value of this type
     */
    function create($value = null);
}
