<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// This is a wrapper for Dompdf. Make sure Dompdf is installed in application/third_party/dompdf/
// Example path: application/third_party/dompdf/
// You should have an 'autoload.inc.php' file directly inside the 'dompdf' folder.

class Pdf_generator {

    protected $ci;
    protected $dompdf;

    public function __construct()
    {
        $this->ci =& get_instance(); // Get CodeIgniter instance for loading views, etc.

        // Include Dompdf's autoloader
        require_once APPPATH.'third_party/dompdf/autoload.inc.php';

        // Use the Dompdf namespace
        // You might need to adjust this depending on Dompdf version.
        // For 3.x, it's typically just Dompdf\Dompdf
        $this->dompdf = new Dompdf\Dompdf();

        // Optional: Set some default options if needed
        // $options = new Dompdf\Options();
        // $options->set('defaultFont', 'DejaVu Sans'); // Example: if you need Unicode support
        // $this->dompdf->setOptions($options);
    }

    /**
     * Generates a PDF from HTML content.
     *
     * @param string $html The HTML content to convert to PDF.
     * @param string $filename The name of the PDF file.
     * @param bool $stream TRUE to output to browser, FALSE to return as string.
     * @param string $paper Paper size (e.g., 'A4', 'Letter').
     * @param string $orientation Paper orientation ('portrait' or 'landscape').
     * @return string|void Returns PDF string if $stream is FALSE, otherwise outputs to browser.
     */
    public function generate_pdf($html, $filename = 'document.pdf', $stream = TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        if ($stream) {
            // Output to the browser
            $this->dompdf->stream($filename, array("Attachment" => 0)); // Attachment => 0 for inline view, 1 for download
        } else {
            // Return the PDF as a string for saving to a file
            return $this->dompdf->output();
        }
    }
}