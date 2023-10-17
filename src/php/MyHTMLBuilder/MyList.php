<?php
    namespace MyHTMLBuilder;
    require_once './src/php/MyHTMLBuilder/MyTag.php';
    use MyHTMLBuilder\MyTag;
    /**
     * Used to simply create HTML lists using php
     *
     * @package MyHTMLBuilder
     * @author Sebastian Grünwald
     */
    class MyList {
        
        /**
         *
         * @var MyTag $titleTag The tag of the title
         */
        private $titleTag;
        /**
         *
         * @var MyTag $outerListTag The tag of the outer list element
         */
        private $outerListTag;
        /**
         *
         * @var MyTag $innerListTag The tag of the inner list element
         */
        private $innerListTag;
        /**
         *
         * @var MyTag $rows The rows containing the values of the list
         */
        private $rows = array();
        /**
         * Create and initialize this object
         *
         * @param MyTag $titleTag The title tag (pass by reference)
         * @param MyTag $outerListTag The outer list tag (f.e. <ol> or <ul>) (pass by reference)
         * @param MyTag $innerListTag The inner list tag (f.e. <li>) (pass by reference)
         */
        public function __construct(&$titleTag, &$outerListTag, &$innerListTag)
        {
            $this->titleTag = $titleTag;
            $this->outerListTag = $outerListTag;
            $this->innerListTag = $innerListTag;
        }

        /**
         * Add a row to the list
         *
         * @param string $val Add a value to the rows
         * @return MyList Returns this object
         */
        public function addRow($val) {
            array_push($this->rows, $val);
            return $this;
        }
        /**
         * Removes all rows
         *
         * @return MyList Returns this object
         */
        public function remRows() {
            $this->rows = array();
            return $this;
        }
        /**
         * Remove all rows
         *
         * @param array $arr An array containing string-values
         * @return MyList Returns this object
         */
        public function setRows($arr) {
            $this->rows = $arr;
            return $this;
        }
        
        /**
         * Get the full html code of the list
         *
         */
        public function getText() {
            $tagText = '';
            $tagText .= $this->titleTag->getText();
            $this->outerListTag->setValue('');
            foreach ($this->rows as $s) {
                $this->outerListTag->append($this->innerListTag->setValue($s)->getText());
            }
            $tagText .= $this->outerListTag->getText();
            return $tagText;
        }
    }
?>