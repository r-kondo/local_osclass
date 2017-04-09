<?php
    /*
     *      OSCLass ? software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2010 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    /**
     * Model database for Products tables
     * 
     * @package OSClass
     * @subpackage Model
     * @since 3.0
     */
    class SelectRegionStats extends RegionStats
    {
        /**
         * It references to self object: ModelProducts.
         * It is used as a singleton
         * 
         * @access private
         * @since 3.0
         * @var ModelProducts
         */
        private static $instance ;

        /**
         * It creates a new ModelProducts object class ir if it has been created
         * before, it return the previous object
         * 
         * @access public
         * @since 3.0
         * @return ModelProducts
         */
        public static function newInstance()
        {
            if( !self::$instance instanceof self ) {
                self::$instance = new self ;
            }
            return self::$instance ;
        }

        /**
         * Construct
         */
        function __construct()
        {
            parent::__construct();
        }
        
        /**
         * Return a list of regions and counter items.
         * Can be filtered by country and num_items,
         * and ordered by region_name or items counter.
         * $order = 'region_name ASC' OR $oder = 'items DESC'
         *
         * @access public
         * @since 2.4
         * @param string $country
         * @param string $zero
         * @param string $order
         * @return array
         */
        public function listRegions($country = '%%%%', $zero = ">", $order = "region_name ASC")
        {
            $key    = md5(osc_base_url().(string)$country.(string)$zero.(string)$order);
            $found  = null;
            $cache  = osc_cache_get($key, $found);
            if($cache===false) {
                $order_split = explode(' ', $order);

                $this->dao->from( DB_TABLE_PREFIX.'t_region , '.$this->getTableName() );
                $this->dao->where( $this->getTableName().'.fk_i_region_id = '.DB_TABLE_PREFIX.'t_region.pk_i_id' );

                if( $order_split[0] == 'region_name' ) {
                    $this->dao->select('STRAIGHT_JOIN '.$this->getTableName().'.fk_i_region_id as region_id, '.$this->getTableName().'.i_num_items as items, '.DB_TABLE_PREFIX.'t_region.s_name as region_name, '.DB_TABLE_PREFIX.'t_region.s_slug as region_slug');
                } else if( $order_split[0] == 'items') {
                    $this->dao->select($this->getTableName().'.fk_i_region_id as region_id, '.$this->getTableName().'.i_num_items as items, '.DB_TABLE_PREFIX.'t_region.s_name as region_name');
                }

                $this->dao->where('i_num_items '.$zero.' 0' );
                $this->dao->where(DB_TABLE_PREFIX.'t_region.b_active = 1');
                if( $country != '%%%%') {
                    $this->dao->where(DB_TABLE_PREFIX.'t_region.fk_c_country_code = \''.$this->dao->connId->real_escape_string($country).'\' ');
                }
                $this->dao->orderBy($order);

                $rs = $this->dao->get();

                if($rs === false) {
                    return array();
                }
                $return = $rs->result();
                osc_cache_set($key, $return, OSC_CACHE_TTL);
                return $return;
            } else {
                return $cache;
            }

        }


    }

?>