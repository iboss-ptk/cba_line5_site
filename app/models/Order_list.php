<?php

	class Order_list extends Eloquent
	{

		public function order_list_attribute() {
	    	 return $this->hasMany('Order_list_attribute');
	    }


	}