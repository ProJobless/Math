<?php
class Vector{
	
	public $coordinates = array();
	public $dimension;

	public function Vector($coordinates){
		if(is_array($coordinates)){
			$this->coordinates = $coordinates;
			$this->dimension   = count($coordinates); 
		}
		else{
			//TODO: return error
		}
	}

	public function __constructor($coordinates){
		if(is_array($coordinates)){
			$this->coordinates = $coordinates;
			$this->dimension   = count($coordinates); 
		}
		else{
			//TODO: return error
		}
	}

	public function toString(){
		$string = 'Vector(' . $this->dimension . ') (';
		for($i = 0; $i < $this->dimension - 1; $i++){
			$string .= $this->coordinates[$i] . ', ';
		}
		$string .= $this->coordinates[$i] . ')';
		return $string;
	}

	/**
	* @param A single Vector or array of Vectors
	* @param The result vector to store the result in.
	*/
	public function add($vector){
		$result_vector = new Vector($this->coordinates);
		if(is_array($vector)){
			foreach($vector as $v){
				$result_vector = $this->add_single($result_vector);
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

			if($this->dimension == $vector->dimension){
				for($i = 0; $i < $this->dimension; $i++){
					$result_vector->coordinates[$i] += $vector->coordinates[$i];
				}
		}
		return $result_vector;
	}



}