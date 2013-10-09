<?php namespace Tolkien;

use Symfony\Component\Yaml\Parser;

class TolkienBuildPageTest extends \PHPUnit_Framework_TestCase
{
	private $init;

	public function __construct()
	{
		$this->init = new Init('blog');
		$this->rrmdir( ROOT_DIR );
		$this->init->create();
	}

	public function testBuildPage()
	{
		$parser = new Parser();
		$config = $parser->parse(file_get_contents( ROOT_DIR . 'config.yml') );

		$page_1 = new GeneratePage( $config, array('title' => 'Contact') );
		$page_1->generate();

		$page_2 = new GeneratePage( $config, array('title' => 'About') );
		$page_2->generate();

		$page_3 = new GeneratePage( $config, array('title' => 'Portofolio') );
		$page_3->generate();

		$buildPage = new BuildPage($config, $parser);
		$buildPage->build();

		$pages = $buildPage->getNodes();

		$this->assertTrue( is_array($pages) );

		$this->assertEquals($pages[1]->getTitle(), 'Contact');
		$this->assertEquals($pages[1]->getFile(), 'contact.markdown');
		$this->assertEquals($pages[1]->getLayout(), 'page' );
		$this->assertEquals($pages[1]->getPath(), basename(realpath(ROOT_DIR)) .'/' . '_pages/contact.markdown' );
		$this->assertEquals($pages[1]->getUrl(), '/contact.html' );
	}

	public function rrmdir($dir) 
	{
		foreach(glob("{$dir}/*") as $file)
    {
        if(is_dir($file)) { 
            $this->rrmdir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dir);
	}
}