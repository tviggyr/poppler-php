<?php
/**
 * Poppler-PHP
 *
 * Author:  Chukwuemeka Nwobodo (jcnwobodo@gmail.com)
 * Date:    10/13/2016
 * Time:    2:17 AM
 **/

namespace NcJoes\PopplerPhp;

use NcJoes\PopplerPhp\Constants as C;
use NcJoes\PopplerPhp\PopplerOptions\CairoOptions;
use NcJoes\PopplerPhp\PopplerOptions\HelpFlags;
use NcJoes\PopplerPhp\PopplerOptions\PageRangeOptions;

class PdfToCairo extends PopplerUtil
{
    use CairoOptions;
    use PageRangeOptions;
    use HelpFlags;

    public function __construct($pdfFile = '', array $options = [])
    {
        $this->bin_file = C::PDF_TO_CAIRO;

        return parent::__construct($pdfFile, $options);
    }

    public function utilOptions()
    {
        return array_merge(
            $this->cairoOptions(),
            $this->pageRangeOptions()
        );
    }

    public function utilFlags()
    {
        return array_merge(
            $this->cairoFlags(),
            $this->pageRangeFlags(),
            $this->helpFlags()
        );
    }

    public function utilOptionRules()
    {
        return [
            'alt' => [],
        ];
    }

    public function utilFlagRules()
    {
        return [
            'alt' => [],
        ];
    }

    public function generatePNG()
    {
        $this->setOutputFormat(C::_PNG);

        return $this->generate();
    }

    public function generateJPG()
    {
        $this->setOutputFormat(C::_JPEG);

        return $this->generate();
    }

    public function generateTIFF()
    {
        $this->setOutputFormat(C::_TIFF);

        return $this->generate();
    }

    public function generatePS()
    {
        $this->setOutputFormat(C::_PS);
        $this->output_file_extension = '.ps';

        return $this->generate();
    }

    public function generateEPS()
    {
        $this->setOutputFormat(C::_EPS);
        $this->output_file_extension = '.eps';

        return $this->generate();
    }

    public function generatePDF()
    {
        $this->setOutputFormat(C::_PDF);

        return $this->generate();
    }

    public function generateSVG()
    {
        $this->setOutputFormat(C::_SVG);
        $this->output_file_extension = '.svg';

        return $this->generate();
    }

    public function generate()
    {
        return $this->shellExec();
    }
}