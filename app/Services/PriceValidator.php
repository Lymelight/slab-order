<?php namespace \App\Http\Requests;

use \Illuminate\Validation\Validator as Validator;


class PriceValidator extends Validator {
/** Tabled for future work at a time when time is not a factor **/

    private $_custom_messages = array(
        "price" => "The :attribute may only contain numbers and up to one decimal point"
    );

    public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);

        $this->_set_custom_messages();
    }

    /**
     *Set the custom messages
     *
     * @return void
     */
    protected function _set_custom_messages(){
        $this->setCustomMessages($this->_custom_messages);
    }

    /**
     * @param string $attribute
     * @param $value
     * @return bool
     */
    protected function validatePrice($attribute, $value)
    {
        return (bool) preg_match("^\d{1,4}\.\d{0,2}$", $value);
    }
}