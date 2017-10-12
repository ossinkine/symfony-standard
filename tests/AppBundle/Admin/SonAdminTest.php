<?php

namespace Tests\AppBundle\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class SonAdminTest extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var SchemaTool
     */
    private $schemaTool;

    public function setUp()
    {
        parent::setUp();

        $this->dropDatabase();
        $this->createSchema();
    }

    /**
     * @return array
     */
    public function providePages(): array
    {
        return [
            'ok_with_empty_cache' => ['/admin/app/son/list'],
            'failed_always' => ['/admin/app/son/list'],
        ];
    }

    /**
     * @dataProvider providePages
     *
     * @param string $uri
     */
    public function testSuccess(string $uri)
    {
        $client = $this->getClient();
        $client->enableProfiler();
        $client->request('GET', $uri);

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @return Client
     */
    protected function getClient(): Client
    {
        if (null === $this->client) {
            $this->client = static::createClient();
        }

        return $this->client;
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * @return ContainerInterface
     */
    protected function getContainer(): ContainerInterface
    {
        return $this->getClient()->getContainer();
    }

    /**
     * @param string[] $classNames
     */
    private function createSchema(array $classNames = []): void
    {
        $metadataFactory = $this->getEntityManager()->getMetadataFactory();
        if (count($classNames)) {
            $metadata = array_map(
                function ($className) use ($metadataFactory) {
                    return $metadataFactory->getMetadataFor($className);
                },
                $classNames
            );
        } else {
            $metadata = $metadataFactory->getAllMetadata();
        }

        $this->getSchemaTool()->updateSchema($metadata);
    }

    /**
     * Clear database.
     */
    private function dropDatabase(): void
    {
        $this->getSchemaTool()->dropDatabase();
    }

    /**
     * @return SchemaTool
     */
    private function getSchemaTool(): SchemaTool
    {
        if (null === $this->schemaTool) {
            $this->schemaTool = new SchemaTool($this->getEntityManager());
        }

        return $this->schemaTool;
    }
}
