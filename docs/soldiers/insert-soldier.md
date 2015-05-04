API: Soldier insert method. 
===============================

#### **`POST`**

Insert a new soldier. 

**Usage url:** `curl https://www.domain.be/soliders/insert`
**Permission:** None

## Request.

| Parameter:          | Description:                                |
| :------------------ | ------------------------------------------- |
| `Voornaam`          | The firstname of the soldier.               |
| `Achternaam`        | The lastname of the soldier.                |
| `Burgerlijke_Stand` | Relation status of the soldier.             |
| `Stam_nr`           | Service number of the soldier.              |
| `Regiment ID`       | The ID of his regiment.                     | 
| `Geboren_datum`     | Date of birth.                              |
| `Geboren_plaats`    | Place of birth.                             |
| `Overleden_locatie` | Exact location of death.                    |
| `Overleden_datum`   | Date of death.                              |
| `Overleden_plaats`  | City where the soldier died.                |
| `Herdenking_id`     | The ID of the graveyard.                    |
| `Geslacht`          | The gender of the soldier.                  |
| `Eenheid`           | The country they serve.                     |
| `Rang`              | The military grade they have.               |
| `Graf_referentie`   | The Grave number on the graveyard.          |
| `Dienst`            | The year they go in the military.           |
| `Notitie`           | Extra notition of the soldier.              | 

## Outputs 

### Success 

### Failure 
