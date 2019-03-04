<?php 
@require_once("Database.php");

class Model{
	
	public function __construct(){
		echo "object start"."<br>";
	}
	private function connect(){
		$Database= new Database();
		return $Database->db;
	}
	public static function All(){
		$db=self::connect();
		$table= get_called_class();
		$sql="SELECT * FROM {$table} ";
		return mysqli_query($db,$sql);

		
	}

	public static function Order_BY_Limit($col,$order,$limit){
		$db=self::connect();
		$table= get_called_class();
		$sql="SELECT * FROM {$table} ORDER BY {$col} {$order} limit {$limit}";
		return mysqli_query($db,$sql);

		
	}
	public static function Order_BY_All($col,$order){
		$db=self::connect();
		$table= get_called_class();
		$sql="SELECT * FROM {$table} ORDER BY {$col} {$order}";
		return mysqli_query($db,$sql);

		
	}

	public static function Where($key,$value){
		$db=self::connect();
		$table= get_called_class();
		$sql="SELECT * FROM {$table} WHERE {$key} = '{$value}' ";
		return mysqli_query($db,$sql);

	}

	public static function Delete($key,$value){
		$db=self::connect();
		$table= get_called_class();
		$sql = "DELETE FROM {$table} WHERE {$key} = '{$value}' ";
		return mysqli_query($db,$sql);
	}

	public static function Create($arr){
		$table= get_called_class();
		$db=self::connect();
		$keys='';
		$values='';
			foreach ($arr as $key => $value) {
				 $keys.="".$key.",";
				 $values.="'".$value."',";
			}
		$keys=substr($keys,0,strlen($keys)-1);
		$values=substr($values,0,strlen($values)-1);

		$sql="INSERT INTO {$table} ({$keys}) VALUES ({$values})";

		return mysqli_query($db,$sql);
	}

	public static function Update($key,$value,$arr){
		$db=self::connect();
		$table= get_called_class();
		$values='';
			foreach ($arr as $Data_key => $Data_value) {
				
				 $values.= $Data_key."='".$Data_value."',";
			}
		
		$values=substr($values,0,strlen($values)-1);
		$sql="UPDATE {$table} SET {$values} WHERE {$key} = '{$value}' ";
		return mysqli_query($db,$sql);
	}


}


/*new Model();*/
//Model::All();
/*Model::Where('id',1);
Model::Delete('id', 2);
Model::Create([

				'key1'=>'value2',
				'key2'=>'value2',
				'key3'=>'value3'
			 ]);
Model::Update([

				'key1'=>'value2',
				'key2'=>'value2',
				'key3'=>'value3'
			 ],'name','mgmg');

*/
/*class doctor extends Model{

}




$doctor=doctor::Where('name','mgmg');
$row=mysqli_fetch_assoc($doctor);
var_dump($row);

$doctor=doctor::Delete('id','1');
doctor::Create([
		'name'=>'test',

	]);
var_dump($tt);
doctor::Update('name','koko',[
		'name'=>"kkk",
	]);*/