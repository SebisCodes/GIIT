<?php
    namespace MyHTMLBuilder;
    /**
     * Used to simply create tags using php
     *
     * @package MyHTMLBuilder
     * @author Sebastian Grünwald
     */
    class MyTag {
        /**
         *
         * @var string $tagname The tagname
         */
        private $tagname = '';
        /**
         *
         * @var string $attributes The attributes (f.e. class="font-bold")
         */
        private $attributes = array();
        /**
         *
         * @var string $value The value inside the tag
         */
        private $value;
        /**
         *
         * @var string $singleTag Boolean: if true, only a single tag will be displayed like <br />
         */
        private $singleTag = false;

        /**
         * Create and initialize this object
         *
         * @param string $tagname The tagname
         */
        public function __construct($tagname)
        {
            $this->tagname = $tagname;
        }
        
        /**
         * Get the full tag using value (f.e. <p class="p-3">value</p>)
         * Attention! If tag is empty, only value will be returned.
         *
         */
        public function getText() {
            if ($this->tagname == '') return $this->value;
            $tagText = '';
            if ($this->singleTag) {
                $tagText = '<'.$this->tagname.' />';
            } else {
                $tagText .= '<';
                $tagText .= $this->tagname;
                foreach ($this->attributes as $key => $val) {
                    $tagText .= ' ';
                    $tagText .= $key;
                    $tagText .= '="';
                    $tagText .= $val;
                    $tagText .= '"';
                }
                $tagText .= '>';
                $tagText .= $this->value;
                $tagText .= '</';
                $tagText .= $this->tagname;
                $tagText .= '>';
            }
            return $tagText;
        }
        /**
         * Setup tag to a single tag (f.e. <br />) or a double tag (f.e. <p></p>)
         *
         * @param boolean $single If true: tag is displayed as a single tag
         * @return MyTag Returns this object
         */
        public function setSingle($single) {
            $this->singleTag = $single;
            return $this;
        }
        /**
         * Add an attribute
         *  (f.e. class="font-bold")
         *
         * @param string $name The name of the attribute (f.e. "class")
         * @param string $value The value of the attribute (f.e. "font-bold")
         * @return MyTag Returns this object
         */
        public function addAttr($name, $value) {
            unset($this->attributes[$name]);
            $this->attributes = array_merge($this->attributes, array($name=>$value));
            return $this;
        }

        /**
         * Remove an attribute
         *
         * @param string $name The name of the attribute
         * @return MyTag Returns this object
         */
        public function remAttr($name) {
            unset($this->attributes[$name]);
            return $this;
        }
        
        /**
         * Remove all attributes
         *
         * @return MyTag Returns this object
         */
        public function remAttrs() {
            $this->attributes = array();
            return $this;
        }
        /**
         * Edit an attribute
         *  (f.e. class="p-3")
         *
         * @param string $name The name of the attribute
         * @param string $value The value of the attribute
         * @return MyTag Returns this object
         */
        public function editAttr($name, $value) {
            $this->addAttr($name, $value);
            return $this;
        }

        /**
         * Set the value inside the tag
         *  (f.e. <p class="p-3">value</p>)
         *
         * @param string $value The value inside the tag
         * @return MyTag Returns this object
         */
        public function setValue($value) {
            $this->value = $value;
            return $this;
        }

        /**
         * Append a value inside the tag
         *  (f.e. <p class="p-3">old value + new value</p>)
         *
         * @param string $value The value to append
         * @return MyTag Returns this object
         */
        public function append($value) {
            $this->value .= $value;
            return $this;
        }

        /**
         * Prepend a value inside the tag
         *  (f.e. <p class="p-3">new value + old value</p>)
         *
         * @param string $value The value to prepend
         * @return MyTag Returns this object
         */
        public function prepend($value) {
            $this->value .= $value;
            return $this;
        }
    }
?>