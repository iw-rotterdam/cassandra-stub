<?php

namespace Cassandra {
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



/**
 * Batch statements are used to execute a series of simple or prepared
 * statements.
 *
 * There are 3 types of batch statements:
 *  * `Cassandra::BATCH_LOGGED`   - this is the default batch type. This batch
 *    guarantees that either all or none of its statements will be executed.
 *    This behavior is achieved by writing a batch log on the coordinator,
 *    which slows down the execution somewhat.
 *  * `Cassandra::BATCH_UNLOGGED` - this batch will not be verified when
 *    executed, which makes it faster than a `LOGGED` batch, but means that
 *    some of its statements might fail, while others - succeed.
 *  * `Cassandra::BATCH_COUNTER`  - this batch is used for counter updates,
 *    which are, unlike other writes, not idempotent.
 *
 * @see Cassandra::BATCH_LOGGED
 * @see Cassandra::BATCH_UNLOGGED
 * @see Cassandra::BATCH_COUNTER
 */
final class BatchStatement implements Statement
{
    /**
     * Creates a new batch statement.
     *
     * @param int $type must be one of Cassandra::BATCH_* (default: Cassandra::BATCH_LOGGED).
     */
    public function __construct($type = \Cassandra::BATCH_LOGGED) {}

    /**
     * Adds a statement to this batch.
     *
     * @param Statement  $statement the statement to add
     * @param array|null $arguments positional or named arguments
     *
     * @throws Exception\InvalidArgumentException
     *
     * @return BatchStatement self
     */
    public function add(Statement $statement, array $arguments = null) {}
}

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



/**
 * A PHP representation of the CQL `bigint` datatype
 */
final class Bigint implements Value, Numeric
{
    /**
     * Minimum possible Bigint value
     *
     * @return Bigint minimum value
     */
    public static function min() {}

    /**
     * Maximim possible Bigint value
     *
     * @return Bigint maximum value
     */
    public static function max() {}

    /**
     * Creates a new 64bit integer.
     *
     * @param string $value integer value as a string
     */
    public function __construct($value) {}

    /**
     * The type of this bigint.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns the integer value.
     *
     * @return string integer value
     */
    public function value() {}

    /**
     * Returns string representation of the integer value.
     *
     * @return string integer value
     */
    public function __toString() {}

    /**
     * @param Numeric $addend a number to add to this one
     *
     * @return Numeric sum
     */
    public function add(Numeric $addend) {}

    /**
     * @param Numeric $subtrahend a number to subtract from this one
     *
     * @return Numeric difference
     */
    public function sub(Numeric $subtrahend) {}

    /**
     * @param Numeric $multiplier a number to multiply this one by
     *
     * @return Numeric product
     */
    public function mul(Numeric $multiplier) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric quotient
     */
    public function div(Numeric $divisor) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric remainder
     */
    public function mod(Numeric $divisor) {}

    /**
     * @return Numeric absolute value
     */
    public function abs() {}

    /**
     * @return Numeric negative value
     */
    public function neg() {}

    /**
     * @return Numeric square root
     */
    public function sqrt() {}

    /**
     * @return int this number as int
     */
    public function toInt() {}

    /**
     * @return float this number as float
     */
    public function toDouble() {}
}

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



/**
 * A PHP representation of the CQL `blob` datatype
 */
final class Blob implements Value
{
    /**
     * Creates a new bytes array.
     *
     * @param string $bytes any bytes
     */
    public function __construct($bytes) {}

    /**
     * The type of this blob.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns bytes as a hex string.
     *
     * @return string bytes as hexadecimal string
     */
    public function bytes() {}

    /**
     * Returns bytes as a hex string.
     *
     * @return string bytes as hexadecimal string
     */
    public function __toString() {}

    /**
     * Returns bytes as a binary string.
     *
     * @return string bytes as binary string
     */
    public function toBinaryString() {}
}

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



/**
 * Cluster object is used to create Sessions.
 */
interface Cluster
{
    /**
     * Creates a new Session instance.
     *
     * @param string $keyspace Optional keyspace name
     *
     * @return Session Session instance
     */
    function connect($keyspace = null);

    /**
     * Creates a new Session instance.
     *
     * @param string $keyspace Optional keyspace name
     *
     * @return Future A Future Session instance
     */
    function connectAsync($keyspace = null);
}

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



/**
 * A PHP representation of the CQL `list` datatype
 */
final class Collection implements Value, \Countable, \Iterator
{
    /**
     * Creates a new collection of a given type.
     *
     * @param Type $type
     */
    public function __construct($type) {}

    /**
     * The type of this collection.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Array of values in this collection.
     *
     * @return array values
     */
    public function values() {}

    /**
     * Adds one or more values to this collection.
     *
     * @param mixed $value,... one or more values to add
     *
     * @return int total number of values in this collection
     */
    public function add($value) {}

    /**
     * Deletes the value at a given index
     *
     * @param int $index   Index
     *
     * @return bool        Whether the value at a given index is correctly removed
     */
    public function remove($index) {}

    /**
     * Retrieves the value at a given index.
     *
     * @param   int   $index  Index
     * @return  mixed         Value or null
     */
    public function get($index) {}

    /**
     * Finds index of a value in this collection.
     *
     * @param   mixed  $value  Value
     * @return  int            Index or null
     */
    public function find($value) {}

    /**
     * Total number of elements in this collection
     *
     * @return int count
     */
    public function count() {}

    /**
     * Current element for iteration
     *
     * @return mixed current element
     */
    public function current() {}

    /**
     * Current key for iteration
     *
     * @return int current key
     */
    public function key() {}

    /**
     * Move internal iterator forward
     *
     * @return void
     */
    public function next() {}

    /**
     * Check whether a current value exists
     *
     * @return bool
     */
    public function valid() {}

    /**
     * Rewind internal iterator
     *
     * @return void
     */
    public function rewind() {}
}

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



/**
 * A PHP representation of a column
 */
interface Column
{
    /**
     * Returns the name of the column.
     * @return string Name of the column or null
     */
    function name();

    /**
     * Returns the type of the column.
     * @return \Cassandra\Type Type of the column
     */
    function type();

    /**
     * Returns whether the column is in descending or ascending order.
     * @return boolean Whether the column is stored in descending order.
     */
    function isReversed();

    /**
     * Returns true for static columns.
     * @return boolean Whether the column is static
     */
    function isStatic();

    /**
     * Returns true for frozen columns.
     * @return boolean Whether the column is frozen
     */
    function isFrozen();

    /**
     * Returns name of the index if defined.
     * @return string Name of the index if defined or null
     */
    function indexName();

    /**
     * Returns index options if present.
     * @return string Index options if present or null
     */
    function indexOptions();
}

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



/**
 * A PHP representation of the CQL `decimal` datatype
 *
 * The actual value of a decimal is `$value * pow(10, $scale * -1)`
 */
final class Decimal implements Value, Numeric
{
    /**
     * Creates a decimal from a given decimal string:
     *
     * ~~~{.php}
     * 
     * $decimal = new Cassandra::Decimal("1313123123.234234234234234234123");
     *
     * $this->assertEquals(21, $decimal->scale());
     * $this->assertEquals("1313123123234234234234234234123", $decimal->value());
     * ~~~
     *
     * @param string $value Any decimal string
     */
    public function __construct($value) {}

    /**
     * The type of this decimal.
     *
     * @return Type
     */
    public function type() {}

    /**
     * String representation of this decimal.
     *
     * @return string Decimal value
     */
    public function __toString() {}

    /**
     * Numeric value of this decimal as string.
     *
     * @return string Numeric value
     */
    public function value() {}

    /**
     * Scale of this decimal as int.
     *
     * @return int Scale
     */
    public function scale() {}

    /**
     * @param Numeric $addend a number to add to this one
     *
     * @return Numeric sum
     */
    public function add(Numeric $addend) {}

    /**
     * @param Numeric $subtrahend a number to subtract from this one
     *
     * @return Numeric difference
     */
    public function sub(Numeric $subtrahend) {}

    /**
     * @param Numeric $multiplier a number to multiply this one by
     *
     * @return Numeric product
     */
    public function mul(Numeric $multiplier) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric quotient
     */
    public function div(Numeric $divisor) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric remainder
     */
    public function mod(Numeric $divisor) {}

    /**
     * @return Numeric absolute value
     */
    public function abs() {}

    /**
     * @return Numeric negative value
     */
    public function neg() {}

    /**
     * @return Numeric square root
     */
    public function sqrt() {}

    /**
     * @return int this number as int
     */
    public function toInt() {}

    /**
     * @return float this number as float
     */
    public function toDouble() {}
}

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




/**
 * Default cluster implementation.
 *
 * @see Cassandra\Cluster
 */
final class DefaultCluster implements Cluster
{
    /**
     * {@inheritDoc}
     *
     * @param string $keyspace Optional keyspace name
     *
     * @return Session Session instance
     */
    public function connect($keyspace = null) {}

    /**
     * {@inheritDoc}
     *
     * @param string $keyspace Optional keyspace name
     *
     * @return Future A Future Session instance
     */
    public function connectAsync($keyspace = null) {}
}

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



/**
 * A PHP representation of a column
 */
final class DefaultColumn implements Column
{
    /**
     * {@inheritDoc}
     *
     * @return string Name of the column or null
     */
    public function name() {}

    /**
     * {@inheritDoc}
     *
     * @return \Cassandra\Type Type of the column
     */
    public function type() {}

    /**
     * {@inheritDoc}
     *
     * @return boolean Whether the column is stored in descending order.
     */
    public function isReversed() {}

    /**
     * {@inheritDoc}
     *
     * @return boolean Whether the column is static
     */
    public function isStatic() {}

    /**
     * {@inheritDoc}
     *
     * @return boolean Whether the column is frozen
     */
    public function isFrozen() {}

    /**
     * {@inheritDoc}
     *
     * @return string Name of the index if defined or null
     */
    public function indexName() {}

    /**
     * {@inheritDoc}
     *
     * @return string Index options if present or null
     */
    public function indexOptions() {}
}

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



/**
 * A PHP representation of a keyspace
 */
final class DefaultKeyspace implements Keyspace
{
    /**
     * {@inheritDoc}
     *
     * @return string Name
     */
    public function name() {}

    /**
     * {@inheritDoc}
     *
     * @return string Replication class
     */
    public function replicationClassName() {}

    /**
     * {@inheritDoc}
     *
     * @return \Cassandra\Map Replication options
     */
    public function replicationOptions() {}

    /**
     * {@inheritDoc}
     *
     * @return string Whether durable writes are enabled
     */
    public function hasDurableWrites() {}

    /**
     * {@inheritDoc}
     *
     * @param  string          $name  Table name
     * @return \Cassandra\Table        Table instance or null
     */
    public function table($name) {}

    /**
     * {@inheritDoc}
     *
     * @return array An array of `Cassandra\Table` instances
     */
    public function tables() {}
}

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



/**
 * A PHP representation of a schema
 */
final class DefaultSchema implements Schema
{
    /**
     * {@inheritDoc}
     *
     * @param  string             $name Name of the keyspace to get
     * @return \Cassandra\Keyspace       Keyspace instance or null
     */
    public function keyspace($name) {}

    /**
     * {@inheritDoc}
     *
     * @return array An array of `Cassandra\Keyspace` instances.
     */
    public function keyspaces() {}
}

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



/**
 * Actual session implementation.
 *
 * @see Cassandra\Session
 */
final class DefaultSession implements Session
{
    /**
     * {@inheritDoc}
     *
     * @return Schema current schema.
     */
    public function schema() {}

    /**
     * {@inheritDoc}
     *
     * @throws Exception
     *
     * @param Statement        $statement statement to be executed
     * @param ExecutionOptions $options   execution options (optional)
     *
     * @return Rows execution result
     */
    public function execute(Statement $statement, ExecutionOptions $options = null) {}

    /**
     * {@inheritDoc}
     *
     * @param Statement             $statement statement to be executed
     * @param ExecutionOptions|null $options   execution options (optional)
     *
     * @return Future future result
     */
    public function executeAsync(Statement $statement, ExecutionOptions $options = null) {}

    /**
     * {@inheritDoc}
     *
     * @throws Exception
     *
     * @param string                $cql     CQL statement string
     * @param ExecutionOptions|null $options execution options (optional)
     *
     * @return PreparedStatement prepared statement
     */
    public function prepare($cql, ExecutionOptions $options = null) {}

    /**
     * {@inheritDoc}
     *
     * @param string                $cql     CQL string to be prepared
     * @param ExecutionOptions|null $options preparation options
     *
     * @return Future statement
     */
    public function prepareAsync($cql, ExecutionOptions $options = null) {}

    /**
     * {@inheritDoc}
     *
     * @param float|null $timeout Timeout to wait for closure in seconds
     * @return void
     */
    public function close($timeout = null) {}

    /**
     * {@inheritDoc}
     *
     * @return Future future
     */
    public function closeAsync() {}
}

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



/**
 * A PHP representation of a table
 */
final class DefaultTable implements Table
{
    /**
     * {@inheritDoc}
     *
     * @return string Name of the table
     */
    public function name() {}

    /**
     * {@inheritDoc}
     *
     * @return string Table description or null
     */
    public function comment() {}

    /**
     * {@inheritDoc}
     *
     * @return float Read repair chance
     */
    public function readRepairChance() {}

    /**
     * {@inheritDoc}
     *
     * @return float Local read repair chance
     */
    public function localReadRepairChance() {}

    /**
     * {@inheritDoc}
     *
     * @return int GC grace seconds
     */
    public function gcGraceSeconds() {}

    /**
     * {@inheritDoc}
     *
     * @return string Caching options
     */
    public function caching() {}

    /**
     * {@inheritDoc}
     *
     * @return float Bloom filter FP chance
     */
    public function bloomFilterFPChance() {}

    /**
     * {@inheritDoc}
     *
     * @return int Memtable flush period in miliseconds
     */
    public function memtableFlushPeriodMs() {}

    /**
     * {@inheritDoc}
     *
     * @return int Default TTL.
     */
    public function defaultTTL() {}

    /**
     * {@inheritDoc}
     *
     * @return string Speculative retry.
     */
    public function speculativeRetry() {}

    /**
     * {@inheritDoc}
     *
     * @return int Index interval
     */
    public function indexInterval() {}

    /**
     * {@inheritDoc}
     *
     * @return string Compaction strategy class name
     */
    public function compactionStrategyClassName() {}

    /**
     * {@inheritDoc}
     *
     * @return \Cassandra\Map Compaction strategy options
     */
    public function compactionStrategyOptions() {}

    /**
     * {@inheritDoc}
     *
     * @return \Cassandra\Map Compression parameters
     */
    public function compressionParameters() {}

    /**
     * {@inheritDoc}
     * @return boolean Value of `populate_io_cache_on_flush` or null
     */
    public function populateIOCacheOnFlush() {}

    /**
     * {@inheritDoc}
     * @return boolean Value of `replicate_on_write` or null
     */
    public function replicateOnWrite() {}

    /**
     * {@inheritDoc}
     * @return int Value of `max_index_interval` or null
     */
    public function maxIndexInterval() {}

    /**
     * {@inheritDoc}
     * @return int Value of `min_index_interval` or null
     */
    public function minIndexInterval() {}

    /**
     * {@inheritDoc}
     *
     * @param  string           $name Name of the column
     * @return \Cassandra\Column       Column instance
     */
    public function column($name) {}

    /**
     * {@inheritDoc}
     *
     * @return array A list of `Cassandra\Column` instances
     */
    public function columns() {}
}

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



/**
 * An interface implemented by all exceptions thrown by the PHP Driver.
 * Makes it easy to catch all driver-related exceptions using
 * `catch (Cassandra\Exception $e)`.
 */
interface Exception {}

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



/**
 * Request execution options.
 *
 * @see Session::execute()
 * @see Session::executeAsync()
 * @see Session::prepare()
 * @see Session::prepareAsync()
 */
final class ExecutionOptions
{
    /**
     * Creates a new options object for execution.
     *
     * * array['arguments']          array    An array or positional or named arguments
     * * array['consistency']        int      One of Cassandra::CONSISTENCY_*
     * * array['timeout']            int|null A number of seconds or null
     * * array['page_size']          int      A number of rows to include in result for paging
     * * array['serial_consistency'] int      Either Cassandra::CONSISTENCY_SERIAL or Cassandra::CONSISTENCY_LOCAL_SERIAL
     *
     * @throws Exception\InvalidArgumentException
     *
     * @param array $options various execution options
     */
    public function __construct(array $options = null) {}
}

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



/**
 * A PHP representation of the CQL `float` datatype
 */
final class Float implements Value, Numeric
{
    /**
     * Minimum possible Float value
     *
     * @return Float minimum value
     */
    public static function min() {}

    /**
     * Maximim possible Float value
     *
     * @return Float maximum value
     */
    public static function max() {}

    /**
     * Creates a new float.
     *
     * @param string $value float value as a string
     */
    public function __construct($value) {}

    /**
     * The type of this float.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns the float value.
     *
     * @return string float value
     */
    public function value() {}

    /**
     * Returns string representation of the float value.
     *
     * @return string float value
     */
    public function __toString() {}

    /**
     * @param Numeric $addend a number to add to this one
     *
     * @return Numeric sum
     */
    public function add(Numeric $addend) {}

    /**
     * @param Numeric $subtrahend a number to subtract from this one
     *
     * @return Numeric difference
     */
    public function sub(Numeric $subtrahend) {}

    /**
     * @param Numeric $multiplier a number to multiply this one by
     *
     * @return Numeric product
     */
    public function mul(Numeric $multiplier) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric quotient
     */
    public function div(Numeric $divisor) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric remainder
     */
    public function mod(Numeric $divisor) {}

    /**
     * @return Numeric absolute value
     */
    public function abs() {}

    /**
     * @return Numeric negative value
     */
    public function neg() {}

    /**
     * @return Numeric square root
     */
    public function sqrt() {}

    /**
     * @return int this number as int
     */
    public function toInt() {}

    /**
     * @return float this number as float
     */
    public function toDouble() {}
}

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



/**
 * Futures are returns from asynchronous methods.
 *
 * @see Cluster::connectAsync()
 * @see Session::executeAsync()
 * @see Session::prepareAsync()
 * @see Session::closeAsync()
 */
interface Future
{
    /**
     * Waits for a given future resource to resolve and throws errors if any.
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null);
}

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



/**
 * A future returned from Cassandra\Session::closeAsync().
 *
 * @see Session::closeAsync()
 */
final class FutureClose implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * A future that always resolves in an exception.
 */
final class FutureException implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * A future returned from `Cassandra\Session::prepareAsync()`
 * This future will resolve with a `Cassandra\PreparedStatement` or an exception.
 *
 * @see Session::prepareAsync()
 */
final class FuturePreparedStatement implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * This future results is resolved with `Cassandra\Rows`.
 *
 * @see Session::executeAsync()
 */
final class FutureRows implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * A future that resolves with `Cassandra\Session`.
 *
 * @see Cluster::connectAsync()
 */
final class FutureSession implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * A future that always resolves in a value.
 */
final class FutureValue implements Future
{
    /**
     * {@inheritDoc}
     *
     * @throws Exception\InvalidArgumentException
     * @throws Exception\TimeoutException
     *
     * @param float|null $timeout
     *
     * @return mixed a value that the future has been resolved with
     */
    public function get($timeout = null) {}
}

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



/**
 * A PHP representation of the CQL `inet` datatype
 */
final class Inet implements Value
{
    /**
     * Creates a new IPv4 or IPv6 inet address.
     *
     * @param string $address any IPv4 or IPv6 address
     */
    public function __construct($address) {}

    /**
     * The type of this inet.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns the normalized string representation of the address.
     *
     * @return string address
     */
    public function address() {}

    /**
     * Returns the normalized string representation of the address.
     *
     * @return string address
     */
    public function __toString() {}
}

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



/**
 * A PHP representation of a keyspace
 */
interface Keyspace
{
    /**
     * Returns keyspace name
     * @return string Name
     */
    function name();

    /**
     * Returns replication class name
     * @return string Replication class
     */
    function replicationClassName();

    /**
     * Returns replication options
     * @return \Cassandra\Map Replication options
     */
    function replicationOptions();

    /**
     * Returns whether the keyspace has durable writes enabled
     * @return string Whether durable writes are enabled
     */
    function hasDurableWrites();

    /**
     * Returns a table by name
     * @param  string               $name Table name
     * @return \Cassandra\Table|null       Table instance or null
     */
    function table($name);

    /**
     * Returns all tables defined in this keyspace
     * @return array An array of `Cassandra\Table` instances
     */
    function tables();
}

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



/**
 * A PHP representation of the CQL `map` datatype
 */
final class Map implements Value, \Countable, \Iterator, \ArrayAccess
{
    /**
     * Creates a new map of a given key and value type.
     *
     * @param Type $keyType
     * @param Type $valueType
     */
    public function __construct($keyType, $valueType) {}

    /**
     * The type of this map.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns all keys in the map as an array.
     *
     * @return array keys
     */
    public function keys() {}

    /**
     * Returns all values in the map as an array.
     *
     * @return array values
     */
    public function values() {}

    /**
     * Sets key/value in the map.
     *
     * @param mixed $key   key
     * @param mixed $value value
     */
    public function set($key, $value) {}

    /**
     * Gets the value of the key in the map.
     *
     * @param mixed $key Key
     *
     * @return mixed Value or null
     */
    public function get($key) {}

    /**
     * Removes the key from the map.
     *
     * @param mixed $key Key
     *
     * @return bool Whether the key was removed or not, e.g. didn't exist
     */
    public function remove($key) {}

    /**
     * Returns whether the key is in the map.
     *
     * @param mixed $key Key
     *
     * @return bool Whether the key is in the map or not
     */
    public function has($key) {}

    /**
     * Total number of elements in this map
     *
     * @return int count
     */
    public function count() {}

    /**
     * Current value for iteration
     *
     * @return mixed current value
     */
    public function current() {}

    /**
     * Current key for iteration
     *
     * @return int current key
     */
    public function key() {}

    /**
     * Move internal iterator forward
     *
     * @return void
     */
    public function next() {}

    /**
     * Check whether a current value exists
     *
     * @return bool
     */
    public function valid() {}

    /**
     * Rewind internal iterator
     *
     * @return void
     */
    public function rewind() {}

    /**
     * Sets the value at a given key
     *
     * @throws Exception\InvalidArgumentException when the type of key or value is wrong
     *
     * @param mixed $key   Key to use.
     * @param mixed $value Value to set.
     *
     * @return void
     */
    public function offsetSet($key, $value) {}

    /**
     * Retrieves the value at a given key
     *
     * @throws Exception\InvalidArgumentException when the type of key is wrong
     *
     * @param  mixed $key Key to use.
     * @return mixed      Value or `null`
     */
    public function offsetGet($key) {}

    /**
     * Deletes the value at a given key
     *
     * @throws Exception\InvalidArgumentException when the type of key is wrong
     *
     * @param mixed $key   Key to use.
     *
     * @return void
     */
    public function offsetUnset($key) {}

    /**
     * Returns whether the value a given key is present
     *
     * @throws Exception\InvalidArgumentException when the type of key is wrong
     *
     * @param mixed $key   Key to use.
     *
     * @return bool        Whether the value at a given key is present
     */
    public function offsetExists($key) {}
}

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



/**
 * Common interface implemented by all numeric types, providing basic
 * arithmetic functions.
 *
 * @see Bigint
 * @see Decimal
 * @see Float
 * @see Varint
 */
interface Numeric
{
    /**
     * @param Numeric $addend a number to add to this one
     *
     * @return Numeric sum
     */
    function add(Numeric $addend);

    /**
     * @param Numeric $subtrahend a number to subtract from this one
     *
     * @return Numeric difference
     */
    function sub(Numeric $subtrahend);

    /**
     * @param Numeric $multiplier a number to multiply this one by
     *
     * @return Numeric product
     */
    function mul(Numeric $multiplier);

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric quotient
     */
    function div(Numeric $divisor);

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric remainder
     */
    function mod(Numeric $divisor);

    /**
     * @return Numeric absolute value
     */
    function abs();

    /**
     * @return Numeric negative value
     */
    function neg();

    /**
     * @return Numeric square root
     */
    function sqrt();

    /**
     * @return int this number as int
     */
    function toInt();

    /**
     * @return float this number as float
     */
    function toDouble();
}

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



/**
 * Prepared statements are faster to execute because the server doesn't need
 * to process a statement's CQL during the execution.
 *
 * With token-awareness enabled in the driver, prepared statements are even
 * faster, because they are sent directly to replica nodes and avoid the extra
 * network hop.
 *
 * @see Session::prepare()
 */
final class PreparedStatement implements Statement
{
}

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



/**
 * Rows represent a result of statement execution.
 */
final class Rows implements \Iterator, \Countable, \ArrayAccess
{
    /**
     * Returns the number of rows.
     *
     * @return int number of rows
     * @see \Countable::count()
     */
    public function count() {}

    /**
     * Resets the rows iterator.
     *
     * @return void
     * @see \Iterator::rewind()
     */
    public function rewind() {}

    /**
     * Returns current row.
     *
     * @return array current row
     * @see \Iterator::current()
     */
    public function current() {}

    /**
     * Returns current index.
     *
     * @return int index
     * @see \Iterator::key()
     */
    public function key() {}

    /**
     * Advances the rows iterator by one.
     *
     * @return void
     * @see \Iterator::next()
     */
    public function next() {}

    /**
     * Returns existence of more rows being available.
     *
     * @return bool whether there are more rows available for iteration
     * @see \Iterator::valid()
     */
    public function valid() {}

    /**
     * Returns existence of a given row.
     *
     * @param int $offset row index
     *
     * @return bool whether a row at a given index exists
     * @see \ArrayAccess::offsetExists()
     */
    public function offsetExists($offset) {}

    /**
     * Returns a row at given index.
     *
     * @param int $offset row index
     *
     * @return array|null row at a given index
     * @see \ArrayAccess::offsetGet()
     */
    public function offsetGet($offset) {}

    /**
     * Sets a row at given index.
     *
     * @throws Exception\DomainException
     *
     * @param int   $offset row index
     * @param array $value row value
     *
     * @return void
     * @see \ArrayAccess::offsetSet()
     */
    public function offsetSet($offset, $value) {}

    /**
     * Removes a row at given index.
     *
     * @throws Exception\DomainException
     *
     * @param int $offset row index
     *
     * @return void
     * @see \ArrayAccess::offsetUnset()
     */
    public function offsetUnset($offset) {}

    /**
     * Check for the last page when paging.
     *
     * @return bool whether this is the last page or not
     */
    public function isLastPage() {}

    /**
     * Get the next page of results.
     *
     * @param float|null $timeout
     *
     * @return Rows|null loads and returns next result page
     */
    public function nextPage($timeout = null) {}

    /**
     * Get the next page of results asynchronously.
     *
     * @return Future returns future of the next result page
     */
    public function nextPageAsync() {}

    /**
     * Get the first row.
     *
     * @return array|null returns first row if any
     */
    public function first() {}
}

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



/**
 * A PHP representation of a schema
 */
interface Schema
{
    /**
     * Returns a Keyspace instance by name.
     * @param  string             $name Name of the keyspace to get
     * @return \Cassandra\Keyspace       Keyspace instance or null
     */
    function keyspace($name);

    /**
     * Returns all keyspaces defined in the schema.
     * @return array An array of `Cassandra\Keyspace` instances.
     */
    function keyspaces();
}

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



/**
 * A session is used to prepare and execute statements.
 *
 * @see Cluster::connect()
 */
interface Session
{
    /**
     * Returns current schema.
     *
     * NOTE: the returned Schema instance will not be updated as the actual
     *       schema changes, instead an updated instance should be requested by
     *       calling Session::schema() again.
     *
     * @return Schema current schema.
     */
    public function schema();

    /**
     * Executes a given statement and returns a result.
     *
     * @throws Exception
     *
     * @param Statement        $statement statement to be executed
     * @param ExecutionOptions $options   execution options (optional)
     *
     * @return Rows execution result
     */
    public function execute(Statement $statement, ExecutionOptions $options = null);

    /**
     * Executes a given statement and returns a future result.
     *
     * Note that this method ignores timeout specified in the ExecutionOptions,
     * you can provide one to Future::get() instead.
     *
     * @param Statement             $statement statement to be executed
     * @param ExecutionOptions|null $options   execution options (optional)
     *
     * @return Future future result
     */
    public function executeAsync(Statement $statement, ExecutionOptions $options = null);

    /**
     * Creates a prepared statement from a given CQL string.
     *
     * Note that this method only uses the ExecutionOptions::$timeout option,
     * all other options will be ignored.
     *
     * @throws Exception
     *
     * @param string                $cql     CQL statement string
     * @param ExecutionOptions|null $options execution options (optional)
     *
     * @return PreparedStatement prepared statement
     */
    public function prepare($cql, ExecutionOptions $options = null);

    /**
     * Asynchronously prepares a statement and returns a future prepared statement.
     *
     * Note that all options passed to this method will be ignored.
     *
     * @param string                $cql     CQL string to be prepared
     * @param ExecutionOptions|null $options preparation options
     *
     * @return Future statement
     */
    public function prepareAsync($cql, ExecutionOptions $options = null);

    /**
     * Closes current session and all of its connections.
     *
     * @param float|null $timeout Timeout to wait for closure in seconds
     * @return void
     */
    public function close($timeout = null);

    /**
     * Asynchronously closes current session once all pending requests have finished.
     *
     * @return Future future
     */
    public function closeAsync();
}

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



/**
 * A PHP representation of the CQL `set` datatype
 */
final class Set implements Value, \Countable, \Iterator
{
    /**
     * Creates a new collection of a given type.
     *
     * @param Type $type
     */
    public function __construct($type) {}

    /**
     * The type of this set.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Array of values in this set.
     *
     * @return array values
     */
    public function values() {}

    /**
     * Adds a value to this set.
     *
     * @param mixed $value Value
     *
     * @return bool whether the value has been added
     */
    public function add($value) {}

    /**
     * Returns whether a value is in this set.
     *
     * @param mixed $value Value
     *
     * @return bool whether the value is in the set
     */
    public function has($value) {}

    /**
     * Removes a value to this set.
     *
     * @param mixed $value Value
     *
     * @return bool whether the value has been removed
     */
    public function remove($value) {}

    /**
     * Total number of elements in this set
     *
     * @return int count
     */
    public function count() {}

    /**
     * Current element for iteration
     *
     * @return mixed current element
     */
    public function current() {}

    /**
     * Current key for iteration
     *
     * @return int current key
     */
    public function key() {}

    /**
     * Move internal iterator forward
     *
     * @return void
     */
    public function next() {}

    /**
     * Check whether a current value exists
     *
     * @return bool
     */
    public function valid() {}

    /**
     * Rewind internal iterator
     *
     * @return void
     */
    public function rewind() {}
}

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



/**
 * Simple statements can be executed using a Session instance.
 * They are constructed with a CQL string that can contain positional
 * argument markers `?`.
 *
 * NOTE: Positional argument are only valid for native protocol v2+.
 *
 * @see Session::execute()
 */
final class SimpleStatement implements Statement
{
    /**
     * Creates a new simple statement with the provided CQL.
     *
     * @param string $cql CQL string for this simple statement
     */
    public function __construct($cql) {}
}

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



/**
 * SSL options for Cassandra\Cluster.
 *
 * @see SSLOptions\Builder
 */
final class SSLOptions
{
}

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



/**
 * All statements implement this common interface.
 *
 * @see SimpleStatement
 * @see PreparedStatement
 * @see BatchStatement
 */
interface Statement
{
}

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



/**
 * A PHP representation of a table
 */
interface Table
{
    /**
     * Returns the name of this table
     * @return string Name of the table
     */
    function name();

    /**
     * Description of the table, if any
     * @return string Table description or null
     */
    function comment();

    /**
     * Returns read repair chance
     * @return float Read repair chance
     */
    function readRepairChance();

    /**
     * Returns local read repair chance
     * @return float Local read repair chance
     */
    function localReadRepairChance();

    /**
     * Returns GC grace seconds
     * @return int GC grace seconds
     */
    function gcGraceSeconds();

    /**
     * Returns caching options
     * @return string Caching options
     */
    function caching();

    /**
     * Returns bloom filter FP chance
     * @return float Bloom filter FP chance
     */
    function bloomFilterFPChance();

    /**
     * Returns memtable flush period in miliseconds
     * @return int Memtable flush period in miliseconds
     */
    function memtableFlushPeriodMs();

    /**
     * Returns default TTL.
     * @return int Default TTL.
     */
    function defaultTTL();

    /**
     * Returns speculative retry.
     * @return string Speculative retry.
     */
    function speculativeRetry();

    /**
     * Returns index interval
     * @return int Index interval
     */
    function indexInterval();

    /**
     * Returns compaction strategy class name
     * @return string Compaction strategy class name
     */
    function compactionStrategyClassName();

    /**
     * Returns compaction strategy options
     * @return \Cassandra\Map Compaction strategy options
     */
    function compactionStrategyOptions();

    /**
     * Returns compression parameters
     * @return \Cassandra\Map Compression parameters
     */
    function compressionParameters();

    /**
     * Returns whether or not the `populate_io_cache_on_flush` is true
     * @return boolean Value of `populate_io_cache_on_flush` or null
     */
    function populateIOCacheOnFlush();

    /**
     * Returns whether or not the `replicate_on_write` is true
     * @return boolean Value of `replicate_on_write` or null
     */
    function replicateOnWrite();

    /**
     * Returns the value of `max_index_interval`
     * @return int Value of `max_index_interval` or null
     */
    function maxIndexInterval();

    /**
     * Returns the value of `min_index_interval`
     * @return int Value of `min_index_interval` or null
     */
    function minIndexInterval();

    /**
     * Returns column by name
     * @param  string           $name Name of the column
     * @return \Cassandra\Column       Column instance
     */
    function column($name);

    /**
     * Returns all columns in this table
     * @return array A list of `Cassandra\Column` instances
     */
    function columns();
}

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



/**
 * A PHP representation of the CQL `timestamp` datatype
 */
final class Timestamp implements Value
{
    /**
     * Creates a new timestamp from either unix timestamp and microseconds or
     * from the current time by default.
     *
     * @param int $time Unix timestamp
     * @param int $usec Microseconds
     */
    public function __construct($time = null, $usec = null) {}

    /**
     * The type of this timestamp.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Unix timestamp.
     *
     * @return int seconds
     * @see time
     */
    public function time() {}

    /**
     * Microtime from this timestamp
     *
     * @param bool $get_as_float Whther to get this value as float
     *
     * @return float|string Float or string representation
     * @see microtime
     */
    public function microtime($get_as_float = false) {}

    /**
     * Converts current timestamp to PHP DateTime.
     *
     * @return \DateTime PHP representation
     */
    public function toDateTime() {}

    /**
     * Returns a string representation of this timestamp.
     *
     * @return string timestamp
     */
    public function __toString() {}
}

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



/**
 * A PHP representation of the CQL `timeuuid` datatype
 */
final class Timeuuid implements Value, UuidInterface
{
    /**
     * Creates a timeuuid from a given timestamp or current time.
     *
     * @param int $timestamp Unix timestamp
     */
    public function __construct($timestamp = null) {}

    /**
     * The type of this timeuuid.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns this timeuuid as string.
     *
     * @return string timeuuid
     */
    public function __toString() {}

    /**
     * Returns this timeuuid as string.
     *
     * @return string timeuuid
     */
    public function uuid() {}

    /**
     * Returns the version of this timeuuid.
     *
     * @return int version of this timeuuid
     */
    public function version() {}

    /**
     * Unix timestamp.
     *
     * @return int seconds
     * @see time
     */
    public function time() {}

    /**
     * Converts current timeuuid to PHP DateTime.
     *
     * @return \DateTime PHP representation
     */
    public function toDateTime() {}
}

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
     * 
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
     * 
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
     * 
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



/**
 * A PHP representation of the CQL `uuid` datatype
 */
final class Uuid implements Value, UuidInterface
{
    /**
     * Creates a uuid from a given uuid string or a random one.
     *
     * @param string $uuid A uuid string
     */
    public function __construct($uuid = null) {}

    /**
     * Returns this uuid as string.
     *
     * @return string uuid
     */
    public function __toString() {}

    /**
     * The type of this uuid.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns this uuid as string.
     *
     * @return string uuid
     */
    public function uuid() {}

    /**
     * Returns the version of this uuid.
     *
     * @return int version of this uuid
     */
    public function version() {}
}

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



/**
 * A PHP representation of the CQL `timeuuid` datatype
 */
interface UuidInterface
{
    /**
     * Returns this uuid as string.
     *
     * @return string uuid as string
     */
    public function uuid();

    /**
     * Returns the version of this uuid.
     *
     * @return int version of this uuid
     */
    public function version();
}

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



/**
 * Common interface implemented by all Cassandra value types.
 *
 * @see Bigint
 * @see Blob
 * @see Collection
 * @see Float
 * @see Inet
 * @see Map
 * @see Set
 * @see Timestamp
 * @see Timeuuid
 * @see Uuid
 * @see Varint
 *
 * @see Numeric
 * @see UuidInterface
 */
interface Value
{
    /**
     * The type of represented by the value.
     *
     * @return Type
     */
    function type();
}

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



/**
 * A PHP representation of the CQL `varint` datatype
 */
final class Varint implements Value, Numeric
{
    /**
     * Creates a new variable length integer.
     *
     * @param string $value integer value as a string
     */
    public function __construct($value) {}

    /**
     * Returns the integer value.
     *
     * @return string integer value
     */
    public function __toString() {}

    /**
     * The type of this varint.
     *
     * @return Type
     */
    public function type() {}

    /**
     * Returns the integer value.
     *
     * @return string integer value
     */
    public function value() {}

    /**
     * @param Numeric $addend a number to add to this one
     *
     * @return Numeric sum
     */
    public function add(Numeric $addend) {}

    /**
     * @param Numeric $subtrahend a number to subtract from this one
     *
     * @return Numeric difference
     */
    public function sub(Numeric $subtrahend) {}

    /**
     * @param Numeric $multiplier a number to multiply this one by
     *
     * @return Numeric product
     */
    public function mul(Numeric $multiplier) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric quotient
     */
    public function div(Numeric $divisor) {}

    /**
     * @param Numeric $divisor a number to divide this one by
     *
     * @return Numeric remainder
     */
    public function mod(Numeric $divisor) {}

    /**
     * @return Numeric absolute value
     */
    public function abs() {}

    /**
     * @return Numeric negative value
     */
    public function neg() {}

    /**
     * @return Numeric square root
     */
    public function sqrt() {}

    /**
     * @return int this number as int
     */
    public function toInt() {}

    /**
     * @return float this number as float
     */
    public function toDouble() {}
}

}

namespace Cassandra\Cluster {
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



/**
 * Cluster builder allows fluent configuration of the cluster instance.
 *
 * @see \Cassandra::cluster()
 */
final class Builder
{
    /**
     * Returns a Cluster Instance.
     *
     * @return \Cassandra\Cluster Cluster instance
     */
    public function build() {}

    /**
     * Configures default consistency for all requests.
     *
     * @param int $consistency A consistency level, must be one of Cassandra::CONSISTENCY_* values
     *
     * @return Builder self
     */
    public function withDefaultConsistency($consistency) {}

    /**
     * Configures default page size for all results.
     * Set to `null` to disable paging altogether.
     *
     * @param int|null $pageSize default page size
     *
     * @return Builder self
     */
    public function withDefaultPageSize($pageSize) {}

    /**
     * Configures default timeout for future resolution in blocking operations
     * Set to null to disable (default).
     *
     * @param float|null $timeout Timeout value in seconds, can be fractional
     *
     * @return Builder self
     */
    public function withDefaultTimeout($timeout) {}

    /**
     * Configures the initial endpoints. Note that the driver will
     * automatically discover and connect to the rest of the cluster.
     *
     * @param string $host,... one or more ip addresses or hostnames
     *
     * @return Builder self
     */
    public function withContactPoints($host) {}

    /**
     * Specify a different port to be used when connecting to the cluster.
     *
     * @throws \Cassandra\Exception\InvalidArgumentException
     *
     * @param int $port a number between 1 and 65535
     *
     * @return Builder self
     */
    public function withPort($port) {}

    /**
     * Configures this cluster to use a round robin load balancing policy.
     *
     * @return Builder self
     */
    public function withRoundRobinLoadBalancingPolicy() {}

    /**
     * Configures this cluster to use a datacenter aware round robin load balancing policy.
     *
     * @param string $localDatacenter                          Name of the local datacenter
     * @param int    $hostPerRemoteDatacenter                  Maximum number of hosts to try in remote datacenters
     * @param bool   $useRemoteDatacenterForLocalConsistencies Allow using hosts from remote datacenters to execute statements with local consistencies
     *
     * @return Builder self
     */
    public function withDatacenterAwareRoundRobinLoadBalancingPolicy($localDatacenter, $hostPerRemoteDatacenter, $useRemoteDatacenterForLocalConsistencies) {}

    /**
     * Enable token aware routing.
     *
     * @param bool $enabled Whether to enable token aware routing (optional)
     *
     * @return Builder self
     */
    public function withTokenAwareRouting($enabled = true) {}

    /**
     * Configures cassandra authentication.
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return Builder self
     */
    public function withCredentials($username, $password) {}

    /**
     * Timeout used for establishing TCP connections.
     *
     * @param float $timeout Timeout value in seconds, can be fractional
     *
     * @return Builder self
     */
    public function withConnectTimeout($timeout) {}

    /**
     * Timeout used for waiting for a response from a node.
     *
     * @param float $timeout Timeout value in seconds, can be fractional
     *
     * @return Builder self
     */
    public function withRequestTimeout($timeout) {}

    /**
     * Set up ssl context.
     *
     * @param \Cassandra\SSLOptions $options a preconfigured ssl context
     *
     * @return Builder self
     */
    public function withSSL(\Cassandra\SSLOptions $options) {}

    /**
     * Enable persistent sessions and clusters.
     *
     * @param bool $enabled whether to enable persistent sessions and clusters
     *                      (optional)
     *
     * @return Builder self
     */
    public function withPersistentSessions($enabled = true) {}

    /**
     * Force the driver to use a specific binary protocol version.
     *
     * * Apache Cassandra 1.2+ supports protocol version 1
     * * Apache Cassandra 2.0+ supports protocol version 2
     *
     * @param int $version the actual protocol version, only `1` or `2`
     *                         are supported
     *
     * @return Builder self
     */
    public function withProtocolVersion($version) {}

    /**
     * Total number of IO threads to use for handling the requests.
     *
     * Note: number of io threads * core connections per host <= total number of connections <= number of io threads * max connections per host
     *
     * @param int $count total number of threads.
     *
     * @return Builder self
     */
    public function withIOThreads($count) {}

    /**
     * Set the size of connection pools used by the driver. Pools are fixed
     * when only `$core` is given, when a `$max` is specified as well,
     * additional connections will be created automatically based on current
     * load until the maximum number of connection has been reached. When
     * request load goes down, extra connections are automatically cleaned up
     * until only the core number of connections is left.
     *
     * @param int $core minimum connections to keep open to any given host
     * @param int $max  maximum connections to keep open to any given host
     *
     * @return Builder self
     */
    public function withConnectionsPerHost($core = 1, $max = 2) {}

    /**
     * Specify interval in seconds that the driver should wait before attempting
     * to re-establish a closed connection.
     *
     * @param float $interval interval in seconds
     *
     * @return Builder self
     */
    public function withReconnectInterval($interval) {}

    /**
     * Enables/disables latency-aware routing.
     *
     * @param bool $enabled whether to actually enable or disable the routing.
     *
     * @return Builder self
     */
    public function withLatencyAwareRouting($enabled = true) {}

    /**
     * Disables nagle algorithm for lower latency.
     *
     * @param bool $enabled whether to actually enable or disable nodelay.
     *
     * @return Builder self
     */
    public function withTCPNodelay($enabled = true) {}

    /**
     * Enables/disables TCP keepalive.
     *
     * @param float|null $delay the period of inactivity in seconds, after
     *                          which the keepalive probe should be sent over
     *                          the connection. If set to `null`, disables
     *                          keepalive probing.
     *
     * @return Builder self
     */
    public function withTCPKeepalive($delay) {}
}

}

namespace Cassandra\Exception {
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



/**
 * AlreadyExistsException is raised when attempting to re-create existing keyspace.
 */
class AlreadyExistsException extends ConfigurationException {}

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



/**
 * AuthenticationException is raised when client was not configured with valid
 * authentication credentials.
 */
class AuthenticationException extends RuntimeException {}

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



/**
 * ConfigurationException is raised when query is syntactically correct but
 * invalid because of some configuration issue.
 * For example when attempting to drop a non-existent keyspace.
 */
class ConfigurationException extends ValidationException {}

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



/**
 * Cassandra-specific domain exception.
 */
class DivideByZeroException extends RangeException {}

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



/**
 * Cassandra-specific domain exception.
 */
class DomainException extends \DomainException implements \Cassandra\Exception {}

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



/**
 * ExecutionException is raised when something went wrong during request execution.
 * @see TruncateException
 * @see UnavailableException
 * @see ReadTimeoutException
 * @see WriteTimeoutException
 */
class ExecutionException extends RuntimeException {}

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



/**
 * Cassandra-specific invalid argument exception.
 */
class InvalidArgumentException extends \InvalidArgumentException implements \Cassandra\Exception {}

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



/**
 * InvalidQueryException is raised when query is syntactically correct but invalid.
 * For example when attempting to create a table without specifying a keyspace.
 */
class InvalidQueryException extends ValidationException {}

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



/**
 * InvalidSyntaxException is raised when CQL in the request is syntactically incorrect.
 */
class InvalidSyntaxException extends ValidationException {}

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



/**
 * IsBootstrappingException is raised when a node is bootstrapping.
 */
class IsBootstrappingException extends ServerException {}

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




/**
 * Cassandra-specific logic exception.
 */
class LogicException extends \LogicException implements \Cassandra\Exception {}

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



/**
 * OverloadedException is raised when a node is overloaded.
 */
class OverloadedException extends ServerException {}

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



/**
 * ProtocolException is raised when a client did not follow Apache Cassandra
 * protocol, e.g. sending a QUERY message before STARTUP. Seeing this error can
 * be considered a bug.
 */
class ProtocolException extends RuntimeException {}

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



/**
 * Cassandra-specific domain exception.
 */
class RangeException extends \RangeException implements \Cassandra\Exception {}

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



/**
 * ReadTimeoutException is raised when a coordinator failed to receive acks
 * from the required number of replica nodes in time during a read.
 * @see https://github.com/apache/cassandra/blob/cassandra-2.1/doc/native_protocol_v1.spec#L709-L726 Description of ReadTimeout error in the native protocol spec
 */
class ReadTimeoutException extends ExecutionException {}

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



/**
 * Cassandra-specific runtime exception.
 */
class RuntimeException extends \RuntimeException implements \Cassandra\Exception {}

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



/**
 * ServerException is raised when something unexpected happend on the server.
 * This exception is most likely due to an Apache Cassandra bug.
 * **NOTE** This exception and all its children are generated on the server.
 */
class ServerException extends RuntimeException {}

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



/**
 * TimeoutException is generally raised when a future did not resolve
 * within a given time interval.
 */
class TimeoutException extends RuntimeException {}

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



/**
 * TruncateException is raised when something went wrong during table
 * truncation.
 */
class TruncateException extends ExecutionException {}

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



/**
 * UnauthorizedException is raised when the current user doesn't have
 * sufficient permissions to access data.
 */
class UnauthorizedException extends ValidationException {}

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



/**
 * UnavailableException is raised when a coordinator detected that there aren't
 * enough replica nodes available to fulfill the request.
 *
 * NOTE: Request has not even been forwarded to the replica nodes in this case.
 * @see https://github.com/apache/cassandra/blob/cassandra-2.1/doc/native_protocol_v1.spec#L667-L677 Description of the Unavailable error in the native protocol v1 spec.
 */
class UnavailableException extends ExecutionException {}

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



/**
 * UnpreparedException is raised when a given prepared statement id does not
 * exist on the server. The driver should be automatically re-preparing the
 * statement in this case. Seeing this error could be considered a bug.
 */
class UnpreparedException extends ValidationException {}

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



/**
 * ValidationException is raised on invalid request, before even attempting to
 * execute it.
 * @see Cassandra\Exception\InvalidSyntaxException
 * @see Cassandra\Exception\UnauthorizedException
 * @see Cassandra\Exception\InvalidQueryException
 * @see Cassandra\Exception\ConfigurationException
 * @see Cassandra\Exception\AlreadyExistsException
 * @see Cassandra\Exception\UnpreparedException
 */
class ValidationException extends RuntimeException {}

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



/**
 * WriteTimeoutException is raised when a coordinator failed to receive acks
 * from the required number of replica nodes in time during a write.
 * @see https://github.com/apache/cassandra/blob/cassandra-2.1/doc/native_protocol_v1.spec#L683-L708 Description of WriteTimeout error in the native protocol spec
 */
class WriteTimeoutException extends ExecutionException {}

}

namespace Cassandra\SSLOptions {
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



/**
 * SSLOptions builder allows fluent configuration of ssl options.
 *
 * @see \Cassandra::ssl()
 * @see \Cassandra\Cluster\Builder::withSSL()
 */
final class Builder
{
    /**
     * Adds a trusted certificate. This is used to verify node's identity.
     *
     * @throws \Cassandra\Exception\InvalidArgumentException
     *
     * @param string $path,... one or more paths to files containing a PEM formatted certificate.
     *
     * @return Builder self
     */
    public function withTrustedCerts($path) {}

    /**
     * Disable certificate verification.
     *
     * @throws \Cassandra\Exception\InvalidArgumentException
     *
     * @param int $flags
     *
     * @return Builder self
     */
    public function withVerifyFlags($flags) {}

    /**
     * Set client-side certificate chain.
     *
     * This is used to authenticate the client on the server-side. This should contain the entire Certificate
     * chain starting with the certificate itself.
     *
     * @throws \Cassandra\Exception\InvalidArgumentException
     *
     * @param string $path path to a file containing a PEM formatted certificate.
     *
     * @return Builder self
     */
    public function withClientCert($path) {}

    /**
     * Set client-side private key. This is used to authenticate the client on
     * the server-side.
     *
     * @throws \Cassandra\Exception\InvalidArgumentException
     *
     * @param string      $path       Path to the private key file
     * @param string|null $passphrase Passphrase for the private key, if any
     *
     * @return Builder self
     */
    public function withPrivateKey($path, $passphrase = null) {}

    /**
     * Builds SSL options.
     *
     * @return \Cassandra\SSLOptions ssl options configured accordingly.
     */
    public function build() {}
}

}

namespace Cassandra\Type {
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



final class Collection implements \Cassandra\Type
{
    /**
     * Returns "list"
     * @return string "list"
     */
    public function name() {}

    /**
     * Returns type representation in CQL, e.g. `list<varchar>`
     * @return string Type representation in CQL
     */
    public function __toString() {}

    /**
     * Returns type of values
     * @return \Cassandra\Type Type of values
     */
    public function type() {}

    /**
     * Creates a new Cassandra\Collection from the given values.
     *
     * @throws \Exception|\InvalidArgumentException when values given are of a
     *                                            different type than what this
     *                                            list type expects.
     *
     * @param  mixed $value,...      One or more values to be added to the list.
     *                               When no values given, creates an empty list.
     * @return \Cassandra\Collection  A list with given values.
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



final class Custom implements \Cassandra\Type
{
    /**
     * {@inheritDoc}
     *
     * @return string The name of this type
     */
    public function name() {}

    /**
     * {@inheritDoc}
     *
     * @return string String representation of this type
     */
    public function __toString() {}

    /**
     * Creation of custom type instances is not supported
     *
     * @throws \Cassandra\Exception\LogicException
     *
     * @param  mixed $value the value
     * @return null         nothing
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
     * 
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



final class Set implements \Cassandra\Type
{
    /**
     * Returns "set"
     * @return string "set"
     */
    public function name() {}

    /**
     * Returns type representation in CQL, e.g. `set<varchar>`
     * @return string Type representation in CQL
     */
    public function __toString() {}

    /**
     * Returns type of values
     * @return \Cassandra\Type Type of values
     */
    public function type() {}

    /**
     * Creates a new Cassandra\Set from the given values.
     *
     * @throws \Exception|\InvalidArgumentException when values given are of a
     *                                            different type than what this
     *                                            set type expects.
     *
     * @param  mixed $value,... One or more values to be added to the set. When
     *                          no values are given, creates an empty set.
     * @return \Cassandra\Set    A set with given values.
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

}

namespace  {
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

/**
 * The main entry point to the PHP Driver for Apache Cassandra.
 *
 * Use Cassandra::cluster() to build a cluster instance.
 * Use Cassandra::ssl() to build SSL options instance.
 */
final class Cassandra
{
    /**
     * Consistency level ANY means the request is fulfilled as soon as the data
     * has been written on the Coordinator. Requests with this consistency level
     * are not guranteed to make it to Replica nodes.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_ANY = 0;

    /**
     * Consistency level ONE gurantess that data has been written to at least
     * one Replica node.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_ONE = 1;

    /**
     * Same as `CONSISTENCY_ONE`, but confined to the local data center. This
     * consistency level works only with `NetworkTopologyStrategy` replication.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_LOCAL_ONE = 10;
    /**
     * Consistency level TWO gurantess that data has been written to at least
     * two Replica nodes.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_TWO = 2;

    /**
     * Consistency level THREE gurantess that data has been written to at least
     * three Replica nodes.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_THREE = 3;

    /**
     * Consistency level QUORUM gurantess that data has been written to at least
     * the majority of Replica nodes. How many nodes exactly are a majority
     * depends on the replication factor of a given keyspace and is calculated
     * using the formula `ceil(RF / 2 + 1)`, where `ceil` is a mathematical
     * ceiling function and `RF` is the replication factor used. For example,
     * for a replication factor of `5`, the majority is `ceil(5 / 2 + 1) = 3`.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_QUORUM = 4;

    /**
     * Same as `CONSISTENCY_QUORUM`, but confined to the local data center. This
     * consistency level works only with `NetworkTopologyStrategy` replication.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_LOCAL_QUORUM = 6;

    /**
     * Consistency level EACH_QUORUM gurantess that data has been written to at
     * least a majority Replica nodes in all datacenters. This consistency level
     * works only with `NetworkTopologyStrategy` replication.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_EACH_QUORUM = 7;

    /**
     * Consistency level ALL gurantess that data has been written to all
     * Replica nodes.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_ALL = 5;

    /**
     * This is a serial consistency level, it is used in conditional updates,
     * e.g. (`CREATE|INSERT ... IF NOT EXISTS`), and should be specified as the
     * `serial_consistency` option of the Cassandra\ExecutionOptions instance.
     *
     * Consistency level SERIAL, when set, ensures that a Paxos commit fails if
     * any of the replicas is down.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_SERIAL = 8;

    /**
     * Same as `CONSISTENCY_SERIAL`, but confined to the local data center. This
     * consistency level works only with `NetworkTopologyStrategy` replication.
     *
     * @see Cassandra\ExecutionOptions::__construct()
     */
    const CONSISTENCY_LOCAL_SERIAL = 9;

    /**
     * Perform no verification of Cassandra nodes when using SSL encryption.
     *
     * @see Cassandra\SSLOptions\Builder::withVerifyFlags()
     */
    const VERIFY_NONE          = 0;

    /**
     * Verify presence and validity of SSL certificates of Cassandra.
     *
     * @see Cassandra\SSLOptions\Builder::withVerifyFlags()
     */
    const VERIFY_PEER_CERT     = 1;

    /**
     * Verify that the IP address matches the SSL certificate’s common name or
     * one of its subject alternative names. This implies the certificate is
     * also present.
     *
     * @see Cassandra\SSLOptions\Builder::withVerifyFlags()
     */
    const VERIFY_PEER_IDENTITY = 2;

    /**
     * @see Cassandra\BatchStatement::__construct()
     */
    const BATCH_LOGGED = 0;

    /**
     * @see Cassandra\BatchStatement::__construct()
     */
    const BATCH_UNLOGGED = 1;

    /**
     * @see Cassandra\BatchStatement::__construct()
     */
    const BATCH_COUNTER = 2;

    /**
     * When using a map, collection or set of type text, all of its elements
     * must be strings.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_TEXT = 'text';

    /**
     * When using a map, collection or set of type ascii, all of its elements
     * must be strings.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_ASCII = 'ascii';

    /**
     * When using a map, collection or set of type varchar, all of its elements
     * must be strings.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_VARCHAR = 'varchar';

    /**
     * When using a map, collection or set of type bigint, all of its elements
     * must be instances of Bigint.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_BIGINT = 'bigint';

    /**
     * When using a map, collection or set of type blob, all of its elements
     * must be instances of Blob.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_BLOB = 'blob';

    /**
     * When using a map, collection or set of type boolean, all of its elements
     * must be booleans.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_BOOLEAN = 'boolean';

    /**
     * When using a map, collection or set of type counter, all of its elements
     * must be instances of Bigint.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_COUNTER = 'counter';

    /**
     * When using a map, collection or set of type decimal, all of its elements
     * must be instances of Decimal.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_DECIMAL = 'decimal';

    /**
     * When using a map, collection or set of type double, all of its elements
     * must be doubles.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_DOUBLE = 'double';

    /**
     * When using a map, collection or set of type float, all of its elements
     * must be instances of Float.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_FLOAT = 'float';

    /**
     * When using a map, collection or set of type int, all of its elements
     * must be ints.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_INT = 'int';

    /**
     * When using a map, collection or set of type timestamp, all of its elements
     * must be instances of Timestamp.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_TIMESTAMP = 'timestamp';

    /**
     * When using a map, collection or set of type uuid, all of its elements
     * must be instances of Uuid.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_UUID = 'uuid';

    /**
     * When using a map, collection or set of type varint, all of its elements
     * must be instances of Varint.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_VARINT = 'varint';

    /**
     * When using a map, collection or set of type timeuuid, all of its elements
     * must be instances of Timeuuid.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_TIMEUUID = 'timeuuid';

    /**
     * When using a map, collection or set of type inet, all of its elements
     * must be instances of Inet.
     *
     * @see Cassandra\Set::__construct()
     * @see Cassandra\Collection::__construct()
     * @see Cassandra\Map::__construct()
     */
    const TYPE_INET = 'inet';

    /**
     * Current version of the extension.
     */
    const VERSION = '1.1';

    /**
     * Version of the cpp-driver the extension is compiled against.
     */
    const CPP_DRIVER_VERSION = '2.2.2';

    /**
     * Returns a Cluster Builder.
     *
     * @return Cassandra\Cluster\Builder a Cluster Builder instance
     */
    public static function cluster() {}

    /**
     * Returns SSL Options Builder.
     *
     * @return Cassandra\SSLOptions\Builder an SSLOptions Builder instance
     */
    public static function ssl() {}
}

}

