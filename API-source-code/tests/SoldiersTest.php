<?php

class SoldiersTest extends TestCase {

    public function testAllSoldiersRoute()
    {
        $response = $this->call('GET', '/soldiers/all');
        $array = json_decode($response->getContent(), true);

        $this->assertNotEmpty($array);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue(sizeof($array) > 0);

        $dataArray = $array['data'][0][0];

        $this->assertArrayHasKey('id', $dataArray);
        $this->assertArrayHasKey('Voornaam', $dataArray);
        $this->assertArrayHasKey('Achternaam', $dataArray);
        $this->assertArrayHasKey('Geslacht', $dataArray);
        $this->assertArrayHasKey('Eenheid', $dataArray);
        $this->assertArrayHasKey('Notitie', $dataArray);
        $this->assertArrayHasKey('Regiment', $dataArray);
        $this->assertArrayHasKey('Regiment ID', $dataArray);
        $this->assertArrayHasKey('Dienst nr', $dataArray);
        $this->assertArrayHaskey('Dienst', $dataArray);
        $this->assertArrayHasKey('Rang', $dataArray);
        $this->assertArrayHasKey('type', $dataArray);
        $this->assertArrayHasKey('breedtegraad', $dataArray);
        $this->assertArrayHasKey('lengtegraad', $dataArray);
        $this->assertArrayHasKey('begraafplaats', $dataArray);
        $this->assertArrayHasKey('begraafplaats id', $dataArray);
        $this->assertArrayHasKey('Graf referentie', $dataArray);
        $this->assertArrayHasKey('Doodsoorzaak', $dataArray);
        $this->assertArrayHasKey('Overleden locatie', $dataArray);
        $this->assertArrayHasKey('Overleden datum', $dataArray);
        $this->assertArrayHasKey('Overleden plaats', $dataArray);
        $this->assertArrayHasKey('Geboorte plaats', $dataArray);
        $this->assertArrayHaskey('Geboorte datum', $dataArray);
        $this->assertArrayHasKey('Burgerlijke stand', $dataArray);
    }
}