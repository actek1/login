<?php
	class mySql
	{
        public $dbc;

        public function connect()
        {
            $this->dbc = new mysqli('localhost', 'root', '', 'login') or die('Error al conectar con la Base de Datos: '.connect_error($this->dbc));        
        }
		
		public function query($sql)
        {
            $result = mysqli_query($this->dbc, $sql) or die('Error al hacer la consulta: '.mysqli_error($this->dbc));
			return $result;
		}
		
		public function fetch($result)
		{        
			return mysqli_fetch_assoc($result);
		}

        public function close()
        {
            return mysqli_close($this->dbc);
        }
    }
?>