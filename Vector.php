<?php
class Vector{
	
	public $coordinates = array();
	public function dimension(){
		return count($this->coordinates);
	}

	public function Vector($coord){
		$coordinates = func_get_args();
		if(is_array($coord)){
			$this->coordinates = $coord;

		}
		else{
			$this->coordinates = $coordinates;
		}
	}

	public function __constructor($coord){
		$coordinates = func_get_args();
		if(is_array($coord)){
			$this->coordinates = $coord;

		}
		else{
			$this->coordinates = $coordinates;
		}
	}

	public function toString(){
		$string = 'Vector(' . $this->dimension() . ') (';
		for($i = 0; $i < $this->dimension() - 1; $i++){
			$string .= $this->coordinates[$i] . ', ';
		}
		$string .= ($i > 0 ? $this->coordinates[$i] . ')' : ')');
		return $string;
	}

	/**
	* Adds Vectors from this Vector.
	* @param A single Vector or array of Vectors
	*/
	public function add(){
		$result_vector = new Vector($this->coordinates);
		$vector = func_get_args();
			foreach($vector as $v){
				$result_vector = $result_vector->add_single($v);
			}
		return $result_vector;
	}

	/**
	* Adds the input Vector from this Vector.
	* @param Single Vector with equal dimensions to this Vector.
	*/
	private function add_single($vector){
		$result_vector = new Vector($this->coordinates);
		if($vector instanceof Vector){
			if($this->dimension() == $vector->dimension()){

				for($i = 0; $i < $this->dimension(); $i++){
					$result_vector->coordinates[$i] += $vector->coordinates[$i];
				}
			}
		}
		return $result_vector;
	}

	/**
	* Subtracts Vectors from this Vector.
	* If multiple Vectors are input: V0 - V1 - ... - Vn
	* @param Variable number of vectors
	*/
	public function subtract(){
		$result_vector = new Vector($this->coordinates);
		$vector = func_get_args();
		foreach($vector as $v){
				$result_vector = $result_vector->subtract_single($v);
			}
		return $result_vector;
	}

	/**
	* Subtracts the input Vector from this Vector.
	* @param Single Vector with equal dimensions to this Vector.
	*/
	private function subtract_single($vector){
		$result_vector = new Vector($this->coordinates);
		if($vector instanceof Vector)
			if($this->dimension() == $vector->dimension())
				for($i = 0; $i < $result_vector->dimension(); $i++)
					$result_vector->coordinates[$i] -= $vector->coordinates[$i];
		return $result_vector;
	}

	/**
	* Calculates the dot product of two Vectors
	* @param single Vector
	*/
	public function dot($vector){
		$result = 0;
		for($i = 0; $i < $this->dimension(); $i++)
			$result += ($this->coordinates[$i] * $vector->coordinates[$i]);
		return $result;
	}
}