<?php

class RequestService
{
    /**
     * Property which will be checked if it's null or not
     *
     * @var string
     */
    protected $identityKey = '__identity';


    /**
     * @param string $identityKey
     */
    public function setIdentityKey($identityKey)
    {
        $this->identityKey = $identityKey;
    }

    /**
     * @return string
     */
    public function getIdentityKey()
    {
        return $this->identityKey;
    }


    /**
     * Scan the request and resolve the empty __identity fields
     * @param array $fields
     * @return array|boolean
     */
    public function resolveEmptyIdentityFields($fields)
    {
        $_fields = [];

        foreach ($fields as $key => $field) {

            if (is_array($field)) {
                $loopFields = $this->resolveEmptyIdentityFields($field);
                if($loopFields){
                    $_fields[$key] = $loopFields;
                }
            } else {
                if ($key == $this->identityKey && $field) {
                    $_fields[$key] = $field;
                }

            }

        }

        if(count($_fields)){
            return $_fields;
        }

        return false;
    }
}