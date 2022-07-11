<?php
    
    /////////////////////////////////////////
    //          Country model              //
    /////////////////////////////////////////

    class Country{

        //fields
        private $db_conn;
        
        //properties
        public $alpha3Code;
        public $m49Code;
        public $countinentTitle;
        public $regionTitle;

        //constructor
        public function __construct($db){
            $this->db_conn = $db;
        }
            //<<template>>
            //build query
            //prepare PDO statment
            //bind parameters
            //excute stetment
            //handle resulte


        //retrieve all data from database
        public function getAllCountries(){
            //build query
            $query = "SELECT 
                     `cy`.`countryId` as `Id`, 
                     `cy`.`title` as `Title`, 
                     `cy`.`alpha3Code` as `ISO_Alpha3_Code`,
                     `cy`.`m49Code` as `M49_Code`,
                     `re`.`title` as `Region`,
                     `ct`.`title` as `Countinent`, 
                     `cy`.`note` as `Note` 
                     FROM `countries` cy 
                     JOIN `countinents` ct ON cy.countinentId = ct.countinentId 
                     JOIN `regions` re on cy.regionId = re.regionId; ";
            
            //prepare PDO statment
            $stmt = $this->db_conn->prepare($query);
            
            //bind parameters(no param to bind)
            //excute stetment
            $stmt->execute();

            //handle resulte
            $data = $stmt->FETCHALL();
            return $data;
        }

        //retrieve single data by alphacode from database
        public function getSingleCountyByAlphaCode(){
            //build query
            $query = "SELECT 
                        `cy`.`countryId` as `Id`, 
                        `cy`.`title` as `Title`, 
                        `cy`.`alpha3Code` as `ISO_Alpha3_Code`,
                        `cy`.`m49Code` as `M49_Code`,
                        `re`.`title` as `Region`,
                        `ct`.`title` as `Countinent`, 
                        `cy`.`note` as `Note` 
                        FROM `countries` cy 
                        JOIN `countinents` ct ON cy.countinentId = ct.countinentId 
                        JOIN `regions` re on cy.regionId = re.regionId 
                        WHERE `cy`.`alpha3Code` = ? ";
            
            //prepare PDO statment
            $stmt = $this->db_conn->prepare($query);
            
            //bind parameters
            $stmt->bindParam(1, $this->alpha3Code);
            //excute stetment
            $stmt->execute();

            //fetch data, clear statment
            $data = $stmt->FETCHALL();
            $stmt=null;

            //return result
            return $data;
        }

        //retrieve single data by m49 code from database
        public function getSingleCountyByM49Code(){
            //build query
            $query = "SELECT 
                        `cy`.`countryId` as `Id`, 
                        `cy`.`title` as `Title`, 
                        `cy`.`alpha3Code` as `ISO_Alpha3_Code`,
                        `cy`.`m49Code` as `M49_Code`,
                        `re`.`title` as `Region`,
                        `ct`.`title` as `Countinent`, 
                        `cy`.`note` as `Note` 
                        FROM `countries` cy 
                        JOIN `countinents` ct ON cy.countinentId = ct.countinentId 
                        JOIN `regions` re on cy.regionId = re.regionId 
                        WHERE `cy`.`m49Code` = ? ";
            
            //prepare PDO statment
            $stmt = $this->db_conn->prepare($query);
            
            //bind parameters
            $stmt->bindParam(1, $this->m49Code);
            //excute stetment
            $stmt->execute();

            //fetch data, clear statment
            $data = $stmt->FETCHALL();
            $stmt=null;

            //return result
            return $data;
        }

        //retrieve group data by countinent from database
        public function getCountyByCountinent(){
            //build query
            $query = "SELECT 
                        `cy`.`countryId` as `Id`, 
                        `cy`.`title` as `Title`, 
                        `cy`.`alpha3Code` as `ISO_Alpha3_Code`,
                        `cy`.`m49Code` as `M49_Code`,
                        `re`.`title` as `Region`,
                        `ct`.`title` as `Countinent`, 
                        `cy`.`note` as `Note` 
                        FROM `countries` cy 
                        JOIN `countinents` ct ON cy.countinentId = ct.countinentId 
                        JOIN `regions` re on cy.regionId = re.regionId 
                        WHERE `ct`.`title` = ? ";
            
            //prepare PDO statment
            $stmt = $this->db_conn->prepare($query);
            
            //bind parameters
            $stmt->bindParam(1, $this->countinentTitle);
            //excute stetment
            $stmt->execute();

            //fetch data, clear statment
            $data = $stmt->FETCHALL();
            $stmt=null;

            //return result
            return $data;
        }

        //retrieve group data by region from database
        public function getCountyByRegion(){
            //build query
            $query = "SELECT 
                        `cy`.`countryId` as `Id`, 
                        `cy`.`title` as `Title`, 
                        `cy`.`alpha3Code` as `ISO_Alpha3_Code`,
                        `cy`.`m49Code` as `M49_Code`,
                        `re`.`title` as `Region`,
                        `ct`.`title` as `Countinent`, 
                        `cy`.`note` as `Note` 
                        FROM `countries` cy 
                        JOIN `countinents` ct ON cy.countinentId = ct.countinentId 
                        JOIN `regions` re on cy.regionId = re.regionId 
                        WHERE `re`.`title` = ? ";
            
            //prepare PDO statment
            $stmt = $this->db_conn->prepare($query);
            
            //bind parameters
            $stmt->bindParam(1, $this->regionTitle);
            //excute stetment
            $stmt->execute();

            //fetch data, clear statment
            $data = $stmt->FETCHALL();
            $stmt=null;

            //return result
            return $data;
        }

    }

?>