<?php

class TestSoldiers extends TestCase {

    public function testInsert()
    {
        $response = $this->call('POST', 'Soldiers/all');
        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->json();

        $this->assertArrayHasKey('Voornaam', $data);
    }
}