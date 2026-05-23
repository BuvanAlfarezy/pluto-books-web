    <?php

    use PHPUnit\Framework\TestCase;
    use Advan\BooksWeb\Controller\HomeController;

    class HomeControllerTest extends TestCase
    {
        private HomeController $homeController;

        protected function setUp(): void
        {
            $this->homeController = new HomeController();
        }

        public function testIndex()
        {
            $this->homeController->index();

            $this->expectOutputRegex('/Home/');
        }
    }