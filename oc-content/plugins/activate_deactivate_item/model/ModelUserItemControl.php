<?php

class ModelUserItemControl extends Item
{

		/**
		 * It references to self object: ModelUserItemControl.
		 * It is used as a singleton
		 * 
		 * @access private
		 * @since 3.0
		 * @var ModelUserItemControl
		 */
		private static $instance;

		/**
		 * It creates a new ModelUserItemControl object class or if it has been created
		 * before, it return the previous object
		 * 
		 * @access public
		 * @since 3.0
		 * @return ModelUserItemControl
		 */
		public static function newInstance()
		{
			if( !self::$instance instanceof self ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Construct
		 */
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Return table name t_item
		 * @return string
		 */
		public function getTableName()
		{
			return DB_TABLE_PREFIX.'t_item';
		}

		/**
		 * Get user item by userId & itemId
		 *
		 * @param $userId
		 * @param $itemId
		 * @return array 
		 */
		public function UICgetItem($userId, $itemId)
		{
			if($userId == '' || $itemId == '') {
				return array();
			}

			$this->dao->select();
			$this->dao->from($this->getTableName());
			$this->dao->where('fk_i_user_id', $userId);
			$this->dao->where('pk_i_id', $itemId);

			$result = $this->dao->get();

			if($result == false) {
				return array();
			}

			return $result->result();
		}

		/**
		 * Deactivate user item
		 *
		 * @param $userId
		 * @param $itemId
		 * @return array 
		 */
		public function UICdeactivateItem($userId, $itemId)
		{
			if($userId == '' || $itemId == '') {
				return array();
			}

			$UICaItem = Item::newInstance()->findByPrimaryKey($itemId);

			if($UICaItem['b_active']==1) {

				$this->dao->select();
				$this->dao->from($this->getTableName());
				$this->dao->where('fk_i_user_id', $userId);
				$this->dao->where('pk_i_id', $itemId);

				$this->dao->update($this->getTableName(), array
					(
						'b_active' => 0
					)
				);

				$UICaItemIsExpired = osc_isExpired($UICaItem['dt_expiration']);

				if( $UICaItem['b_enabled']==1 && $UICaItem['b_spam']==0 && ($UICaItem['b_premium']==1 || !$UICaItemIsExpired) ) {
					User::newInstance()->decreaseNumItems($itemId);
					CategoryStats::newInstance()->decreaseNumItems($UICaItem['fk_i_category_id']);
					CountryStats::newInstance()->decreaseNumItems($UICaItem['fk_c_country_code']);
					RegionStats::newInstance()->decreaseNumItems($UICaItem['fk_i_region_id']);
					CityStats::newInstance()->decreaseNumItems($UICaItem['fk_i_city_id']);
				}

			}
		}

		/**
		 * Activate user item
		 *
		 * @param $userId
		 * @param $itemId
		 * @return array 
		 */
		public function UICactivateItem($userId, $itemId)
		{
			if($userId == '' || $itemId == '') {
				return array();
			}

			$UICaItem = Item::newInstance()->findByPrimaryKey($itemId);

			if($UICaItem['b_active']==0) {

				$this->dao->select();
				$this->dao->from($this->getTableName());
				$this->dao->where('fk_i_user_id', $userId);
				$this->dao->where('pk_i_id', $itemId);

				$this->dao->update($this->getTableName(), array
					(
						'b_active' => 1
					)
				);

				$UICaItemIsExpired = osc_isExpired($UICaItem['dt_expiration']);

				if( $UICaItem['b_enabled']==1 && $UICaItem['b_spam']==0 && ($UICaItem['b_premium']==1 || !$UICaItemIsExpired) ) {
					User::newInstance()->increaseNumItems($itemId);
					CategoryStats::newInstance()->increaseNumItems($UICaItem['fk_i_category_id']);
					CountryStats::newInstance()->increaseNumItems($UICaItem['fk_c_country_code']);
					RegionStats::newInstance()->increaseNumItems($UICaItem['fk_i_region_id']);
					CityStats::newInstance()->increaseNumItems($UICaItem['fk_i_city_id']);
				}

			}
		}

}