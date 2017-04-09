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
    class SelectRegion extends Region
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
         * Gets all regions from a country
         *
         * @access public
         * @since unknown
         * @deprecated since 2.3
         * @see Region::findByCountry
         * @param type $countryId
         * @return array
         */
        public function getByCountry($countryId)
        {
            return $this->findByCountry($countryId);
        }

        /**
         * Gets all regions from a country
         *
         * @access public
         * @since unknown
         * @param type $countryId
         * @return array
         */
        public function findByCountry($countryId)
        {
            $this->dao->select('*');
            $this->dao->from($this->getTableName());
            $this->dao->where('fk_c_country_code', $countryId);
            $this->dao->where('b_active', '1');
            $this->dao->orderBy('s_name', 'ASC');
            $result = $this->dao->get();

            if($result == false) {
                return array();
            }

            return $result->result();
        }
        public function setStatus($regionId, $active)
        {
            $this->dao->from($this->getTableName());
            $this->dao->set('b_active', $active, false);
            $this->dao->where('pk_i_id', $regionId);
            $this->dao->update();
        }
        /**
         * Find a region by its name and country
         *
         * @access public
         * @since unknown
         * @param string $name
         * @param string $country
         * @return array
         */
        public function findByName($name, $country = null)
        {
            $this->dao->select('*');
            $this->dao->from($this->getTableName());
            $this->dao->where('s_name', $name);
            $this->dao->where('b_active', '1');
            if($country!=null) {
                $this->dao->where('fk_c_country_code', $country);
            }
            $this->dao->limit(1);
            $result = $this->dao->get();

            if($result == false) {
                return array();
            }

            return $result->row();
        }

        /**
         * Function to deal with ajax queries
         *
         * @access public
         * @since unknown
         * @param type $query
         * @return array
         */
        public function ajax($query, $country = null)
        {
            $country = trim($country);
            $this->dao->select('a.pk_i_id as id, a.s_name as label, a.s_name as value');
            $this->dao->from($this->getTableName() . ' as a');
            $this->dao->like('s_name', $query, 'after');
            $this->dao->where('b_active', '1');
            if($country != null ) {
                if(strlen($country)==2) {
                    $this->dao->where('a.fk_c_country_code', strtolower($country));
                } else {
                    $this->dao->join(Country::newInstance()->getTableName().' as aux', 'aux.pk_c_code = a.fk_c_country_code', 'LEFT');
                    $this->dao->where('aux.s_name', $country);
                }
            }
            $this->dao->limit(5);
            $result = $this->dao->get();
            if($result == false) {
                return array();
            }

            return $result->result();
        }

        /**
         * Find a location by its slug
         *
         * @access public
         * @since 3.2.1
         * @param type $slug
         * @return array
         */
        public function findBySlug($slug)
        {
            $this->dao->select('*');
            $this->dao->from($this->getTableName());
            $this->dao->where('s_slug', $slug);
            $this->dao->where('b_active', '1');
            $result = $this->dao->get();

            if($result == false) {
                return array();
            }
            return $result->row();
        }

        /**
         * Find a locations with no slug
         *
         * @access public
         * @since 3.2.1
         * @return array
         */
        public function listByEmptySlug()
        {
            $this->dao->select('*');
            $this->dao->from($this->getTableName());
            $this->dao->where('s_slug', '');
            $this->dao->where('b_active', '1');
            $result = $this->dao->get();

            if($result == false) {
                return array();
            }
            return $result->result();
        }

        public function listActive()
        {
            $this->dao->select($this->getFields());
            $this->dao->from($this->getTableName());
            $this->dao->where('b_active', '1');
            $result = $this->dao->get();

            if($result == false) {
                return array();
            }

            return $result->result();
        }

    }

?>