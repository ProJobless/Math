<?php
class Vector{
	
	public $coordinates = array();
	public $dimension;

	public function __constructor($coordinates){
		if(is_array($coordinates)){
			$this->coordinates = $coordinates;
			$this->dimension   = length($coordinates); 
		}
		else{
			//TODO: return error
		}
	}

	public function toString(){
		$string = 'Vector(' . $this->dimension . ') (';
		foreach($this->coordinates as $c){
			$string .= $c . ' ';
		}
		$string .= ')';
		return $string;
	}

	/**
	* @param A single Vector or array of Vectors
	* @param The result vector to store the result in.
	*/
	public function add($vector){
		$result_vector = new Vector($this->coordinates);
		if(is_array($vector)){
			foreach($vectors as $v){
				$result_vector = $this->add_single($v);
			}
		}
		else{
			$result_vector = $this->add_single($vector);
		}
		return $result_vector;
	}

	private function add_single($vector){
		$result_vector = new Vector($this->coordinates);
		if($vector instanceof Vector)
			if($this->dimension == $vector->dimension)
				for($i = 0; $i < $this->dimension; $i++)
					$result_vector->coordinates[$i] .= $vector->coordinates[$i];
		return $result_vector;
	}



}