<?php
    /**
     * Created by PhpStorm.
     * User: Radd, Norrin
     * Date: 6/22/2022
     * Time: 3:42 PM
     */

    namespace lookon\lib\import;

    use PDO;
    use PDOException;
    use function array_keys;
    use function implode;

    /**
     *  Class CompanyStore
     *
     *  Handles interactions with the database
     */
    class CompanyStore
    {
        /**
         * @var
         */
        private $_db;

        /**
         * @param $db
         */
        public function __construct( $db)
        {
            $this->_db = $db;
        }

        /**
         * @param array $company
         * @return bool
         */
        public function insertCompany ( array $company ): int
        {
            $error = true;

            $column_keys = array_keys($company);
            $columns_string = implode(',', $column_keys );
            $placeholders = ':'. implode( ",:", $column_keys ) ;

            $stmt=$this->_db->prepare("INSERT INTO companies (" . $columns_string . ") VALUES (" . $placeholders . ")");

            /*
            echo "Data:\n";
            var_export($company);
            echo "\n\n";

            echo "Column Keys:\n";
            var_export($column_keys);
            echo "\n\n";

            echo "Placeholders:\n";
            var_export($placeholders);
            echo "\n\n";
            */

            try{
                $stmt->execute ($company);
                echo "Inserted " . $company['company_name'] . "\n";
                $error = false;
            }
            catch(PDOException $exception)
            {
                echo "Insert Failed for company " . $company['company_name'] . "\n";
                echo "Line:".$exception->getLine ()."\n";
                echo "Message:".$exception->getMessage ()."\n";
            }

            return !$error?$this->_db->lastInsertId():false;
        }

        /**
         * @param array $company
         * @return bool
         */
        public function updateCompany ( array $company ): bool
        {
            $error = true;
            $sets=[];

            $column_keys = array_keys($company);

            foreach($column_keys as $column_key){
                if($column_key != 'uid')
                    $sets[] = "$column_key=:$column_key";
            }

            $set_sql = implode(',',$sets);

            $stmt=$this->_db->prepare("UPDATE companies set $set_sql WHERE uid=:uid");

            try{
                $stmt->execute ($company);
                //echo "Updated " . $company['company_name'] . "\n";
                $error = false;
            }
            catch(PDOException $exception)
            {
                echo "Update Failed for company " . $company['company_name'] . "\n";
                echo "Line:".$exception->getLine ()."\n";
                echo "Message:".$exception->getMessage ()."\n";
            }

            return !$error;
        }
    }
