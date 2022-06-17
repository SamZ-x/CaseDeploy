<?php

    class Calculation{

        //properties
        private $operator;
        private $num1;
        private $num2;

        //constructor
        public function __construct(string $operator, int $num1, int $num2){
            $this->operator = $operator;
            $this->num1 = $num1;
            $this->num2 = $num2;
        }

        //class method
        public function GetResult(){
            switch($this->operator ) 
            {
                case 'add':
                    return $this->num1 +  $this->num2;
                    break;
                case 'minus':
                    return $this->num1 - $this->num2;
                    break;
                case 'divide':
                    return $this->num1 /  $this->num2;
                    break;
                case 'multiply':
                    return $this->num1 *  $this->num2;
                    break;
            }
        }
    }

?>