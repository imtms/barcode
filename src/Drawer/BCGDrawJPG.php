<?php
namespace imtms\Barcode\Drawer;

use imtms\Barcode\Drawer\BCGDraw;

class BCGDrawJPG extends BCGDraw {
    private $dpi;
    private $quality;

    /**
     * Constructor.
     *
     * @param resource $im
     */
    public function __construct($im) {
        parent::__construct($im);
    }

    /**
     * Sets the DPI.
     *
     * @param int $dpi
     */
    public function setDPI($dpi) {
        if(is_int($dpi)) {
            $this->dpi = max(1, $dpi);
        } else {
            $this->dpi = null;
        }
    }

    /**
     * Sets the quality of the JPG.
     *
     * @param int $quality
     */
    public function setQuality($quality) {
        $this->quality = $quality;
    }

    /**
     * Draws the JPG on the screen or in a file.
     */
    public function draw() {
        ob_start();
        imagejpeg($this->im, null, $this->quality);
        $bin = ob_get_contents();
        ob_end_clean();

        $this->setInternalProperties($bin);

        if (empty($this->filename)) {
            return $bin;
        } else {
            file_put_contents($this->filename, $bin);
        }
    }

    private function setInternalProperties(&$bin) {
        $this->internalSetDPI($bin);
        $this->internalSetC($bin);
    }

    private function internalSetDPI(&$bin) {
        if ($this->dpi !== null) {
            $bin = substr_replace($bin, pack("Cnn", 0x01, $this->dpi, $this->dpi), 13, 5);
        }
    }

    private function internalSetC(&$bin) {
        //Copyright
    }
}
?>