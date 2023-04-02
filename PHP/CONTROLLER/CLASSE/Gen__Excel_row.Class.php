<?php class Gen__Excel_row
{

    /*****************Attributs***************** */
    private $_id_excel_row;
    private $_name;
    private $_to_table;
    private $_to_column;
    private $_data;
   

    private static $_attributes = [];
    public function __construct(array $options = [])
    {
        self::$_attributes = get_class_vars(get_class($this));
        if (!empty($options)) // empty : renvoi vrai si le tableau est vide
        {
            $this->hydrate($options);
        }
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            
            $key = substr($key, 1);
            $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
            if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
            {
                $this->$methode($value);
            }
        }
    }
    
     /**
     * Get the value of _parameters
     */ 
    public static function getAttributes()
    {
        return self::$_attributes;
    }  


    /**
     * Get the value of _id_excel_row
     */ 
    public function getId_excel_row()
    {
        return $this->_id_excel_row;
    }

    /**
     * Set the value of _id_excel_row
     *
     * @return  self
     */ 
    public function setId_excel_row($_id_excel_row)
    {
        $this->_id_excel_row = $_id_excel_row;

        return $this;
    }

    /**
     * Get the value of _name
     */ 
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the value of _name
     *
     * @return  self
     */ 
    public function setName($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get the value of _to_table
     */ 
    public function getTo_table()
    {
        return $this->_to_table;
    }

    /**
     * Set the value of _to_table
     *
     * @return  self
     */ 
    public function setTo_table($_to_table)
    {
        $this->_to_table = $_to_table;

        return $this;
    }

    /**
     * Get the value of _to_column
     */ 
    public function getTo_column()
    {
        return $this->_to_column;
    }

    /**
     * Set the value of _to_column
     *
     * @return  self
     */ 
    public function setTo_column($_to_column)
    {
        $this->_to_column = $_to_column;

        return $this;
    }

    /**
     * Get the value of _data
     */ 
    public function getData()
    {
        return $this->_data;
    }

    /**
     * Set the value of _data
     *
     * @return  self
     */ 
    public function setData($_data)
    {
        $this->_data = $_data;

        return $this;
    }
}