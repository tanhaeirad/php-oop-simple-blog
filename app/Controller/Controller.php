<?php namespace App\Controller;

use App\Helper\Validation;
use Plasticbrain\FlashMessages\FlashMessages;


class Controller
{
    public $flash;

    function __construct()
    {
        $this->flash = new FlashMessages();
    }

    public function validation($data, $rules)
    {
        $validation = new Validation();

        $valid = $validation->make($data, $rules);

        if (!$valid) {
            foreach ($validation->getErrors() as $error) {
                $this->flash->error($error[0]);
            }
            return false;
        }

        return true;
    }


}