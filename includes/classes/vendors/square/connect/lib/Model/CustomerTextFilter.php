<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * CustomerTextFilter Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 * Note: This endpoint is in beta.
 */
class CustomerTextFilter implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'exact' => 'string',
        'fuzzy' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'exact' => 'exact',
        'fuzzy' => 'fuzzy'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'exact' => 'setExact',
        'fuzzy' => 'setFuzzy'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'exact' => 'getExact',
        'fuzzy' => 'getFuzzy'
    );
  
    /**
      * $exact Use the exact filter to select customers whose attributes match exactly the specified query.
      * @var string
      */
    protected $exact;
    /**
      * $fuzzy Use the fuzzy filter to select customers whose attributes match the specified query  in a fuzzy manner. When the fuzzy option is used, search queries are tokenized, and then  each query token must be matched somewhere in the searched attribute. For single token queries,  this is effectively the same behavior as a partial match operation.
      * @var string
      */
    protected $fuzzy;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["exact"])) {
              $this->exact = $data["exact"];
            } else {
              $this->exact = null;
            }
            if (isset($data["fuzzy"])) {
              $this->fuzzy = $data["fuzzy"];
            } else {
              $this->fuzzy = null;
            }
        }
    }
    /**
     * Gets exact
     * @return string
     */
    public function getExact()
    {
        return $this->exact;
    }
  
    /**
     * Sets exact
     * @param string $exact Use the exact filter to select customers whose attributes match exactly the specified query.
     * @return $this
     */
    public function setExact($exact)
    {
        $this->exact = $exact;
        return $this;
    }
    /**
     * Gets fuzzy
     * @return string
     */
    public function getFuzzy()
    {
        return $this->fuzzy;
    }
  
    /**
     * Sets fuzzy
     * @param string $fuzzy Use the fuzzy filter to select customers whose attributes match the specified query  in a fuzzy manner. When the fuzzy option is used, search queries are tokenized, and then  each query token must be matched somewhere in the searched attribute. For single token queries,  this is effectively the same behavior as a partial match operation.
     * @return $this
     */
    public function setFuzzy($fuzzy)
    {
        $this->fuzzy = $fuzzy;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
